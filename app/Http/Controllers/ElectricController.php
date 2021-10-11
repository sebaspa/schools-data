<?php

namespace App\Http\Controllers;

use App\Models\Electric;
use App\Models\School;
use Illuminate\Http\Request;

class ElectricController extends Controller
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
        $electrics = Electric::where('school_id', $school->id);
        $electrics = $electrics->paginate(20);
        return view('energy.electric.index', compact('school', 'electrics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(School $school)
    {
        //
        return view('energy.electric.create', ['electric' => new Electric()], compact('school'));
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
            'supplying_company' => 'nullable|min:3',
            'contract_type' => 'required|min:3',
            'supply_number' => 'required',
            'number_light_meter' => 'required',
            'hired_potency' => 'required',
            'total_potency' => 'required',
            'general_rush' => 'required',
            'number_circuits' => 'required',
            'partial_squares' => 'required',
            'others' => 'nullable|min:3'
        ]);

        Electric::create([
            'school_id' => $request->school_id,
            'supplying_company' => $request->supplying_company,
            'contract_type' => $request->contract_type,
            'supply_number' => $request->supply_number,
            'number_light_meter' => $request->number_light_meter,
            'hired_potency' => $request->hired_potency,
            'total_potency' => $request->total_potency,
            'general_rush' => $request->general_rush,
            'number_circuits' => $request->number_circuits,
            'partial_squares' => $request->partial_squares,
            'others' => $request->others,
        ]);

        return redirect()->route('electrics.index', $request->school_id)->with('info', 'Se asignó la energía correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electric  $electric
     * @return \Illuminate\Http\Response
     */
    public function show(Electric $electric)
    {
        //
        return view('energy.electric.show', compact('electric'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electric  $electric
     * @return \Illuminate\Http\Response
     */
    public function edit(Electric $electric)
    {
        //
        return view('energy.electric.edit', compact('electric'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electric  $electric
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Electric $electric)
    {
        //
        $request->validate([
            'supplying_company' => 'nullable|min:3',
            'contract_type' => 'required|min:3',
            'supply_number' => 'required',
            'number_light_meter' => 'required',
            'hired_potency' => 'required',
            'total_potency' => 'required',
            'general_rush' => 'required',
            'number_circuits' => 'required',
            'partial_squares' => 'required',
            'others' => 'nullable|min:3'
        ]);

        $electric->update($request->all());
        return redirect()->route('electrics.index', $electric->school_id)->with('info', 'Se modificó la energía correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electric  $electric
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electric $electric)
    {
        //
        $electric->delete();
        return redirect()->route('electrics.index', $electric->school_id)->with('info', 'Se eliminó la energía correctamente.');
    }
}
