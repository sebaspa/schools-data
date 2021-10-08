<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Image;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as InterventionImage;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
        $this->middleware(['can:description.assign'])->only(
            'addimages_school_building',
            'editimages_school_building',
            'storebuildings',
            'updatebuildings'
        );
    }

    /**
     * Muestra el formulario para agregar fotos según la escuela y la construccion.
     *
     * @return \Illuminate\Http\Response
     */
    public function addimages_school_building(School $school, Building $building)
    {
        //
        $image = new Image();
        return view('images.add_school_building', compact('school', 'building', 'image'));
    }

    /**
     * Muestra el formulario para agregar fotos según la escuela y la construccion.
     *
     * @return \Illuminate\Http\Response
     */
    public function editimages_school_building(Image $image)
    {
        //
        $imageData = DB::table('images')->select('imageable_id', 'contexts')->where('id', $image->id)->first();
        //dd($imageData);
        return view('images.edit_school_building', compact('image', 'imageData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storebuildings(Request $request, School $school)
    {
        //
        if ($file = $request->file("image")) {
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png|dimensions:min_width=600,min_height=400|max:3000',
                'building' => 'required|exists:buildings,id',
                'title' => 'required|min:3|max:200',
                'description' => 'min:3'
            ]);

            $image_path = $this->optimizeSchoolBuildingImage($file, $school->id);
            $school->images()->create(["url" => $image_path, "contexts" => $request->building, "title" => $request->title, "description" => $request->description]);
        }

        return redirect()->route('schools.show_building_images', [$school, $request->building])->with('info', 'Se agregó la foto correctamente');
    }

    /**
     * Update a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatebuildings(Request $request, Image $image)
    {
        //
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png|dimensions:min_width=600,min_height=400|max:3000',
            'title' => 'required|min:3|max:200',
            'building' => 'required|exists:buildings,id',
            'school' => 'required|exists:schools,id',
            'description' => 'min:3'
        ]);
        if ($file = $request->file("image")) {

            $image_assigned = Image::where('imageable_type', 'App\Models\School')
                ->where('id', $image->id)
                ->where('imageable_id', $request->school)
                ->where('contexts', $request->building)->first();

            $storage_image = $image_assigned->url;
            Storage::delete("/public/$storage_image");

            $image_path = $this->optimizeSchoolBuildingImage($file, $request->school);
            $image->update(["url" => $image_path,  "title" => $request->title, "description" => $request->description]);
        } else {
            $image->update(["title" => $request->title, "description" => $request->description]);
        }

        return redirect()->route('schools.show_building_images', [$request->school, $request->building])->with('info', 'Se editó la foto correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
        Storage::delete("/public/$image->url");
        //$image_storage = Storage::get($image->url);
        //Storage::delete($image_storage);
        $image->delete();
        return redirect()->back();
    }

    protected function optimizeSchoolBuildingImage($file, $school){
        $image_path = $file->store("schools/$school", "public");
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
