<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\UserFederation;
use Illuminate\Http\Request;
use Session;

class UserFederationController extends Controller
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
            $userfederation = UserFederation::where('president', 'LIKE', "%$keyword%")
				->orWhere('Organisation', 'LIKE', "%$keyword%")
				->orWhere('user_organisation_id', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $userfederation = UserFederation::paginate($perPage);
        }

        return view('admin.Entities.user-federation.index', compact('userfederation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Entities.user-federation.create');
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
        
        UserFederation::create($requestData);

        Session::flash('flash_message', 'UserFederation added!');

        return redirect('admin/user-federation');
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
        $userfederation = UserFederation::findOrFail($id);

        return view('admin.Entities.user-federation.show', compact('userfederation'));
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
        $userfederation = UserFederation::findOrFail($id);

        return view('admin.Entities.user-federation.edit', compact('userfederation'));
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
        
        $userfederation = UserFederation::findOrFail($id);
        $userfederation->update($requestData);

        Session::flash('flash_message', 'UserFederation updated!');

        return redirect('admin/user-federation');
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
        UserFederation::destroy($id);

        Session::flash('flash_message', 'UserFederation deleted!');

        return redirect('admin/user-federation');
    }
}
