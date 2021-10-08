<?php

namespace App\Http\Controllers;

use App\Models\Solar;
use App\Models\School;
use Illuminate\Http\Request;

class SolarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(['can:schools.index', 'can:schools.show'])->only('index', 'show');
        $this->middleware(['can:energy.assign'])->only('create', 'store', 'edit', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(School $school)
    {
        //
        $solars = Solar::where('school_id', $school->id);
        $solars = $solars->paginate(20);
        return view('energy.solar.index', compact('school', 'solars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(School $school)
    {
        //
        return view('energy.solar.create', ['solar' => new Solar()], compact('school'));
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
            'school_id' => 'required|exists:schools,id',
            'total_area' => 'required|min:3',
            'number_panels' => 'required|min:3',
            'installed_potency' => 'required|min:3',
            'mark' => 'required|min:3',
            'model' => 'required|min:3',
            'energy_supplied' => 'required|min:3',
            'others' => 'required|min:3'
        ]);

        Solar::create([
            'school_id' => $request->school_id,
            'total_area' => $request->total_area,
            'number_panels' => $request->number_panels,
            'installed_potency' => $request->installed_potency,
            'mark' => $request->mark,
            'model' => $request->model,
            'energy_supplied' => $request->energy_supplied,
            'others' => $request->others

        ]);

        return redirect()->route('solars.index', $request->school_id)->with('info', 'Se asignó la energía correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Solar  $solar
     * @return \Illuminate\Http\Response
     */
    public function show(Solar $solar)
    {
        //
        return view('energy.solar.show', compact('solar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Solar  $solar
     * @return \Illuminate\Http\Response
     */
    public function edit(Solar $solar)
    {
        //
        return view('energy.solar.edit', compact('solar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Solar  $solar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Solar $solar)
    {
        //
        $request->validate([
            'total_area' => 'required|min:3',
            'number_panels' => 'required|min:3',
            'installed_potency' => 'required|min:3',
            'mark' => 'required|min:3',
            'model' => 'required|min:3',
            'energy_supplied' => 'required|min:3',
            'others' => 'required|min:3'
        ]);

        $solar->update($request->all());
        return redirect()->route('solars.index', $solar->school_id)->with('info', 'Se modificó la energía correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Solar  $solar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Solar $solar)
    {
        //
        $solar->delete();
        return redirect()->route('solars.index', $solar->school_id)->with('info', 'Se eliminó la energía correctamente.');
    }
}
