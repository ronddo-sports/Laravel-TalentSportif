<?php

/**
 * Created by PhpStorm.
 * User: Tidjani
 * Date: 9/14/2018
 * Time: 12:02
 */

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function getByToken($token,Request $request)
    {
        $qry = User::where('api_token',$token)
            ->orWhere('api_token','=',$request->token);
        if($qry->count())
        {
            $user = $qry->first();


                $user->last_login = Carbon::now();
                $user->save();
                $user->photo_url = profilePicFromUserId($user->id);
                $user->baniere_url = banierePicFromUserId($user->id);

                return response()->json(['user'=>$user]);

        }
        return response()->json(['error'=>'User not found']);
}
}