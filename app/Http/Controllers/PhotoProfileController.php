<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\PhotoProfile;
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
            $photoprofile = PhotoProfile::where('discr', 'LIKE', "%$keyword%")
				->orWhere('del', 'LIKE', "%$keyword%")
				->orWhere('active', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $photoprofile = PhotoProfile::paginate($perPage);
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
        
        PhotoProfile::create($requestData);

        Session::flash('flash_message', 'PhotoProfile added!');

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
        $photoprofile = PhotoProfile::findOrFail($id);

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
        $photoprofile = PhotoProfile::findOrFail($id);

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
        
        $photoprofile = PhotoProfile::findOrFail($id);
        $photoprofile->update($requestData);

        Session::flash('flash_message', 'PhotoProfile updated!');

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
        PhotoProfile::destroy($id);

        Session::flash('flash_message', 'PhotoProfile deleted!');

        return redirect('admin/photo-profile');
    }
}
