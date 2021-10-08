<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\School;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class PlanController extends Controller
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
        $this->middleware(['can:plan.assign'])->only('create', 'store', 'edit', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(School $school, $service_id = null)
    {
        //
        $plans = Plan::where('school_id', $school->id);
        if ($service_id) {
            $plans = $plans->where('service_id', $service_id);
        }
        $plans = $plans->paginate(20);
        return view('plans.index', compact('school', 'plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(School $school)
    {
        //
        $services = Service::all(["id", "name"]);
        return view('plans.create', ['plan' => new Plan], compact('school', 'services'));
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
            'service_id' => 'required|exists:services,id',
            'title' => 'required|min:3|max:200',
            'document' => 'required|mimes:jpg,jpeg,png,pdf|max:3000',
            'description' => 'nullable|min:3'
        ]);

        if ($file = $request->file("document")) {

            $extension = $file->clientExtension();
            if ($extension == "pdf") {
                $document = $file->store("plans/" . $request->school_id, "public");
            } else {
                $document = $this->optimizePlanImage($file, $request->school_id);
            }
            Plan::create([
                'title' => $request->title,
                'description' => $request->description,
                'document' => $document,
                'school_id' => $request->school_id,
                'service_id' => $request->service_id
            ]);
        }

        return redirect()->route('plans.index', $request->school_id)->with('info', 'Se agregó un plano correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
        return view('plans.show', compact('plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        //
        $services = Service::all(["id", "name"]);
        return view('plans.edit', compact('plan', 'services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        //
        $request->validate([
            'title' => 'required|min:3|max:200',
            'document' => 'nullable|mimes:jpg,jpeg,png,pdf|max:3000',
            'description' => 'nullable|min:3'
        ]);


        if ($file = $request->file("document")) {

            Storage::delete("/public/$plan->document");

            $plan->fill($request->all());
            $extension = $file->clientExtension();
            if ($extension == "pdf") {
                $plan->document = $file->store("plans/" . $plan->school_id, "public");
            } else {
                $plan->document = $this->optimizePlanImage($file, $plan->school_id);
            }
            $plan->save();
        } else {
            $plan->update(array_filter($request->all()));
        }

        return redirect()->route('plans.index', $plan->school_id)->with('info', 'Se editó un plano correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
        Storage::delete("/public/$plan->document");
        $plan->delete();
        return redirect()->route('plans.index', $plan->school_id)->with('info', 'Se eliminó un plano correctamente.');
    }

    protected function optimizePlanImage($file, $school)
    {
        $image_path = $file->store("plans/$school", "public");
        $image_intervention = InterventionImage::make(public_path("storage/{$image_path}"));
        $widthImage = $image_intervention->width();
        if ($widthImage > 1280) {
            $image_intervention->widen(1280);
        }
        $image_intervention->encode('jpg', 80);
        $image_intervention->save();

        return $image_path;
    }
}
