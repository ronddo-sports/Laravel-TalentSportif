<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\UserGroup;
use Illuminate\Http\Request;
use Session;

class UserGroupController extends Controller
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
            $usergroup = UserGroup::where('type', 'LIKE', "%$keyword%")
				->orWhere('institution', 'LIKE', "%$keyword%")
				->orWhere('user_institution_id', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $usergroup = UserGroup::paginate($perPage);
        }

        return view('admin.user-group.index', compact('usergroup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user-group.create');
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
			'type' => 'required'
		]);
        $requestData = $request->all();
        
        UserGroup::create($requestData);

        Session::flash('flash_message', 'UserGroup added!');

        return redirect('admin/user-group');
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
        $usergroup = UserGroup::findOrFail($id);

        return view('admin.Entities.user-group.show', compact('usergroup'));
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
        $usergroup = UserGroup::findOrFail($id);

        return view('admin.Entities.user-group.edit', compact('usergroup'));
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
			'type' => 'required'
		]);
        $requestData = $request->all();
        
        $usergroup = UserGroup::findOrFail($id);
        $usergroup->update($requestData);

        Session::flash('flash_message', 'UserGroup updated!');

        return redirect('admin/user-group');
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
        UserGroup::destroy($id);

        Session::flash('flash_message', 'UserGroup deleted!');

        return redirect('admin/user-group');
    }
}
