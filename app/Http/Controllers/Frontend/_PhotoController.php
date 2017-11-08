<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Album;
use App\Model\Medium;
use App\Model\Photo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Session;

class _PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $photo = Medium::where('titre', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('discr', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->join('photos','media.id','=','photos.media_id')
                ->select('media.*','photos.url')
                ->paginate($perPage);
        } else {
            $photo = DB::table('media')
                ->join('photos','media.id','=','photos.media_id')
                ->select('media.*','photos.url')
                ->paginate($perPage);
        }
       // dd(json_encode($photo));

        return view('admin.Entities.photo.index', compact('photo'));
    }


    public function getUsersImage($u_id = null)
    {
        if($u_id == null){
            $qry = Album::where('owner_id', Auth::id());
        }else{
            $qry = Album::where('owner_id', $u_id);
        }
        $albums = $qry->where('owner_table','users')
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
    public function store(Request $request, $albn = null)
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

        if ($albn = null){
            return redirect()->route('upload.image');
        }
        return redirect()->route('album.get',['a_name'=> $album->name ,
            'u_cononic'=>Auth::user()->username_canonical ,'a_id'=>$album->id]);

    }

    public function storeProfile(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $temp = Image::make($image)->save(storage_path('/media/image/user_uploads/' . $filename));

            $media = ['titre'=>0000000, 'description'=>11111111,
                      'discr'=>$request->discr , 'user_id'=>Auth::id()];

            $ancien = Medium::where('user_id',Auth::id())
                    ->where('actif',true)
                    ->where('discr',$request->discr)->get();
            foreach ($ancien as $item){
                $item->actif = false;
                $item->save();
            }
            $mediaF = Medium::create($media);

            $foto = ['url'=> '/img/user_uploads/' . $filename, 'media_id'=>$mediaF->id];

            Photo::create($foto);



            Session::flash('flash_message', 'Medium added!');
        }
        return redirect()->route('home');
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
