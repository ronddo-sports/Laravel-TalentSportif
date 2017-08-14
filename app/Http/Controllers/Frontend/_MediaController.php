<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Model\Medium;
use App\Model\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Session;

class _MediaController extends Controller
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
            $media = Medium::where('titre', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->orWhere('discr', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $media = Medium::paginate($perPage);
        }

        return view('admin.media.index', compact('media'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.media.create');
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

            $media = ['titre'=>$request->titre, 'description'=>$request->description,
                      'discr'=>'image', 'user_id'=>Auth::user()->id];

            $mediaF = Medium::create($media);

            $foto = ['url'=> '/img/user_uploads/' . $filename, 'media_id'=>$mediaF->id];

            $fotoF = Photo::create($foto);

            Session::flash('flash_message', 'Medium added!');
        }



        return redirect()->route('upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function upload()
    {

        $photos = null;

        $qry = DB::table('media')->where('user_id','=',Auth::id())
                            ->where('discr','=','image')
                            ->where('del','=',false);
        if ($qry->count() > 0){

            $photos = $qry->join('photos', 'media.id', '=', 'photos.media_id')
                ->select('media.*', 'photos.url')
                ->orderBy('created_at','desc')
                ->get();


        }

        return view('frontend.media.upload', compact('photos'));
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
        $medium = Medium::findOrFail($id);

        return view('admin.media.edit', compact('medium'));
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
        $this->validate($request, [
			'title' => 'required',
			'description' => 'max:300',
			'discr' => 'required'
		]);
        $requestData = $request->all();
        
        $medium = Medium::findOrFail($id);
        $medium->update($requestData);

        Session::flash('flash_message', 'Medium updated!');

        return redirect('admin/media');
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
        Medium::destroy($id);

        Session::flash('flash_message', 'Medium deleted!');

        return redirect('admin/media');
    }
}
