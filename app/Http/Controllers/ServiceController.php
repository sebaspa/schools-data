<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['can:services.show'])->only('show');
        $this->middleware(['can:services.index'])->only('index');
        $this->middleware(['can:services.destroy'])->only('destroy');
        $this->middleware(['can:services.edit'])->only('edit', 'update');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::paginate(20, ["id", "name"]);
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create', ['service' => new Service()]);
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
            'name' => 'required|min:3|max:100|unique:services,name'
        ]);

        Service::create($request->all());
        return redirect()->route('services.index')->with('info', 'El servicio se creó con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $request->validate([
            'name' => 'required|min:3|max:100|unique:services,name,' . request()->route('service')->id,
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')->with('info', 'El servicio se actualizó con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        if ($request->ajax()) {
            $data = $request->validate([
                'id' => 'required',
            ]);
            $service = new Service($data);
            $service = Service::findOrFail($id);
            $service->delete();
            return response()->json($data, 200);
        }
    }
}
