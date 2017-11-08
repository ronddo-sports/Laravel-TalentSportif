<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;

class _VideoController extends Controller
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
            $video = Video::where('url', 'LIKE', "%$keyword%")
				->orWhere('duree', 'LIKE', "%$keyword%")
				->orWhere('media_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $video = Video::paginate($perPage);
        }

        return view('admin.Entities.video.index', compact('video'));
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

        $videos = null;

        $qry = DB::table('media')->where('user_id','=',Auth::id())
            ->where('discr','=','video');
        if ($qry->count() > 0){

            $videos = $qry->join('videos', 'media.id', '=', 'videos.media_id')
                ->select('media.*', 'video.url')
                ->orderBy('created_at','desc')
                ->get();


        }

        return view('frontend.media.upload_vid', compact('videos'));
    }

    public function getUsersVideos($id = null)
    {
        return view('frontend.profile.ressource_video');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Entities.video.create');
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
        $this->validate($request, [
			'url' => 'required'
		]);
        $requestData = $request->all();
        
        Video::create($requestData);

        Session::flash('flash_message', 'Video added!');

        return redirect('admin/video');
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
        $video = Video::findOrFail($id);

        return view('admin.Entities.video.show', compact('video'));
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
        $video = Video::findOrFail($id);

        return view('admin.Entities.video.edit', compact('video'));
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
			'url' => 'required'
		]);
        $requestData = $request->all();
        
        $video = Video::findOrFail($id);
        $video->update($requestData);

        Session::flash('flash_message', 'Video updated!');

        return redirect('admin/video');
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
        Video::destroy($id);

        Session::flash('flash_message', 'Video deleted!');

        return redirect('admin/video');
    }
}
