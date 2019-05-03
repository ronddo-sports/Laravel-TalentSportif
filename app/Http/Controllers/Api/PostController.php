<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 12/04/2017
 * Time: 00:25
 */
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Carton;
use App\Model\Hashtag;
use App\Model\HashtagPost;
use App\Model\Medium;
use App\Model\Notification;
use App\Model\Post;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{


    public function votePost($user_token,$post_id, $carton)
    {
        $qry = User::where('api_token',$user_token);
        if($qry->count() > 0){
            $user = $qry->first();
            $qry1 = Carton::where([['post_id','=',$post_id],['user_id','=',$user->id]]);
            if($qry1->count() > 0){
                $vote = $qry1->first();
                $vote->couleur = $carton;
                $vote->save();
            }else{
                Carton::create(['couleur'=>$carton, 'post_id'=>$post_id, 'user_id'=>$user->id]);
            }
            return response()->json(['carton'=>$carton]);
        }
        return response()->json(['error'=>'vote not counted']);
    }

    public function getByHashTag($hashtag)
    {
        //dd($qry = Hashtag::where('texte','LIKE', "$hashtag%")->get());
        $col = collect();
        $qry = Hashtag::where('texte','LIKE', "$hashtag%")
            ->Join('hashtag_posts','hashtags.id','=','hashtag_posts.id_hashtag')
            ->Join('posts','hashtag_posts.id_post','=','posts.id')
            ->orderBy('hashtags.texte')
            ->select('posts.*')->limit(50)->get();
        foreach ($qry as $post){
            if($post->parent_id > 0){
                $par = Post::find($post->parent_id);
                if($par->parent_id == 0){
                    $col->push($par);
                }
            }else{
                $col->push($post);
            }
        }
        $posts = $col->unique('id');


        foreach ($posts as $post) {

            $post->tags = Tag::where([['post_id','=',$post->id],['inline_tag','=',false]])
                ->join('users','tags.user_id', '=', 'users.id')
                ->select('users.nom','users.pseudo','users.id')
                ->get();

            $post->comments = post::where('parent_id', $post->id)
                ->orderby('updated_at','asc')
                ->get();

            $post->user = User::where('users.id', '=', $post->user_id)
                ->leftJoin('profile_imgs', function ($join) {
                    $join->on('users.id', '=', 'profile_imgs.user_id')
                        ->where('profile_imgs.type','=','profile')
                        ->where('profile_imgs.actif','=',true);
                })
                ->select('users.*', 'profile_imgs.photo_url')
                ->first();

            $post->medias = Medium::where('media.id_post', '=', $post->id)
                ->select('media.*')
                ->get();

            $post->likes = Like::where('likes.id_post', '=', $post->id)
                ->leftjoin('users', 'likes.id_user', '=', 'users.id')
                ->select('likes.*', 'users.*')
                ->get();

            $post->shares = Share::where('shares.id_post', '=', $post->id)
                ->leftjoin('users', 'shares.id_user', '=', 'users.id')
                ->select('shares.*', 'users.*')
                ->get();

            foreach ($post->comments as $comment) {

                $comment->replys = post::where('parent_id', $comment->id)
                    ->orderby('updated_at', 'asc')
                    ->get();

                $comment->user = User::where('users.id', '=', $comment->user_id)
                    ->leftJoin('profile_imgs', function ($join) {
                        $join->on('users.id', '=', 'profile_imgs.user_id')
                            ->where('profile_imgs.type','=','profile')
                            ->where('profile_imgs.actif','=',true);
                    })
                    ->select('users.*', 'profile_imgs.photo_url')
                    ->first();

                $comment->medias = Medium::where('media.id_post', '=', $comment->id)
                    ->select('media.*')
                    ->get();

                $comment->likes = Like::where('likes.id_post', '=', $comment->id)
                    ->leftjoin('users', 'likes.id_user', '=', 'users.id')
                    ->select('likes.*', 'users.*')
                    ->get();

                foreach ($comment->replys as $reply) {
                    $reply->medias = Medium::where('media.id_post', '=', $reply->id)
                        ->select('media.*')
                        ->get();

                    $reply->user = User::where('users.id', '=', $reply->user_id)->leftJoin('profile_imgs', function ($join) {
                        $join->on('users.id', '=', 'profile_imgs.user_id')
                            ->where('profile_imgs.type','=','profile')
                            ->where('profile_imgs.actif','=',true);
                    })
                        ->select('users.*', 'profile_imgs.photo_url')
                        ->first();

                    $reply->likes = Like::where('likes.id_post', '=', $reply->id)
                        ->leftjoin('users', 'likes.id_user', '=', 'users.id')
                        ->select('likes.*', 'users.*')
                        ->get();
                }
            }
        }

        return response()->json($posts->values()->all());
    }

    public function getOne($id)
    {
        $post = post::where('posts.type', 'post')
            ->where('id', $id)
            ->where('parent_id', 0)
            ->select('posts.*')
            ->orderby('updated_at', 'desc')
            ->first();

        $post->comments = post::where('parent_id', $post->id)
            ->orderby('updated_at', 'desc')
            ->get();

        $post->user = User::where('users.id', '=', $post->user_id)
            ->leftJoin('profile_imgs', function ($join) {
                $join->on('users.id', '=', 'profile_imgs.user_id')
                    ->where('profile_imgs.type','=','profile')
                    ->where('profile_imgs.actif','=',true);
            })
            ->select('users.*', 'profile_imgs.photo_url')
            ->first();


        $post->medias = Medium::where('media.id_post', '=', $post->id)
            ->select('media.*')
            ->get();

        $post->likes = Like::where('likes.id_post', '=', $post->id)
            ->leftjoin('users', 'likes.id_user', '=', 'users.id')
            ->select('likes.*', 'users.*')
            ->get();

        $post->shares = Share::where('shares.id_post', '=', $post->id)
            ->leftjoin('users', 'shares.id_user', '=', 'users.id')
            ->select('shares.*', 'users.*')
            ->get();

        foreach ($post->comments as $comment) {

            $comment->replys = post::where('parent_id', $comment->id)
                ->orderby('updated_at', 'desc')
                ->get();

            $comment->user = User::where('users.id', '=', $comment->user_id)
                ->leftJoin('profile_imgs', function ($join) {
                    $join->on('users.id', '=', 'profile_imgs.user_id')
                        ->where('profile_imgs.type','=','profile')
                        ->where('profile_imgs.actif','=',true);
                })
                ->select('users.*', 'profile_imgs.photo_url')
                ->first();

            $comment->medias = Medium::where('media.id_post', '=', $comment->id)
                ->select('media.*')
                ->get();

            $comment->likes = Like::where('likes.id_post', '=', $comment->id)
                ->leftjoin('users', 'likes.id_user', '=', 'users.id')
                ->select('likes.*', 'users.*')
                ->get();

            foreach ($comment->replys as $reply) {
                $reply->medias = Medium::where('media.id_post', '=', $reply->id)
                    ->select('media.*')
                    ->get();

                $reply->user = User::where('users.id', '=', $reply->user_id)->leftJoin('profile_imgs', function ($join) {
                    $join->on('users.id', '=', 'profile_imgs.user_id')
                        ->where('profile_imgs.type','=','profile')
                        ->where('profile_imgs.actif','=',true);
                })
                    ->select('users.*', 'profile_imgs.photo_url')
                    ->first();

                $reply->likes = Like::where('likes.id_post', '=', $reply->id)
                    ->leftjoin('users', 'likes.id_user', '=', 'users.id')
                    ->select('likes.*', 'users.*')
                    ->get();
            }
        }


        return response()->json($post);
    }

    public function getComment($id)
    {
        $comment = post::where('id', $id)
            ->select('posts.*')
            ->orderby('updated_at', 'desc')
            ->first();

        $comment->replys = post::where('parent_id', $comment->id)
            ->orderby('updated_at', 'desc')
            ->get();

        $comment->user = User::where('users.id', '=', $comment->user_id)
            ->leftJoin('profile_imgs', function ($join) {
                $join->on('users.id', '=', 'profile_imgs.user_id')
                    ->where('profile_imgs.type','=','profile')
                    ->where('profile_imgs.actif','=',true);
            })
            ->select('users.*', 'profile_imgs.photo_url')
            ->first();


        $comment->medias = Medium::where('media.id_post', '=', $comment->id)
            ->select('media.*')
            ->get();

        $comment->likes = Like::where('likes.id_post', '=', $comment->id)
            ->leftjoin('users', 'likes.id_user', '=', 'users.id')
            ->select('likes.*', 'users.*')
            ->get();

        foreach ($comment->replys as $reply) {

            $reply->user = User::where('users.id', '=', $reply->user_id)
                ->leftJoin('profile_imgs', function ($join) {
                    $join->on('users.id', '=', 'profile_imgs.user_id')
                        ->where('profile_imgs.type','=','profile')
                        ->where('profile_imgs.actif','=',true);
                })
                ->select('users.*', 'profile_imgs.photo_url')
                ->first();

            $reply->medias = Medium::where('media.id_post', '=', $reply->id)
                ->select('media.*')
                ->get();

            $reply->likes = Like::where('likes.id_post', '=', $reply->id)
                ->leftjoin('users', 'likes.id_user', '=', 'users.id')
                ->select('likes.*', 'users.*')
                ->get();

        }


        return response()->json($comment);
    }

    public function getCommentReplys($id_comment)
    {
        $pageindex = 2;

        $replys = post::where('parent_id', $id_comment)
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->join('media', 'media.id_post', 'posts.id')
            ->orderby('updated_at', 'desc')
            ->paginate($pageindex, ['*'], 'reply' . $id_comment);

        foreach ($replys as $reply) {

            $reply->medias = Medium::where('media.id_post', '=', $reply->id)
                ->select('media.*')
                ->get();

            $reply->user = User::where('users.id', '=', $reply->user_id)
                ->leftjoin('profile_imgs', 'profile_imgs.user_id', '=', 'users.id')
                ->select('users.*', 'profile_imgs.photo_url')
                ->get();

            $reply->likes = Like::where('likes.id_post', '=', $reply->id)
                ->leftjoin('users', 'likes.id_user', '=', 'users.id')
                ->select('likes.*', 'users.*')
                ->get();
        }
        return response()->json($replys);
    }

    public function addPostTagHash($post,$owner)
    {

        $hashtags = getHashtags($post->text);
        $tags = getTags($post->text);

        foreach ($hashtags as $hashtag) {
            $hashtag = str_replace('#','',$hashtag);
            $qry = Hashtag::where('texte', $hashtag);
            $hast_post = new HashtagPost();
            if ($qry->count() == 0) {
                $hash = new Hashtag();
                $hash->texte = $hashtag;
                $hash->save();
                $hast_post->id_post = $post->id;
                $hast_post->id_hashtag = $hash->id;
            } else {
                $test = $qry->first();
                $hast_post->id_post = $post->id;
                $hast_post->id_hashtag = $test->id;
            }
            $hast_post->save();

        }
        foreach ($tags as $tag) {
            $tag = str_replace('@','',$tag);
            $qry = User::where('pseudo', '=', $tag);
            Log::info('taaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaag   '.$tag);
            if($qry->count() > 0){
                $user = $qry->first();
                $newTag = Tag::create(['user_id'=> $user->id,'post_id'=> $post->id]);
                $owner->prenom ?
                    $nom = $user->nom .' '. $user->prenom :
                    $nom = $user->nom . ' ~ ' . $user->pseudo;

                if($post->user_id != $user->id){
                    $notification =  Notification::create(['description'=> 'Mentioned your name on a post', 'titre'=>$nom,
                        'objet_table'=>'posts', 'from_user_id'=>$owner->id, 'to_user_id'=>$user->id, 'object_id'=>$post->id]);
                }
            }



        }
    }

    /**
     * Enregistre un commentaire envoye depuis le mobile
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendComment(Request $request)
    {
        $data = (array)json_decode($request->data);
        if($data['id']){
            $post = Post::where('id','=',$data['id'])->first();
            $post->text = $data['postMsg'];
            $post->save();
        }else{
            $var = ['lieux'=>'', 'text'=>$data['postMsg'], 'type'=>'comment', 'humeur'=>'happy', 'droits'=>10,
                'parent_id'=> $data['post_id'], 'user_id'=> $data['user_id']];
            $post = Post::create($var);
        }

        $this->addPostTagHash($post, User::find($post->user_id));

        if(isset($data['audio']) && $data['audio'] !== ''){
            $media = new Medium();
            $media->url = $data['audio'];
            $media->type = 'audio';
            $media->duree = 10;
            $media->id_post = $post->id;
            $media->save();
        }

        return $this->getComment($post->id);

    }

    /**
     * Enregistre un commentaire envoye depuis le mobile
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendReply(Request $request)
    {
        $data = (array)json_decode($request->data);

        $var = ['lieux'=>'', 'text'=>$data['postMsg'], 'type'=>'reply', 'humeur'=>'', 'droits'=>0, 'parent_id'=> $data['post_id'], 'user_id'=>$data['user_id']];
        $post = Post::create($var);

        return $this->getCommentReplys($post->id);

    }

    public function tempoImages(Request $request)
    {
        Log::info($request);
        if ($request->hasFile('image')){

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();

            $temp = Image::make($image)->save(storage_path('/app/image/temps/' . $filename));

            $media = ['url'=>'/img/temps/' . $filename,'user_token'=>'efkkjdgjds','in_use'=>true];
            $fine = '/img/temps/' . $filename;

            return response()->json($fine);
        }
        return response()->json('le ndem');
    }

    public function deletPost($id)
    {
        Post::where('id','=',$id)->delete();
        return response()->json('ok');
    }

}