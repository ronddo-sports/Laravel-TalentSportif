<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\Vue;
use Illuminate\Http\Request;
use Session;

class VueController extends Controller
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
            $vue = Vue::where('media_id', 'LIKE', "%$keyword%")
				->orWhere('user_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $vue = Vue::paginate($perPage);
        }

        return view('admin.Entities.vue.index', compact('vue'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.vue.create');
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
			'media_id' => 'integer',
			'user_id' => 'integer'
		]);
        $requestData = $request->all();
        
        Vue::create($requestData);

        Session::flash('flash_message', 'Vue added!');

        return redirect('admin/vue');
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
        $vue = Vue::findOrFail($id);

        return view('admin.Entities.vue.show', compact('vue'));
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
        $vue = Vue::findOrFail($id);

        return view('admin.Entities.vue.edit', compact('vue'));
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
			'media_id' => 'integer',
			'user_id' => 'integer'
		]);
        $requestData = $request->all();
        
        $vue = Vue::findOrFail($id);
        $vue->update($requestData);

        Session::flash('flash_message', 'Vue updated!');

        return redirect('admin/vue');
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
        Vue::destroy($id);

        Session::flash('flash_message', 'Vue deleted!');

        return redirect('admin/vue');
    }
}
