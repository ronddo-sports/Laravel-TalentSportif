<?php


namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Album;
use App\Model\Carton;
use App\Model\Medium;
use App\Model\Post;
use App\Model\TempImage;
use App\Model\User;
use App\Model\Vue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        $posts = [];
        $media = Medium::where([['type', '=', 'video'],['discr','=','downloads']])->inRandomOrder()->get();
        foreach ($media as $medium){
            $post = findOrCreatePostFromMedia($medium);
            $post->video = $medium;
            $posts [] = $post;
        }
        return response()->json($posts);
    }

    public function getUserAlbums($token)
    {
        $qry = User::where('api_token', $token);
        if ($qry->count() > 0) {
            $user = $qry->first();
            $albums = Album::where([['user_id', '=', $user->id], ['parent_id', '=', 0],
                ['auto_generated', '=', false], ['name', '<>', 'uploads']])->get();
            return response()->json(['albums' => $albums]);
        }
        return response()->json([]);
    }

    public function getPostAndUser($media_type,$post_token, $viewer_id)
    {

        $qry = Post::where('token',$post_token);
        if($qry->count() > 0){
            $post = $qry->first();
            $qry1 = User::where('id',$post->user_id);
            if ($qry1->count() > 0){
                $user = $qry1->first();
                $user->photo_url = profilePicFromUserId($user->id);
                $user->fan_number = countSubscribers($user->id);
                if ($viewer_id != null) {
                    $user->isFollowed = isFollower($viewer_id, $user->id);
                }

                $post->cartons = getPostCartons($post->id);
                $post->total_comments = Post::where('parent_id',$post->id)->count();
                $post->views = Vue::where('post_id',$post->id)->count();
                if($media_type == "video"){
                    $post->video = Medium::where('post_id',$post->id)->first();
                }else{
                    $qry2 = Album::where('post_id',$post->id);
                    if ($qry2->count() > 0){
                        $post->album = $qry2->first();
                        $post->album->media = Medium::where('album_id',$post->album->id)->get();
                    }else{
                        $post->video = Medium::where('post_id',$post->id)->first();
                    }
                }

                return response()->json(['owner' => $user, 'post' => $post]);
            }
        }
        return response()->json(['error','Post not found']);
    }

    public function getMorePosts($media_type,$post_token, $viewer_id = null)
    {
        if ($media_type == "video"){
            $media = Medium::where([['type','=','video'],['discr','=','downloads']])->inRandomOrder()->limit(10)->get();
        }else{
            $media = Album::where([['name','<>','uploads'],['auto_generated','=',false]])->inRandomOrder()->limit(10)->get();
        }
        $posts = [];
        foreach ($media as $medium) {
            $post = findOrCreatePostFromMedia($medium);
            if ($media_type == "video"){
                $post->video = $medium;
            }else{
                $post->album = $medium;
                $post->album->media = Medium::where('album_id',$post->album->id)->get();
            }
            $posts [] = $post;
        }
        return response()->json(['posts'=>$posts]);
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
                    $fine[] = TempImage::create(["url" => '/img/uploads/' . $filename, 'deleted' => false,
                        'user_id' => $user->id]);
                }

                return response()->json($fine);
            }
            return response()->json(['error' => 'Session expired ']);
        }
        return response()->json(['error' => 'File not found']);
    }

    public function uploadPhoto(Request $request)
    {
        $data = (array)json_decode($request->data);
        $media = $data['media'];
        $qry = User::where('api_token', $data['api_token']);
        if ($qry->count() > 0) {
            $user = $qry->first();
            $albumAndPost = findOrCreateAlbumAndPost($user, $data['album'], $data['title'],
                $data['privacy'], $data['description'], $data['tags']);
            $post = $albumAndPost['post'];
            $album = $albumAndPost['album'];
            $medis = [];
            foreach ($media as $medium) {
                $path = str_replace('/img', '/app/image', $medium->url);
                $exist = File::exists(storage_path($path));
                $qry1 = TempImage::where('id', '=', $medium->id);
                if ($exist && $qry1->count() > 0 && !$medium->deleted) {
                    $temp = $qry1->first();
                    $medis [] = Medium::create(['discr' => 'downloads',
                        'type' => 'image', 'url' => $temp->url,
                        'user_id' => $user->id,
                        'post_id' => 0,
                        'album_id' => $album->id]);
                    $temp->delete();
                }
                if ($exist && $medium->deleted) {
                    File::delete($path);
                    if ($qry1->count() > 0) {
                        $temp = $qry1->first();
                        $temp->delete();
                    }
                }
                if (!$exist && $qry1->count() > 0) {
                    $temp = $qry1->first();
                    $temp->delete();
                }
            }
            if (sizeof($medis) > 0) {
                return response()->json(['post' => $post]);
            } else {
                if ($albumAndPost['post_created']) $post->delete();

                if ($albumAndPost['album_created']) $album->delete();

                return response()->json(['error' => 'No file found, upload again and retry']);
            }
        }
        return response()->json(['error' => 'Session expired ']);
    }


    public function uploadVideo(Request $request)
    {

        $qry = User::where('api_token', $request->api_token);
        if ($qry->count() > 0) {
            $user = $qry->first();
            $media = null;
            $albumAndPost = findOrCreateAlbumAndPost($user, $request->album, $request->title,
                $request->privacy, $request->description, $request->tags);
            $post = Post::create(['titre'=>$request->title,'token'=>str_random(12),
                'titre_canonical'=>str_replace(" ","_",$request->title),
                'tags'=>$request->tags,'privacy'=>$request->privacy, 'text'=>$request->description,
                'type'=>'post', 'parent_id'=>0,
                'user_id'=>$user->id]);
            $album = $albumAndPost['album'];
            if ($request->source == 'download') {
                if($request->hasFile('video')){
                    $video = $request->file('video');
                    $extension = $video->getClientOriginalExtension();
                    $nameH = str_replace(' ','_',$request->title) . '_' . rand(100000,999999). '.' ;
                    $filename = $nameH . $extension;
                    $video->storeAs('/video/', $filename);
                    $imageName = "";
                    if($request->thumbnail && $request->thumbnail != ""){
                        $image = $request->thumbnail;  // your base64 encoded
                        $image = str_replace('data:image/png;base64,', '', $image);
                        $image = str_replace(' ', '+', $image);
                        $imageName = "/img/thumbs/".$nameH.'png';
                        Storage::disk('local')->put("/image/thumbs/".$nameH.'png', base64_decode($image));
                    }

                    $media = Medium::create(['discr' => 'downloads',
                        'type' => 'video',
                        'source'=>$request->source,
                        'vid_length'=>$request->video_length,
                        'thumb_url'=>$imageName,
                        'url' => '/play/'.$filename,
                        'user_id' => $user->id,
                        'post_id' => $post->id,
                        'album_id' => $album->id]);
                }
                //File not found

            }elseif ($request->link){
                $media = Medium::create(['discr' => 'downloads',
                    'type' => 'video',
                    'source'=>$request->source,
                    'url' => $request->link,
                    'user_id' => $user->id,
                    'post_id' => $post->id,
                    'album_id' => $album->id]);
            }
            if($media != null){
                return response()->json(['post',$post]);
            }
            if ($albumAndPost['post_created']) $albumAndPost['post']->delete();
            if ($albumAndPost['album_created']) $album->delete();
            $post->delete();
            return response()->json(['error' => 'No file found, upload again and retry']);
        }
        return response()->json(['error' => 'Session expired ']);
    }


    public function testUpload(Request $request)
    {
        if ($request->hasFile('thumbnail')){
            return response()->json('File here');
        }

        $image = $request->thumbnail;  // your base64 encoded
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = time()."_".str_random(3). '.png';

        Storage::disk('local')->put("/video/thums/".$imageName, base64_decode($image));
        return response()->json(['NONOn    File '=> $request->thumbnail]);
    }

    public function userGallery($token)
    {
        $qry = User::where('api_token',$token);
        if ($qry->count() > 0){
            $user = $qry->first();
            $media = Medium::where([["user_id",'=',$user->id],['type','<>','video'],
                ['discr','=','profil']])->get();

            return response()->json(['media'=> $media]);
        }
        return response()->json(['error'=>'User not found']);
    }

}