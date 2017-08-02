<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\UserOrganisation;
use Illuminate\Http\Request;
use Session;

class UserOrganisationController extends Controller
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
            $userorganisation = UserOrganisation::where('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $userorganisation = UserOrganisation::paginate($perPage);
        }

        return view('admin.user-organisation.index', compact('userorganisation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user-organisation.create');
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
        
        UserOrganisation::create($requestData);

        Session::flash('flash_message', 'UserOrganisation added!');

        return redirect('admin/user-organisation');
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
        $userorganisation = UserOrganisation::findOrFail($id);

        return view('admin.user-organisation.show', compact('userorganisation'));
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
        $userorganisation = UserOrganisation::findOrFail($id);

        return view('admin.user-organisation.edit', compact('userorganisation'));
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
        
        $userorganisation = UserOrganisation::findOrFail($id);
        $userorganisation->update($requestData);

        Session::flash('flash_message', 'UserOrganisation updated!');

        return redirect('admin/user-organisation');
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
        UserOrganisation::destroy($id);

        Session::flash('flash_message', 'UserOrganisation deleted!');

        return redirect('admin/user-organisation');
    }
}
