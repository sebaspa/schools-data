<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['can:roles.create'])->only('create', 'store');
        $this->middleware(['can:roles.index'])->only('index', 'get');
        $this->middleware(['can:roles.edit'])->only('edit', 'update');
        $this->middleware(['can:roles.destroy'])->only('destroy');
        $this->middleware(['can:roles.show'])->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Role::paginate(20, ["id", "name"]);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $permissions = Permission::all(['id', 'name', 'description']);
        return view('roles.create', ['role' => new Role], compact('permissions'));
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
        $request->validate([
            'name' => 'required|min:3|max:100|unique:roles,name'
        ]);

        $role = Role::create($request->all());
        $role->permissions()->sync($request->permissions);

        activity('role')
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->event('created')
            ->log('Se ha creado un rol');

        return redirect()->route('roles.index')->with('info', 'El rol se creó con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        $permissions = Permission::all(['id', 'name', 'description']);
        return view('roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //
        $request->validate([
            'name' => 'required|min:3|max:100|unique:roles,name,' . request()->route('role')->id,
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);

        activity('role')
            ->performedOn($role)
            ->causedBy(Auth::user())
            ->event('updated')
            ->log('Se ha editado un rol');

        return redirect()->route('roles.index')->with('info', 'El rol se actualizó con éxito.');
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
            $role = new Role($data);
            $role = Role::findOrFail($id);
            $role->delete();
            activity('role')
                ->performedOn($role)
                ->causedBy(Auth::user())
                ->event('deleted')
                ->log('Se ha eliminado un rol');
            return response()->json($data, 200);
        }
    }
}
