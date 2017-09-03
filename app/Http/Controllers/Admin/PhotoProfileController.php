<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Album;
use Illuminate\Http\Request;
use Session;

class PhotoProfileController extends Controller
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
            $photoprofile = Album::where('discr', 'LIKE', "%$keyword%")
				->orWhere('del', 'LIKE', "%$keyword%")
				->orWhere('active', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $photoprofile = Album::paginate($perPage);
        }

        return view('admin.photo-profile.index', compact('photoprofile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.photo-profile.create');
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
        
        Album::create($requestData);

        Session::flash('flash_message', 'Album added!');

        return redirect('admin/photo-profile');
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
        $photoprofile = Album::findOrFail($id);

        return view('admin.photo-profile.show', compact('photoprofile'));
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
        $photoprofile = Album::findOrFail($id);

        return view('admin.photo-profile.edit', compact('photoprofile'));
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
        
        $photoprofile = Album::findOrFail($id);
        $photoprofile->update($requestData);

        Session::flash('flash_message', 'Album updated!');

        return redirect('admin/photo-profile');
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
        Album::destroy($id);

        Session::flash('flash_message', 'Album deleted!');

        return redirect('admin/photo-profile');
    }
}
