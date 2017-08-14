<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Palmare;
use Illuminate\Http\Request;
use Session;

class PalmaresController extends Controller
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
            $palmares = Palmare::where('description', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $palmares = Palmare::paginate($perPage);
        }

        return view('admin.Entities.palmares.index', compact('palmares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Entities.palmares.create');
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
			'description' => 'required|min:10'
		]);
        $requestData = $request->all();
        
        Palmare::create($requestData);

        Session::flash('flash_message', 'Palmare added!');

        return redirect('admin/palmares');
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
        $palmare = Palmare::findOrFail($id);

        return view('admin.Entities.palmares.show', compact('palmare'));
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
        $palmare = Palmare::findOrFail($id);

        return view('admin.Entities.palmares.edit', compact('palmare'));
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
			'description' => 'required|min:10'
		]);
        $requestData = $request->all();
        
        $palmare = Palmare::findOrFail($id);
        $palmare->update($requestData);

        Session::flash('flash_message', 'Palmare updated!');

        return redirect('admin/palmares');
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
        Palmare::destroy($id);

        Session::flash('flash_message', 'Palmare deleted!');

        return redirect('admin/palmares');
    }
}
