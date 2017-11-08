<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Album;
use App\Model\Medium;
use App\Model\Photo;
use App\Model\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Session;

class _searchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keys = preg_split('/\s+/', $request->keyword, -1, PREG_SPLIT_NO_EMPTY);




        $albums = DB::table('albums')->where('albums.deleted_at','=',null)->where(function ($q) use ($keys) {
            foreach ($keys as $key){
                $q->orwhere('name', 'LIKE', "%$key%");
                }
            })->join('users','users.id','=','albums.owner_id')
            ->select('albums.*','users.id as uid','users.username','users.username_canonical')
            ->get();

        $users = DB::table('users')->where('users.deleted_at','=',null)->where(function ($q) use ($keys) {
            foreach ($keys as $key){
                $q->orwhere('username', 'LIKE', "%$key%")
                    ->orWhere('pseudo', 'LIKE', "%$key%")
                    ->orWhere('email', 'LIKE', "%$key%");
            }
        })->get();
        $media = DB::table('media')->where('media.deleted_at','=',null)->where(function ($q) use ($keys) {
            foreach ($keys as $key){
                $q->orwhere('titre', 'LIKE', "%$key%")
                    ->orWhere('media.description', 'LIKE', "%$key%")
                    ->orWhere('media.discr', 'LIKE', "%$key%");
            }
        })->join('users','users.id','=','media.user_id')
            ->select('media.*','users.id as uid','users.username','users.username_canonical')
            ->get();


      $props = ['discr', 'description', 'email', 'username', 'name','titre'];

        $results = $albums->merge($users);
        $results = $results->merge($media);
        $results = $results->sortByDesc(function($i, $k) use ($keys, $props) {
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

        return view('frontend.search.general_search', compact('results'));
    }


    public function getUsersImage($u_id = null)
    {
        $albums = Album::where('owner_id', Auth::id())
            ->where('owner_table','users')
            ->join('users','albums.owner_id','=','users.id')
            ->select('albums.*','users.username_canonical as username')
            ->get();
        return view('frontend.profile.ressource_image', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Entities.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        /*$this->validate($request, [
         'title' => 'required',
         'description' => 'max:300',
         'discr' => 'required'
     ]);*/
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $temp = Image::make($image)->save(storage_path('/media/image/user_uploads/' . $filename));
            if ($request->album_id != null){
                $qry = Album::where('id',$request->album_id);
                 if ($qry->count() > 0) {
                     $album = $qry->first();
                 }else{
                     $album = Album::where('owner_id',Auth::id())
                         ->where('owner_table','users')
                         ->where('name','uploads')->first();
                 }

            }else{
                $album = Album::where('owner_id',Auth::id())
                    ->where('owner_table','users')
                    ->where('name','uploads')->first();
            }
            $media = ['titre'=>$request->titre, 'description'=>$request->description,
                'discr'=>'image', 'user_id'=>Auth::id(),'album_id'=>$album->id];
            $album->updated_at = Carbon::now();
            $album->save();

            $mediaF = Medium::create($media);

            $foto = ['url'=> '/img/user_uploads/' . $filename, 'media_id'=>$mediaF->id];

            $fotoF = Photo::create($foto);

            Session::flash('flash_message', 'Medium added!');
        }



        return redirect()->route('upload.image');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $photo = Medium::where('media.id',$id)
            ->join('photos','media.id','=','photos.media_id')
            ->join('users','media.user_id','=','users.id')
            ->select('media.*','photos.url','users.username','users.email')->first();



        return view('admin.Entities.photo.show', compact('photo'));
    }



    public function upload()
    {

        $photos = null;

        $qry = DB::table('media')->where('user_id','=',Auth::id())
            ->where('discr','=','image');
        if ($qry->count() > 0){

            $photos = $qry->join('photos', 'media.id', '=', 'photos.media_id')
                ->select('media.*', 'photos.url')
                ->orderBy('created_at','desc')
                ->get();


        }

        return view('frontend.media.upload_img', compact('photos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

        $photo = $photo = Medium::where('media.id',$id)
            ->join('photos','media.id','=','photos.media_id')
            ->select('media.*','photos.url')->first();

        return view('admin.Entities.photo.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, Request $request)
    {
        
        $requestData = $request->all();
        
        $photo = Photo::findOrFail($id);
        $photo->update($requestData);

        Session::flash('flash_message', 'Photo updated!');

        return redirect('admin/photo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        DB::table('media')->where('id',$id)->destroy();

        Session::flash('flash_message', 'Photo deleted!');

        return redirect('admin/photo');
    }
}
