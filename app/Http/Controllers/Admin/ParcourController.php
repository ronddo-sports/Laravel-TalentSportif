<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Parcour;
use Illuminate\Http\Request;
use Session;

class ParcourController extends Controller
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
            $parcour = Parcour::where('description', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $parcour = Parcour::paginate($perPage);
        }

        return view('admin.Entities.parcour.index', compact('parcour'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.parcour.create');
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
			'description' => 'required|min:20'
		]);
        $requestData = $request->all();
        
        Parcour::create($requestData);

        Session::flash('flash_message', 'Parcour added!');

        return redirect('admin/parcour');
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
        $parcour = Parcour::findOrFail($id);

        return view('admin.Entities.parcour.show', compact('parcour'));
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
        $parcour = Parcour::findOrFail($id);

        return view('admin.Entities.parcour.edit', compact('parcour'));
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
			'description' => 'required|min:20'
		]);
        $requestData = $request->all();
        
        $parcour = Parcour::findOrFail($id);
        $parcour->update($requestData);

        Session::flash('flash_message', 'Parcour updated!');

        return redirect('admin/parcour');
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
        Parcour::destroy($id);

        Session::flash('flash_message', 'Parcour deleted!');

        return redirect('admin/parcour');
    }
}
