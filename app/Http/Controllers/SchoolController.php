<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\School;
use App\Models\Building;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

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
        $this->middleware(['can:schools.edit'])->only('edit', 'update', 'deletebuilding');
        $this->middleware(['can:schools.destroy'])->only('destroy', 'deletebuilding');
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
        $buildings = Building::all(['id', 'name']);
        return view("school.create", ['school' => new School()], compact('buildings'));
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
        $school = School::create($request->validated());
        if ($request->building_assigned) {
            foreach ($request->building_assigned as $key => $value) {
                $pivot_building_school[$value] = [
                    'quantity' => $request->quantity_assigned[$key]
                ];
            }
            $school->buildings()->sync($pivot_building_school);
        }
        //dd($request->all());
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
        $school->load([
            'buildings',
        ])->get();
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
        $buildings = Building::all(['id', 'name']);
        $school->load([
            'buildings',
        ])->get();

        return view("school.edit", compact('school', 'buildings'));
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\School  $school
     * @return \Illuminate\Http\Response
     */
    public function updatebuildings(Request $request, School $school)
    {
        //
        $request->validate([
            'building_assigned.*' => ['required', 'size:3'],
            'quantity_assigned.*' => ['required', 'numeric', 'min:1', 'max:99'],
            'building_assigned.*' => ['required', 'exists:buildings,id']
        ], [
            'quantity_assigned.*.required' => 'La cantidad es requrida',
            'quantity_assigned.*.numeric' => 'La cantidad debe ser un valor numérico',
            'quantity_assigned.*.min' => 'La cantidad debe ser mayor a :min',
            'quantity_assigned.*.max' => 'La cantidad debe ser menor a :max',
            'building_assigned.*.required' => 'La construcción es requrida',
            'building_assigned.*.exists' => 'La construcción seleccionada no existe',
        ]);

        if ($request->building_assigned) {
            foreach ($request->building_assigned as $key => $value) {
                $pivot_building_school[$value] = [
                    'quantity' => $request->quantity_assigned[$key]
                ];
            }
            $school->buildings()->sync($pivot_building_school);
        }


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
            $school->buildings()->detach();
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

    public function deletebuilding(Request $request)
    {
        if ($request->ajax()) {
            $request->validate([
                'id' => 'required',
            ]);
            DB::table('building_school')
                ->where('id', '=', $request->id)
                ->delete();

            return response()->json($request->id, 200);
        }
    }

    public static function multi_array_search_with_condition($array, $condition)
    {
        $foundItems = array();

        foreach ($array as $item) {
            $find = TRUE;
            foreach ($condition as $key => $value) {
                if (isset($item[$key]) && $item[$key] == $value) {
                    $find = TRUE;
                } else {
                    $find = FALSE;
                }
            }
            if ($find) {
                array_push($foundItems, $item);
            }
        }
        return $foundItems;
    }
}
