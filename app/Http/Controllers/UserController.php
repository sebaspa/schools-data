<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
        $this->middleware(['can:users.index'])->only('index');
        $this->middleware(['can:users.edit'])->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view("user.edit", compact("user", "roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->roles()->sync($request->roles);
        return redirect()->route('users.edit', $user)->with('info', 'Se editó el usuario correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Get Usersby AJAX Request
     */
    public function get(Request $request)
    {
        $users = User::select('id', 'name', 'last_name', 'email', 'created_at')->get();
        return DataTables::of($users)
            ->addColumn('action', function ($user) {
                return '
                <a href="/users/' . $user->id . '/show" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
                <a href="/users/' . $user->id . '/edit" class="btn btn-xs btn-primary"><i class="fas fa-user-edit"></i></a>
                <a href="#" class="btn btn-xs btn-danger"><i class="fas fa-trash-alt"></i></a>
                ';
            })
            ->removeColumn('id')
            ->make(true);
    }
}
