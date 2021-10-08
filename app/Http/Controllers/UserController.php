<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditUserRequest;
use App\Http\Requests\SaveUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware(['auth']);
        $this->middleware(['can:users.create'])->only('create', 'store');
        $this->middleware(['can:users.index'])->only('index', 'get');
        $this->middleware(['can:users.edit'])->only('edit', 'update');
        $this->middleware(['can:users.destroy'])->only('destroy');
        $this->middleware(['can:users.show'])->only('show');
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
        $roles = Role::all(['id', 'name']);
        return view('user.create', ['user' => new User], compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveUserRequest $request)
    {
        //
        $user = User::create($request->validated());
        $user->roles()->sync($request->roles);

        return redirect()->route('users.index')->with('info', 'Usuario guardado correctamente');
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
        $user = User::findOrFail($id);
        return view("user.show", compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all(['id', 'name']);
        return view("user.edit", compact("user", "roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, User $user)
    {
        //
        $user->roles()->sync($request->roles);

        $data = $request->only('name', 'last_name', 'email');
        $password = $request->input("password");
        if ($password) {
            $data['password'] = $password;
        }
        //$user->update($data);
        $user->update($request->validated());

        return redirect()->route('users.show', $user->id)->with('info', 'Se editó el usuario correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            $data = $request->validate([
                'id' => 'required',
            ]);
            $user = new User($data);
            $user = User::findOrFail($id);
            $user->delete();
            return response()->json($data, 200);
        }
    }

    /**
     * View User Profile
     */

    public function profile()
    {
        $roles = Role::all(['id', 'name']);
        $user = Auth::user();
        return view("user.profile", compact("user", "roles"));
    }

    public function updateprofile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|min:3|max:100',
            'last_name' => 'required|min:3|max:100',
            'email' => 'required|max:255|email|unique:users,email,' . Auth::id(),
            'password' => 'sometimes|nullable|min:12|max:50|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{12,}$/'
        ]);

        $update_data = array_filter([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($request->input('password')) {
            $data['password'] = $request->input('password');
        }

        if (!empty($update_data)) {
            // You can store the result to see if you successfully updated
            $update_status = $user->update($update_data);
        }

        if (!$update_status) {
            return redirect()->route('users.profile')->with('failure', 'Your account could not be updated.');
        }

        return redirect()->route('users.profile')->with('info', 'Se editó el usuario correctamente');
    }

    /**
     * Get Usersby AJAX Request
     */
    public function get(Request $request)
    {
        if ($request->ajax()) {
            $users = User::select('id', 'name', 'last_name', 'email', 'created_at')->get();
            return DataTables::of($users)
                ->addColumn('created_at', function ($user) {
                    return $user->created_at->diffForHumans();
                })
                ->addColumn('action', function ($user) {
                    return '
                <a href="/users/' . $user->id . '" class="btn btn-xs btn-warning"><i class="fas fa-eye"></i></a>
                <a href="/users/' . $user->id . '/edit" class="btn btn-xs btn-primary"><i class="fas fa-user-edit"></i></a>
                <a href="#" data-id="' . $user->id . '" class="btn btn-xs btn-danger btn-user-delete"><i class="fas fa-trash"></i></a>
                ';
                })
                ->removeColumn('id')
                ->make(true);
        }
    }
}
