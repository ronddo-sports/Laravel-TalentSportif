<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Medium;
use App\Model\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class PhotoController extends Controller
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
                ->where('del','=',false)
                ->join('photos','media.id','=','photos.media_id')
                ->select('media.*','photos.url')
                ->paginate($perPage);
        }
       // dd(json_encode($photo));

        return view('admin.Entities.photo.index', compact('photo'));
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
        
        $requestData = $request->all();
        
        Photo::create($requestData);

        Session::flash('flash_message', 'Photo added!');

        return redirect('admin/photo');
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
        DB::table('media')->where('id',$id)->update(['del'=>true]);

        Session::flash('flash_message', 'Photo deleted!');

        return redirect('admin/photo');
    }
}
