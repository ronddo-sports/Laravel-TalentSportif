<?php

namespace App\Http\Controllers;



use App\Model\User;
use App\Model\UserStatus;
use Illuminate\Http\Request;
use Session;

class UserController extends Controller
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
            $user = User::where('username', 'LIKE', "%$keyword%")
				->orWhere('pseudo', 'LIKE', "%$keyword%")
				->orWhere('email', 'LIKE', "%$keyword%")
				->orWhere('password', 'LIKE', "%$keyword%")
				->orWhere('confirmation_token', 'LIKE', "%$keyword%")
				->orWhere('remember_token', 'LIKE', "%$keyword%")
				->orWhere('password_requested_at', 'LIKE', "%$keyword%")
				->orWhere('last_login', 'LIKE', "%$keyword%")
				->orWhere('date_naiss', 'LIKE', "%$keyword%")
				->orWhere('description', 'LIKE', "%$keyword%")
				->orWhere('discipline', 'LIKE', "%$keyword%")
				->orWhere('tel', 'LIKE', "%$keyword%")
				->orWhere('pays', 'LIKE', "%$keyword%")
				->orWhere('ville', 'LIKE', "%$keyword%")
				->orWhere('adresse', 'LIKE', "%$keyword%")
				->orWhere('status', 'LIKE', "%$keyword%")
				->orWhere('discr', 'LIKE', "%$keyword%")
				->orWhere('salt', 'LIKE', "%$keyword%")
				->orWhere('enabled', 'LIKE', "%$keyword%")
				->orWhere('group_id', 'LIKE', "%$keyword%")
				->orWhere('user_status_id', 'LIKE', "%$keyword%")
				->paginate($perPage);
        } else {
            $user = User::paginate($perPage);
        }

        return view('admin.Entities.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.Entities.user.create');
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
			'email' => 'required|email|unique:users',
			'username' => 'required|max:60|unique:users',
			'password' => 'required|min:8',
			'date_naiss' => 'required|date',
			'discipline' => 'required|max:50'
		]);
        $requestData = $request->all();
        
        User::create($requestData);

        Session::flash('flash_message', 'User added!');

        return redirect('admin/user');
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
        $user = User::findOrFail($id);

        return view('admin.Entities.user.show', compact('user'));
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
        $user = User::findOrFail($id);

        return view('admin.Entities.user.edit', compact('user'));
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
			'email' => 'required|email|unique:users',
			'username' => 'required|max:60|unique:users',
			'password' => 'required|min:8',
			'date_naiss' => 'required|date',
			'discipline' => 'required|max:50'
		]);
        $requestData = $request->all();
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        Session::flash('flash_message', 'User updated!');

        return redirect('admin/user');
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
        User::destroy($id);

        Session::flash('flash_message', 'User deleted!');

        return redirect('admin/user');
    }
    public function upload(Request $request)
    {

        if($request->hasFile('file')){

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $path = public_path().'/uploads/';
            return $file->move($path, $filename);
        }

    }
    public function step_one($id = null)
    {
        $qry = UserStatus::where('id','=',$id);
        if ($qry->count() > 0){
            $status = $qry->first();
            return view('auth.register', compact('status'));
        }
        return redirect(route('etape_une'));
    }
}
