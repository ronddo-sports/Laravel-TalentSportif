<?php

namespace App\Http\Controllers;

use App\Model\Album;
use App\Model\Medium;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{

    public function welcome() {

       $paginate = 3;

        $albums =DB::table('albums')->where('albums.deleted_at','=',null)
            ->join('users','users.id','=','albums.owner_id')
            ->select('albums.*','users.id as uid','users.username','users.username_canonical')
            ->get();

        $users = DB::table('users')->where('id','!=',Auth::id())->where('deleted_at','=',null)->get();
        $media = DB::table('media')->where('media.description','!=',11111111)->where('media.deleted_at','=',null)->join('users','users.id','=','media.user_id')
            ->select('media.*','users.id as uid','users.username','users.username_canonical')
            ->get();
        $merge = $albums->merge($users);
        $merge = $merge->merge($media);
        //$merge = ($albums->merge($users))->merge($media)->sortByDesc('created_at');
        /*
         *  custom pagination begins here because the merged
         *  collection is not supported by the query builder pagination
         * */
        $total = $merge->count();
        $maxpage = floor($total/$paginate);
        if (($total % $paginate) > 0){ $maxpage++; }
        if (isset($_GET['page']) && $_GET['page'] > 0){
            $page = $_GET['page'];
            if ($page > $maxpage){ $page = $maxpage; }
        }else{ $page = 1; }
        //send also the pagination data.
        $pagin = ['max'=>$maxpage,'total'=>$total,'current'=>$page];
        /*end pagination */
        $results = $merge->forPage($page, $paginate);
        //dd($pagination_data);
        //dd($results);
        return view('welcome', compact('results','pagin'));
    }


}
