<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Model\Medium;
use App\Model\Message;
use App\Model\User;
use Illuminate\Http\Request;
use Session;
use App\Model\Album;

class _AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request,$u_cononic,$a_name, $a_id)
    {
        $qry = Album::where('id',$a_id)
            ->where('name',$a_name);
        if( $qry->count() > 0){
            $album = $qry->first();
        }else{
            $qry1 = User::where('username_canonical',$u_cononic);
            if ($qry1->count() > 0){
                $user = $qry1->first();
                $qry = Album::where('owner_id',$user->id)
                    ->where('owner_table','users')
                    ->where('name',$a_name);
                if( $qry->count() > 0){
                    $album = $qry->first();
                }
            }else{
                return view('errors.404',['msg'=>'Album Introuvable. Il a du etre suprimer']);
            }
        }
        $images = Medium::where('album_id',$album->id)
            ->where('discr','image')
            ->leftJoin('photos','media_id','=','media.id')
            ->select('media.*','photos.url')
            ->get();
        $videos = Medium::where('album_id',$album->id)
            ->where('discr','video')
            ->leftJoin('videos','media_id','=','media.id')
            ->select('media.*','videos.url')
            ->get();

        return view('frontend.media.showAlbum', compact('images', 'videos','album'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.message.create');
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
			'title' => 'required|max:10'
		]);
        $requestData = $request->all();
        
        Message::create($requestData);

        Session::flash('flash_message', 'Message added!');

        return redirect('admin/message');
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
        $message = Message::findOrFail($id);

        return view('admin.message.show', compact('message'));
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
        $message = Message::findOrFail($id);

        return view('admin.message.edit', compact('message'));
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
			'title' => 'required|max:10'
		]);
        $requestData = $request->all();
        
        $message = Message::findOrFail($id);
        $message->update($requestData);

        Session::flash('flash_message', 'Message updated!');

        return redirect('admin/message');
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
        Message::destroy($id);

        Session::flash('flash_message', 'Message deleted!');

        return redirect('admin/message');
    }
}
