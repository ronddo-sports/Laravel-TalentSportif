<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Model\UserStatus;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Session;

class UserStatusController extends Controller
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
            $userstatus = UserStatus::where('nom', 'LIKE', "%$keyword%")
				->orWhere('groupe', 'LIKE', "%$keyword%")
				->orWhere('type', 'LIKE', "%$keyword%")
				->orWhere('logo_url', 'LIKE', "%$keyword%")
				->orWhere('enabled', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $userstatus = UserStatus::paginate($perPage);
        }

        return view('admin.user-status.index', compact('userstatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user-status.create');
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
			'nom' => 'required',
			'groupe' => 'required|numeric',
            'logo_url'=> 'required|image'

		]);
        if ($request->hasFile('logo_url')) {
            $image = $request->file('logo_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $temp = Image::make($image)->save(storage_path('/media/image/status/' . $filename));
        $request->logo_url = $filename;
        }
        $requestData = $request->all();
        $requestData['type'] = str_replace(' ','_',$request->nom);
        UserStatus::create($requestData);

        Session::flash('flash_message', 'UserStatus added!');

        return redirect('admin/user-status');
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
        $userstatus = UserStatus::findOrFail($id);

        return view('admin.user-status.show', compact('userstatus'));
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
        $userstatus = UserStatus::findOrFail($id);

        return view('admin.user-status.edit', compact('userstatus'));
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
			'nom' => 'required',
			'groupe' => 'required',
			'groupe' => 'required'
		]);
        $requestData = $request->all();
        
        $userstatus = UserStatus::findOrFail($id);
        $userstatus->update($requestData);

        Session::flash('flash_message', 'UserStatus updated!');

        return redirect('admin/user-status');
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
        UserStatus::destroy($id);

        Session::flash('flash_message', 'UserStatus deleted!');

        return redirect('admin/user-status');
    }
}
