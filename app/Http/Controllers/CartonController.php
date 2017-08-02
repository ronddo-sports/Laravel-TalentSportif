<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Carton;
use Illuminate\Http\Request;
use Session;

class CartonController extends Controller
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
            $carton = Carton::where('couleur', 'LIKE', "%$keyword%")
				->orWhere('media_id', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $carton = Carton::paginate($perPage);
        }

        return view('admin.carton.index', compact('carton'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.carton.create');
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
        
        Carton::create($requestData);

        Session::flash('flash_message', 'Carton added!');

        return redirect('admin/carton');
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
        $carton = Carton::findOrFail($id);

        return view('admin.carton.show', compact('carton'));
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
        $carton = Carton::findOrFail($id);

        return view('admin.carton.edit', compact('carton'));
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
        
        $carton = Carton::findOrFail($id);
        $carton->update($requestData);

        Session::flash('flash_message', 'Carton updated!');

        return redirect('admin/carton');
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
        Carton::destroy($id);

        Session::flash('flash_message', 'Carton deleted!');

        return redirect('admin/carton');
    }
}
