<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Album;
use App\Model\Medium;
use App\Model\TempImage;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MediaController extends Controller
{
    /*Route::post('send_temps', 'MediaController@registerTempImg');
        Route::get('home/videos','MediaController@index');
        Route::get('/postanduser/{media_id}/{viewer_id?}','MediaController@getPostAndUser');
        Route::post('/create/post','MediaController@createPost');*/

    public function index(Request $request)
    {
        $media = Medium::where('type', '=', 'video')->get();
        return response()->json($media);
    }

    public function getUserAlbums($token)
    {
        $qry = User::where('api_token',$token);
        if ($qry->count() > 0) {
            $user = $qry->first();
            $albums = Album::where([['user_id','=',$user->id],['parent_id','=',0],
                ['auto_generated','=',false],['name','<>','uploads']])->get();
            return response()->json(['albums'=>$albums]);
        }
        return response()->json([]);
    }

    public function getPostAndUser($media_id, $viewer_id)
    {
        $post = Medium::where('media.id', $media_id)
            ->leftJoin('posts', 'media.post_id', '=', 'post.id')->select('posts.*');
        $user = User::find($viewer_id);

        return response()->json(['user' => $user, 'post' => $post]);
    }

    public function registerTempImg(Request $request)
    {
        if ($request->hasFile('files')) {
            $qry = User::where('api_token', $request->api_token);
            if ($qry->count() > 0) {
                $fine = [];
                $user = $qry->first();
                $images = $request->file('files');
                foreach ($images as $photo) {
                    $extension = $photo->getClientOriginalExtension();
                    $filename = 'profile-photo-' . time() . '_' . str_random(3) . '.' . $extension;
                    $photo->storeAs('/image/uploads/', $filename);
                    $fine[] = TempImage::create(["url" => '/img/uploads/' . $filename,'deleted'=>false,
                        'user_id' => $user->id]);
                }


                return response()->json($fine);
            }
            return response()->json(['error' => 'Session expired ']);
        }
        return response()->json(['error' => 'File not found']);
    }

    public function createPost(Request $request)
    {
        $data = (array)json_decode($request->data);
        $media = $data['media'];
        $qry = User::where('api_token', $data['api_token']);
        if ($qry->count() > 0) {
            $user = $qry->first();
            $albumAndPost = findOrCreateAlbumAndPost($user,$data['album'],$data['title'],
                $data['privacy'],$data['description'],$data['tags']);
            $post = $albumAndPost['post'];
            $album = $albumAndPost['album'];
            $medis = [];
            foreach ($media as $medium) {
                $path = str_replace('/img', '/app/image', $medium->url);
                $exist = File::exists(storage_path($path));
                $qry1 = TempImage::where('id','=',$medium->id);
                if($exist && $qry1->count() > 0 && !$medium->deleted){
                    $temp = $qry1->first();
                   $medis [] = Medium::create(['discr'=>'downloads',
                        'type'=>'image','url'=>$temp->url,
                        'user_id'=>$user->id,
                        'post_id'=>0,
                        'album_id'=>$album->id]);
                    $temp->delete();
                }
                if ($exist  && $medium->deleted){
                    File::delete($path);
                    if ($qry1->count() > 0){
                        $temp = $qry1->first();
                        $temp->delete();
                    }
                }
                if(!$exist && $qry1->count() > 0){
                    $temp = $qry1->first();
                    $temp->delete();
                }
            }
            if(sizeof($medis) > 0){
                return response()->json(['post'=>$post]);
            }else{
                if($albumAndPost['post_created']) $post->delete();

                if ($albumAndPost['album_created']) $album->delete();

                return response()->json(['error' => 'No file found, upload again and retry']);
            }
        }
        return response()->json(['error' => 'Session expired ']);
    }

}