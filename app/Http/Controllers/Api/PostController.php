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
use App\Model\Notification;
use App\Model\Post;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{


    public function votePost($user_token, $post_id, $carton)
    {
        $qry = User::where('api_token', $user_token);
        if ($qry->count() > 0) {
            $user = $qry->first();
            $qry1 = Carton::where([['post_id', '=', $post_id], ['user_id', '=', $user->id]]);
            if ($qry1->count() > 0) {
                $vote = $qry1->first();
                $vote->couleur = $carton;
                $vote->save();
            } else {
                Carton::create(['couleur' => $carton, 'post_id' => $post_id, 'user_id' => $user->id]);
            }
            return response()->json(['cartons' => getPostCartons($post_id)]);
        }
        return response()->json(['error' => 'vote not counted']);
    }

    public function addPostTagHash($post, $owner)
    {

        $hashtags = getHashtags($post->text);
        $tags = getTags($post->text);

        foreach ($hashtags as $hashtag) {
            $hashtag = str_replace('#', '', $hashtag);
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
            $tag = str_replace('@', '', $tag);
            $qry = User::where('pseudo', '=', $tag);
            Log::info('taaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaag   ' . $tag);
            if ($qry->count() > 0) {
                $user = $qry->first();
                $newTag = Tag::create(['user_id' => $user->id, 'post_id' => $post->id]);
                $owner->prenom ?
                    $nom = $user->nom . ' ' . $user->prenom :
                    $nom = $user->nom . ' ~ ' . $user->pseudo;

                if ($post->user_id != $user->id) {
                    $notification = Notification::create(['description' => 'Mentioned your name on a post', 'titre' => $nom,
                        'objet_table' => 'posts', 'from_user_id' => $owner->id, 'to_user_id' => $user->id, 'object_id' => $post->id]);
                }
            }


        }
    }

    public function sendComment(Request $request)
    {
        $data = (array)json_decode($request->data);
        try{
            $qry = Post::where('token', $data['post_token']);
            $qry1 = User::where('api_token',$data['user_token']);
            if ($qry->count() > 0 && $qry1->count() > 0) {
                $post = $qry->first();
                $user = $qry1->first();
                $user->photo_url = profilePicFromUserId($user->id);

                $comment = Post::create(['titre'=>'comment_'.time(),'token'=>str_random(12),
                    'titre_canonical'=>'comment_'.time(),
                    'tags'=>"",'privacy'=>'public', 'text'=>$data['text'],
                    'type'=>'comment', 'parent_id'=>$post->id,
                    'user_id'=>$user->id]);

                $comment->user_token = $user->api_token;
                $comment->username = $user->username;
                $comment->cartons = getPostCartons($comment->id,true);
                $comment->photo_url = profilePicFromUserId($comment->key);
                $comment->total_comments = Post::where('parent_id',$comment->id)->count();
                return response()->json(['comment'=>$comment]);
            }
            return response()->json(['error'=>'Post not found']);
        }catch (\Exception $e){
            return response()->json(['error'=>$e]);
        }
    }

    public function getComments($post_token)
    {
        $parent = Post::where('token',$post_token)->first();
        $posts = Post::where([['parent_id', '=', $parent->id], ['type', '=', 'comment']])
            ->leftJoin('users','posts.user_id','=','users.id')
            ->select('posts.*','users.username','users.api_token as user_token','users.id as key')->paginate(100);
        foreach ($posts as $post){
            $post->photo_url = profilePicFromUserId($post->key);
            $post->cartons = getPostCartons($post->id);
            $post->total_comments = Post::where('parent_id',$post->id)->count();
        }
        return response()->json(['comments' => $posts]);
    }


    public function deletPost($id)
    {
        Post::where('id', '=', $id)->delete();
        return response()->json('ok');
    }

}