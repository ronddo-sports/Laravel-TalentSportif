<?php
/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 11/4/2018
 * Time: 00:54
 */

use App\Model\Conversation;
use App\Model\Fan;
use App\Model\Message;
use App\Model\Notification;
use App\Model\Participant;
use App\Model\User;
use Illuminate\Support\Facades\DB;


if (!function_exists('giveFollowers')) {

    /**
     * From the user id given it gives a collection containing
     * All friends of the user
     *
     * @param $folder
     */
    function giveFollowers($fan_id)
    {
        $star = Fan::where([['star_id', $fan_id], ['fan_follow', true]])
            ->leftJoin('users', function ($join) {
                $join->on('fans.fan_id', '=', 'users.id');
            })
            ->select('users.*', 'fans.star_block as blocked', 'fans.star_privacy as privacy')
            ->get();
        $fan = Fan::where([['fan_id', $fan_id], ['star_follow', true]])
            ->leftJoin('users', function ($join) {
                $join->on('fans.star_id', '=', 'users.id');
            })
            ->select('users.*', 'fans.fan_block as blocked', 'fans.fan_privacy as privacy', 'fans.created_at')
            ->get();
        $followers = $star->merge($fan);


        return $followers;
    }
}
if (!function_exists('giveFollows')) {

    /**
     * From the user id given it gives a collection containing
     * All friends of the user
     *
     * @param $folder
     */
    function giveFollows($id)
    {
        $star = Fan::where([['star_id', $id], ['star_follow', true]])
            ->leftJoin('users', function ($join) {
                $join->on('fans.fan_id', '=', 'users.id');
            })
            ->select('users.*', 'fans.star_block as blocked', 'fans.star_privacy as privacy')
            ->get();
        $fan = Fan::where([['fan_id', $id], ['fan_follow', true]])
            ->leftJoin('users', function ($join) {
                $join->on('fans.star_id', '=', 'users.id');
            })
            ->select('users.*', 'fans.fan_block as blocked', 'fans.fan_privacy as privacy', 'fans.created_at')
            ->get();
        $friends = $star->merge($fan);
        return $friends;
    }
}

if (!function_exists('countSubscribers')) {

    /**
     * Counts the number of friends give bythe give friends method
     * @param $folder
     */
    function countSubscribers($fan_id)
    {
        $qry = Fan::where([['star_id', $fan_id], ['fan_follow', true]])
            ->orWhere([['fan_id', $fan_id], ['star_follow', true]]);
        return $qry->count();
    }
}

if (!function_exists('countFollows')) {

    /**
     * Counts the number of friends give bythe give friends method
     * @param $folder
     */
    function countFollows($id)
    {
        return giveFollows($id)->count();
    }
}

if (!function_exists('countUserCartons')) {

    /**
     * Counts the number of friends give bythe give friends method
     * @param $folder
     */
    function countUserCartons($uid)
    {
        $qry = \App\Model\Post::where('posts.user_id',$uid)
            ->leftJoin('cartons','posts.id','=','cartons.post_id');
       return $qry->count();
    }
}

if (!function_exists('isFollower')) {

    /**
     * @param $follower_id
     * @param $followed_id
     * @return true if $follower_id follows $followed_id
     */
    function isFollower($follower_id, $followed_id)
    {
        $qry = Fan::where([['star_id', $follower_id],['fan_id', $followed_id], ['star_follow', true]])
            ->orWhere([['fan_id', $follower_id],['star_id', $followed_id], ['fan_follow', true]]);

        return $qry->count() > 0;
    }
}

if (!function_exists('isFollowed')) {

    function isFollowed($fan_id, $star_id)
    {
        return isFollower($fan_id, $star_id);
    }
}

if (!function_exists('isblock')) {

    /**
     * @param $star_id
     * @param $fan_id
     * @return boollean
     * @description returns true if $blocker blocks $blocked
     */
    function isblock($blocker_id, $blocked_id)
    {
        $qry = Fan::where([['star_id', $blocker_id],['fan_id', $blocked_id], ['star_block', true]])
            ->orWhere([['fan_id', $blocker_id],['star_id', $blocked_id], ['fan_block', true]]);

        return $qry->count() > 0;
    }
}

if (!function_exists('getHashtags')) {

    /**
     * finds all the hashtags containd in a string
     * @param $string
     * @return array|bool
     */
    function getHashtags($string)
    {
        $hashtags = FALSE;
        preg_match_all("/(#\w+)/u", $string, $matches);
        if ($matches) {
            $hashtagsArray = array_count_values($matches[0]);
            $hashtags = array_keys($hashtagsArray);
        }
        return $hashtags;
    }
}

if (!function_exists('getTags')) {

    /**
     * finds all the tags containd in a string
     * @param $string
     * @return array|bool
     */
    function getTags($string)
    {
        $hashtags = FALSE;
        preg_match_all("/(@\w+)/u", $string, $matches);
        if ($matches) {
            $hashtagsArray = array_count_values($matches[0]);
            $hashtags = array_keys($hashtagsArray);
        }
        return $hashtags;
    }
}

if (!function_exists('getIbConvers')) {

    function getIbConvers($owner_id, $star_id)
    {


        $qry = Conversation::where([['user_one', $owner_id], ['user_two', $star_id]])
            ->orWhere([['user_one', $star_id], ['user_two', $owner_id]]);

        if ($qry->count() == 0) {
            $vals = ['user_one' => $owner_id, 'user_two' => $star_id, 'status' => 1,
                'name' => 'ib-' . $star_id . '-' . $owner_id];
            $thread = Conversation::create($vals);
        } else {
            $thread = $qry->first();
        }
        $thread->to_user = User::where('users.id', $star_id)
            ->leftJoin('profile_imgs', function ($join) {
                $join->on('users.id', '=', 'profile_imgs.user_id')
                    ->where('profile_imgs.type', '=', 'profile')
                    ->where('profile_imgs.actif', '=', true);
            })->select('users.*', 'profile_imgs.photo_url')->first();
        $thread->last_message = Message::where('conversation_id', '=', $thread->id)
            ->leftJoin('users', 'messages.user_id', '=', 'users.id')
            ->select('messages.*', 'users.nom')
            ->orderBy('created_at', 'desc')->first();
        $thread->unread = Message::where('conversation_id', '=', $thread->id)
            ->where('user_id', '<>', $owner_id)
            ->where('is_seen', '=', false)->count();

        return $thread;
    }
}

if (!function_exists('getUserById')) {
    function getUserById($id)
    {
        return User::find($id);
    }
}

if (!function_exists('gotoAdmin')) {
    function gotoAdmin()
    {
        return redirect('admin/');
    }
}

if(!function_exists('parseHashtag')){
    function parseHashtag($text){
        $hashtags = getHashtags($text);

        foreach ($hashtags as $hashtag) {


            $text= str_replace($hashtag,'<a onclick="loadHashtags(\''.substr($hashtag,1,strlen($hashtag)).'\')" style="font-weight: bold; cursor: pointer">'.$hashtag.'</a>',$text);

        }
        return $text;
    }
}

if(!function_exists('parseTags')){
    function parseTag($text,$id_post){
        $hashtags = getTags($text);

        foreach ($hashtags as $hashtag) {

            $users = User::select('users.*',
                DB::raw("CONCAT(users.prenom,users.nom) as full_name"))

                ->where(DB::raw("lower(CONCAT(users.prenom,users.nom))"), '=', strtolower(substr($hashtag,1,strlen($hashtag))))
                ->orwhere(DB::raw("lower(CONCAT(users.nom,users.prenom))"), '=', strtolower(substr($hashtag,1,strlen($hashtag))))

                ->get();
            \Illuminate\Support\Facades\Log::info($users);

            if(strlen($users)>0)
                $text= str_replace($hashtag,'<a href="/profile/'.$users[0]->id.'" style="font-weight: bold; cursor: pointer; color: #0BA4E0">'.$hashtag.'</a>',$text);

        }
        return $text;
    }
}

if (! function_exists('addIbMsgNotification')) {
    //['description', 'titre', 'objet_table', 'from_user_id', 'to_user_id', 'object_id','is_seen']
    function addNewMsgNotification($from_user_id ,$to_user_id,$conv_id, $msg_number ,$last_msg_text, $last_msg_id)
    {
        $notification = null;
        if($msg_number > 0){
            $from_user = User::find($from_user_id);
            $from_user->prenom ?
                $nom = $from_user->nom .' '. $from_user->prenom :
                $nom = $from_user->nom . ' ~ ' . $from_user->pseudo;

            $qry = Notification::where([['from_user_id','=', $from_user_id],['to_user_id','=',$to_user_id],['object_id','=',$conv_id],
                ['objet_table','=','conversations']]);
            if ($qry->count() > 0){
                $notification = $qry->first();
                if($notification->target_id !== $last_msg_id){
                    $notification->target_id = $last_msg_id;
                    $notification->description = $last_msg_text;
                    $notification->titre = $nom . ' #'.$msg_number;
                    $notification->is_seen = false;
                    $notification->save();
                }else{

                }


            }else{


                $notification = Notification::create(['description'=> $last_msg_text ,
                    'titre' => $nom . ' @'.$msg_number, 'objet_table'=>'conversations','from_user_id' => $from_user_id, 'to_user_id'=> $to_user_id,
                    'object_id'=> $conv_id,'target_id'=> $last_msg_id]);
            }
        }
        return $notification;

    }
}

if(!function_exists('sendSms')) {
    function sendSms($tel, $message)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'http://api.infobip.com/sms/1/text/query?username=tuechecor&password=@-017FNI/MRO&to=' . $tel . '&text=' . $message,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json"
            ),
        ));


        //dd('http://api.infobip.com/sms/1/text/query?username=tuechecor&password=@-017FNI/MRO&to='.$tel.'&text='.$message);
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            return $response;
        }
    }
}

if(!function_exists('usersAmount')){
    function usersAmount(){
        return count(User::all());
    }
}

if(!function_exists('sendVerifSms')){
    function sendVerifSms($tel, $code)
    {
        return sendSms($tel,'ICEBREAKT%20Code:%20'.$code.'%20Valid%20for%2010minutes');
    }
}

if(!function_exists('sendVerifSms')){
    function sendVerifSms($tel, $code)
    {
        return sendSms($tel,'ICEBREAKT%20Code:%20'.$code.'%20Valid%20for%2010minutes');
    }
}

if(!function_exists('getLinkTittle')){

    /**
     * @param $url
     * @return array|null
     * @description Returns data from a given link
     */
    function getLinkData($url)
    {
        if (filter_var($url, FILTER_VALIDATE_URL) === FALSE){
            return null;
        }else {
            //tittle
            $html = file_get_contents($url);
            $y = explode("<title>", $html);
            $x = explode("</title>", $y[1]);
            $tittle = $x[0];
            //image
            $doc = new \DOMDocument();

            @$doc->loadHTML($html);
            $tags = $doc->getElementsByTagName('img');

            $arr = array();

            foreach ($tags as $tag) { $arr[] = $tag->getAttribute('src'); }

            if(!empty($arr)){
                $dmn = parse_url($url);

                if (filter_var($arr[0], FILTER_VALIDATE_URL) === FALSE){
                    $image = $dmn['scheme'].'://'.$dmn['host'].$arr[0];
                }else{
                    $image = $arr[0];
                }
            }else {
                $image = null;
            }

            return ['title'=>$tittle, 'image'=>$image];
        }
    }
}

if(!function_exists('postsAmount')){

    /**
     * @return int
     * @description Counts the number of posts
     */
    function postsAmount(){
        return count(\App\Model\Post::Where('type','post')->get());
    }
}

