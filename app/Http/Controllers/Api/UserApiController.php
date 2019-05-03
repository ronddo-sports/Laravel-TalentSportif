<?php

/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 9/14/2018
 * Time: 12:02
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Fan;
use App\Model\User;
use App\Model\UserStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserApiController extends Controller
{

    public function getByToken($token, Request $request)
    {
        $qry = User::where('api_token', $token)
            ->orWhere('api_token', '=', $request->token);
        if ($qry->count()) {
            $user = $qry->first();


            $user->last_login = Carbon::now();
            $user->save();
            $user->photo_url = profilePicFromUserId($user->id);
            $user->baniere_url = banierePicFromUserId($user->id);

            return response()->json(['user' => $user]);

        }
        return response()->json(['error' => 'User not found']);
    }

    public function getTopUsers($token = null)
    {
        $users = User::inRandomOrder()->limit(4)->get();
        $user_ = null;
        if ($token != null) {
            $qry = User::where('api_token', '=', $token);
            if ($qry->count() > 0) {
                $user_ = $qry->first();
            }
        }
        foreach ($users as $user) {
            $user->photo_url = profilePicFromUserId($user->id);
            $user->fan_number = countSubscribers($user->id);
            $user->cartons = countUserCartons($user->id);
            if ($user_ != null) {
                $user->isFollowed = isFollower($user_->id, $user->id);
            }
        }
        return response()->json(['users' => $users]);

    }

    public function getTopCategories()
    {
        $categories = UserStatus::inRandomOrder()->limit(6)->get();

        foreach ($categories as $category) {
            $category->count_users = User::where('user_status_id', '=', $category->id)->count();
        }
        return response()->json(['cats' => $categories]);

    }

    public function subscribe($owner_token, $subscriber_token, $value)
    {
        $value == 1 ? $value = true : $value = false;
        $qry_o = User::where('api_token', $owner_token);
        $qry_s = User::where('api_token', $subscriber_token);
        if ($qry_o->count() > 0 && $qry_s->count() > 0) {
            $owner = $qry_o->first();
            $user = $qry_s->first();
            $qry = Fan::where([['star_id', '=', $owner->id], ['fan_id', '=', $user->id]])
                ->orWhere([['star_id', '=', $user->id], ['fan_id', '=', $owner->id]]);
            if ($qry->count() > 0) {
                $fan = $qry->first();
                if ($fan->star_id == $user->id) {
                    $fan->star_follow = $value;
                    $fan->save();
                    return response()->json(['value' => $fan->star_follow]);
                } else {
                    $fan->fan_follow = $value;
                    $fan->save();
                    return response()->json(['value' => $fan->fan_follow]);
                }
            } else {
                $fan = Fan::create(['star_id' => $user->id, 'fan_id' => $owner->id, 'star_follow' => true]);
                return response()->json(['value' => $fan->star_follow]);
            }
        }
        return response()->json(['error' => 'Users not found']);

    }

    public function searchUsers(Request $request)
    {
        $data = (array)json_decode($request->data);
        $chaine = $data['chaine'];
        $best = [];
        $user_ = null;
        if (isset($data['token']) && $data['token'] != null) {
            $qry = User::where('api_token', '=', $data['token']);
            if ($qry->count() > 0) {
                $user_ = $qry->first();
            }
        }
        //Best Match
        $qry1 = User::where('username', '=', $chaine)
            ->orWhere('pseudo', '=', $chaine)
            ->orWhere('email', '=', $chaine);
        if ($qry1->count() > 0) {
            $best = $qry1->first();
            $best->photo_url = profilePicFromUserId($best->id);
            $best->fan_number = countSubscribers($best->id);
            $best->cartons = countUserCartons($best->id);
            if ($user_ != null) {
                $best->isFollowed = isFollower($user_->id, $best->id);
            }
        }
        /*Finding the rest of entries*/

        $keys = preg_split('/\s+/', $chaine, -1, PREG_SPLIT_NO_EMPTY);
        $users1 = DB::table('users')->where(function ($q) use ($keys) {
            foreach ($keys as $key) {
                $q->orwhere('username', 'LIKE', "%$key%");
                $q->orwhere('pseudo', 'LIKE', "%$key%");
                $q->orwhere('email', 'LIKE', "%$key%");
                $q->orwhere('pays', 'LIKE', "%$key%");
                $q->orwhere('discipline', 'LIKE', "%$key%");
            }
        })->get();
        $users2 = DB::table('user_statuses')->where(function ($q) use ($keys) {
            foreach ($keys as $key) {
                $q->orwhere('nom', 'LIKE', "%$key%");
            }
        })->join('users', 'users.user_status_id', '=', 'user_statuses.id')
            ->select( 'users.*')->get();

        $props = ['pays', 'discipline', 'email', 'username', 'username_canonical','ville'];

        $users = $users1->merge($users2);
        $users = $users->unique('id');
        $users = $users->sortByDesc(function($i, $k) use ($keys, $props) {
            // The bigger the weight, the higher the record
            $weight = 0;
            // Iterate through search terms
            foreach($keys as $searchTerm) {
                // Iterate through properties (address1, address2...)
                foreach($props as $prop) {
                    // Use strpos instead of %value% (cause php)
                    if(strpos( $prop, $searchTerm) !== false)
                        $weight += 1; // Increase weight if the search term is found
                }
            }

            return $weight;
        });

        foreach ($users as $user) {
            $user->photo_url = profilePicFromUserId($user->id);
            $user->fan_number = countSubscribers($user->id);
            $user->cartons = countUserCartons($user->id);
            if ($user_ != null) {
                $user->isFollowed = isFollower($user_->id, $user->id);
            }
        }


        return response()->json(['best'=>$best, 'users'=>$users]);
    }

}