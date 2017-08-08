<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\UserSportif;
use Illuminate\Http\Request;
use Session;

class UserSportifController extends Controller
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
            $usersportif = UserSportif::where('category', 'LIKE', "%$keyword%")
				->orWhere('club_actuel', 'LIKE', "%$keyword%")
				->orWhere('poid', 'LIKE', "%$keyword%")
				->orWhere('taille', 'LIKE', "%$keyword%")
				->orWhere('poste', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->orWhere('user_manager_id', 'LIKE', "%$keyword%")
				->orWhere('user_group_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $usersportif = UserSportif::paginate($perPage);
        }

        return view('admin.user-sportif.index', compact('usersportif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.user-sportif.create');
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
        
        UserSportif::create($requestData);

        Session::flash('flash_message', 'UserSportif added!');

        return redirect('admin/user-sportif');
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
        $usersportif = UserSportif::findOrFail($id);

        return view('admin.user-sportif.show', compact('usersportif'));
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
        $usersportif = UserSportif::findOrFail($id);

        return view('admin.user-sportif.edit', compact('usersportif'));
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
        
        $usersportif = UserSportif::findOrFail($id);
        $usersportif->update($requestData);

        Session::flash('flash_message', 'UserSportif updated!');

        return redirect('admin/user-sportif');
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
        UserSportif::destroy($id);

        Session::flash('flash_message', 'UserSportif deleted!');

        return redirect('admin/user-sportif');
    }
}
