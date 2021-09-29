<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBuildRequest;
use App\Http\Requests\UpdateBuildRequest;
use App\Models\Building;
use App\Models\School;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['can:buildings.index'])->only('index', 'get');
        $this->middleware(['can:buildings.edit'])->only('edit', 'update');
        $this->middleware(['can:buildings.destroy'])->only('destroy');
        $this->middleware(['can:buildings.show'])->only('show');
    }

    public function index_by_school(School $school)
    {
        $buildings = Building::all(['id', 'name']);
        $school->load([
            'buildings',
        ])->get();

        return view('building.byschool', compact('school', 'buildings'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $buildings = Building::paginate(20, ['id', 'name', 'description']);
        return view('building.index', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("building.create", ['building' => new Building()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBuildRequest $request)
    {
        //
        Building::create($request->validated());
        return redirect()->route('buildings.index')->with('info', 'Construcción guardada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
        return view("building.edit", compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBuildRequest $request, Building $building)
    {
        //
        $building->update($request->validated());
        return redirect()->route('buildings.index')->with('info', 'Se editó la construcción correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Building $building)
    {
        //
        if ($request->ajax()) {
            $request->validate([
                'id' => 'required',
            ]);
            $building->delete();
            return response()->json($building, 200);
        }
    }
}
