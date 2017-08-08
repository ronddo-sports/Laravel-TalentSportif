<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Fan;
use Illuminate\Http\Request;
use Session;

class FanController extends Controller
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
            $fan = Fan::where('star_id', 'LIKE', "%$keyword%")
				->orWhere('fan_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $fan = Fan::paginate($perPage);
        }

        return view('admin.fan.index', compact('fan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.fan.create');
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
        
        Fan::create($requestData);

        Session::flash('flash_message', 'Fan added!');

        return redirect('admin/fan');
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
        $fan = Fan::findOrFail($id);

        return view('admin.fan.show', compact('fan'));
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
        $fan = Fan::findOrFail($id);

        return view('admin.fan.edit', compact('fan'));
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
        
        $fan = Fan::findOrFail($id);
        $fan->update($requestData);

        Session::flash('flash_message', 'Fan updated!');

        return redirect('admin/fan');
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
        Fan::destroy($id);

        Session::flash('flash_message', 'Fan deleted!');

        return redirect('admin/fan');
    }
}
