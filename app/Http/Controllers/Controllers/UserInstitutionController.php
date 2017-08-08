<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\UserInstitution;
use Illuminate\Http\Request;
use Session;

class UserInstitutionController extends Controller
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
            $userinstitution = UserInstitution::where('president', 'LIKE', "%$keyword%")
				->orWhere('federation_id', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $userinstitution = UserInstitution::paginate($perPage);
        }

        return view('admin.user-institution.index', compact('userinstitution'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user-institution.create');
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
        
        UserInstitution::create($requestData);

        Session::flash('flash_message', 'UserInstitution added!');

        return redirect('admin/user-institution');
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
        $userinstitution = UserInstitution::findOrFail($id);

        return view('admin.user-institution.show', compact('userinstitution'));
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
        $userinstitution = UserInstitution::findOrFail($id);

        return view('admin.user-institution.edit', compact('userinstitution'));
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
        
        $userinstitution = UserInstitution::findOrFail($id);
        $userinstitution->update($requestData);

        Session::flash('flash_message', 'UserInstitution updated!');

        return redirect('admin/user-institution');
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
        UserInstitution::destroy($id);

        Session::flash('flash_message', 'UserInstitution deleted!');

        return redirect('admin/user-institution');
    }
}
