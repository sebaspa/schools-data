<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Heating;
use Illuminate\Http\Request;

class HeatingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(['can:schools.edit']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(School $school)
    {
        //
        $heatings = Heating::where('school_id', $school->id);
        $heatings = $heatings->paginate(20);
        return view('energy.heating.index', compact('school', 'heatings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(School $school)
    {
        //
        return view('energy.heating.create', ['heating' => new Heating()], compact('school'));
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
        if ($request->subtypeenergy_id == "3") {

            $request->validate([
                'school_id' => 'required|exists:schools,id',
                'subtypeenergy_id' => 'required|exists:subtypeenergy,id',
                'number_radiators' => 'required',
                'potency' => 'required',
                'model' => 'required',
                'others' => 'nullable'
            ]);

            Heating::create([
                'school_id' => $request->school_id,
                'subtypeenergy_id' => $request->subtypeenergy_id,
                'number_radiators' => $request->number_radiators,
                'potency' => $request->potency,
                'model' => $request->model,
                'others' => $request->others
            ]);
        } else {
            $request->validate([
                'school_id' => 'required|exists:schools,id',
                'subtypeenergy_id' => 'required|exists:subtypeenergy,id',
                'number_radiators' => 'required',
                'gas' => 'required',
                'gasoil' => 'required',
                'type_boiler' => 'required',
                'tank_volume' => 'required',
                'others' => 'nullable'
            ]);

            Heating::create([
                'school_id' => $request->school_id,
                'subtypeenergy_id' => $request->subtypeenergy_id,
                'number_radiators' => $request->number_radiators,
                'gas' => $request->gas,
                'gasoil' => $request->gasoil,
                'type_boiler' => $request->type_boiler,
                'tank_volume' => $request->tank_volume,
                'others' => $request->others
            ]);
        }

        return redirect()->route('heatings.index', $request->school_id)->with('info', 'Se asignó la energía correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Heating  $heating
     * @return \Illuminate\Http\Response
     */
    public function show(Heating $heating)
    {
        //
        return view('energy.heating.show', compact('heating'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Heating  $heating
     * @return \Illuminate\Http\Response
     */
    public function edit(Heating $heating)
    {
        //
        return view('energy.heating.edit', compact('heating'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Heating  $heating
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Heating $heating)
    {
        //
        if ($request->subtypeenergy_id == "3") {

            $request->validate([
                'subtypeenergy_id' => 'required|exists:subtypeenergy,id',
                'number_radiators' => 'required',
                'potency' => 'required',
                'model' => 'required',
                'others' => 'nullable'
            ]);

        } else {
            $request->validate([
                'subtypeenergy_id' => 'required|exists:subtypeenergy,id',
                'number_radiators' => 'required',
                'gas' => 'required',
                'gasoil' => 'required',
                'type_boiler' => 'required',
                'tank_volume' => 'required',
                'others' => 'nullable'
            ]);
        }

        $heating->update($request->all());

        return redirect()->route('heatings.index', $heating->school_id)->with('info', 'Se modificó la energía correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Heating  $heating
     * @return \Illuminate\Http\Response
     */
    public function destroy(Heating $heating)
    {
        //
        $heating->delete();
        return redirect()->route('heatings.index', $heating->school_id)->with('info', 'Se eliminó la energía correctamente.');
    }
}
