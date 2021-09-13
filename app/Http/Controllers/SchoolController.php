<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Models\School;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SchoolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['can:schools.index'])->only('index', 'get');
        $this->middleware(['can:schools.edit'])->only('edit', 'update');
        $this->middleware(['can:schools.destroy'])->only('destroy');
        $this->middleware(['can:schools.show'])->only('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view("school.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("school.create", ['school' => new School()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSchoolRequest $request)
    {
        //
        School::create($request->validated());
        return redirect()->route('schools.index')->with('info', 'Escuela guardada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
        return view('school.show', compact('school'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
        return view("school.edit", compact("school"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSchoolRequest $request, School $school)
    {
        //
        $school->update($request->validated());
        return redirect()->route('schools.show', $school)->with('info', 'Se editó la escuela correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, School $school)
    {
        //
        if ($request->ajax()) {
            $request->validate([
                'id' => 'required',
            ]);
            $school->delete();
            return response()->json($school, 200);
        }
    }

    /**
     * Get Usersby AJAX Request
     */
    public function get(Request $request)
    {
        if ($request->ajax()) {
            $data = School::select('id', 'name', 'address', 'email', 'phone')->get();
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return '
                <a href="/schools/' . $data->id . '" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
                <a href="/schools/' . $data->id . '/edit" class="btn btn-xs btn-primary"><i class="fas fa-edit"></i></a>
                <a href="#" data-id="' . $data->id . '" class="btn btn-xs btn-danger btn-delete"><i class="fas fa-trash"></i></a>
                ';
                })
                ->removeColumn('id')
                ->make(true);
        }
    }
}
