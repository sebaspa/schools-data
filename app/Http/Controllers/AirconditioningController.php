<?php

namespace App\Http\Controllers;

use App\Models\Airconditioning;
use App\Models\School;
use Illuminate\Http\Request;

class AirconditioningController extends Controller
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
        $airconditionings = Airconditioning::where('school_id', $school->id);
        $airconditionings = $airconditionings->paginate(20);
        return view('energy.airconditioning.index', compact('school', 'airconditionings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(School $school)
    {
        //
        return view('energy.airconditioning.create', ['airconditioning' => new Airconditioning()], compact('school'));
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
        if ($request->subtypeenergy_id == "1") {
            
            $request->validate([
                'school_id' => 'required|exists:schools,id',
                'subtypeenergy_id' => 'required|exists:subtypeenergy,id',
                'potency' => 'required',
                'frigoria' => 'required',
                'mark' => 'required',
                'model' => 'required',
                'others' => 'nullable'
            ]);

            Airconditioning::create([
                'school_id' => $request->school_id,
                'subtypeenergy_id' => $request->subtypeenergy_id,
                'potency' => $request->potency,
                'frigoria' => $request->frigoria,
                'mark' => $request->mark,
                'model' => $request->model,
                'others' => $request->others
            ]);
        } else {
            $request->validate([
                'school_id' => 'required|exists:schools,id',
                'subtypeenergy_id' => 'required|exists:subtypeenergy,id',
                'number_groups' => 'required',
                'types' => 'required',
                'mark' => 'required',
                'model' => 'required',
                'others' => 'nullable'
            ]);

            Airconditioning::create([
                'school_id' => $request->school_id,
                'subtypeenergy_id' => $request->subtypeenergy_id,
                'number_groups' => $request->number_groups,
                'types' => $request->types,
                'mark' => $request->mark,
                'model' => $request->model,
                'others' => $request->others
            ]);
        }


        return redirect()->route('airconditionings.index', $request->school_id)->with('info', 'Se asignó la energía correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Airconditioning  $airconditioning
     * @return \Illuminate\Http\Response
     */
    public function show(Airconditioning $airconditioning)
    {
        //
        return view('energy.airconditioning.show', compact('airconditioning'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Airconditioning  $airconditioning
     * @return \Illuminate\Http\Response
     */
    public function edit(Airconditioning $airconditioning)
    {
        //
        return view('energy.airconditioning.edit', compact('airconditioning'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Airconditioning  $airconditioning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Airconditioning $airconditioning)
    {
        //
        if ($request->subtypeenergy_id == "1") {

            $request->validate([
                'school_id' => 'nullable|exists:schools,id',
                'subtypeenergy_id' => 'required|exists:subtypeenergy,id',
                'potency' => 'required|min:3',
                'frigoria' => 'required|min:3',
                'mark' => 'required|min:3',
                'model' => 'required|min:3',
                'others' => 'nullable|min:3'
            ]);
        } else {
            $request->validate([
                'school_id' => 'nullable|exists:schools,id',
                'subtypeenergy_id' => 'required|exists:subtypeenergy,id',
                'number_groups' => 'required|min:3',
                'types' => 'required|min:3',
                'mark' => 'required|min:3',
                'model' => 'required|min:3',
                'others' => 'nullable|min:3'
            ]);
        }

        $airconditioning->update($request->all());

        return redirect()->route('airconditionings.index', $airconditioning->school_id)->with('info', 'Se modificó la energía correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Airconditioning  $airconditioning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Airconditioning $airconditioning)
    {
        //
        $airconditioning->delete();
        return redirect()->route('airconditionings.index', $airconditioning->school_id)->with('info', 'Se eliminó la energía correctamente.');
    }
}
