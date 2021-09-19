<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Image;
use App\Models\School;
use Illuminate\Http\Request;
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
        $this->middleware(['can:schools.edit'])->only('addimages_school_building', 'storebuildings');
    }

    /**
     * Muestra el formulario para agregar fotos según la escuela y la construccion.
     *
     * @return \Illuminate\Http\Response
     */
    public function addimages_school_building(School $school, Building $building)
    {
        //
        return view('images.add_school_building', compact('school', 'building'));
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

            $image_path = $file->store("schools/$school->id", "public");
            $image = InterventionImage::make(public_path("storage/{$image_path}"));
            $widthImage = $image->width();
            if ($widthImage > 1280) {
                $image->resize(1280, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $image->encode('jpg', 80);
            $image->save();
            $school->images()->create(["url" => $image_path, "contexts" => $request->building, "title" => $request->title, "description" => $request->description]);
        }

        return redirect()->route('schools.show', $school)->with('info', 'Se agregó la foto correctamente');
    }

    public function storebuildings1(Request $request)
    {
        //
        dd($request->file("image"));
        if ($files = $request->file("image")) {

            $request->validate([
                'images' => 'required',
                'images.*' => ['mimes:jpg,jpeg,png', 'dimensions:min_width=600,min_height=400', 'max:4000']
            ]);

            $school = School::find($request->imageable_id);
            $image_assigned = Image::where('imageable_type', 'App\Models\School')
                ->where('imageable_id', $request->imageable_id)
                ->where('contexts', $request->contexts);

            if ($image_assigned->get()->toArray()) {
                foreach ($image_assigned->get()->toArray() as $key => $value) {
                    $storage_image = $value["url"];
                    Storage::delete("/public/$storage_image");
                }

                $image_assigned->delete();
            }

            foreach ($files as $key => $file) {
                $image_path = $file->store("schools/$request->imageable_id", "public");
                $image = InterventionImage::make(public_path("storage/{$image_path}"));
                $widthImage = $image->width();
                if ($widthImage > 1280) {
                    $image->resize(1280, null, function ($constraint) {
                        $constraint->aspectRatio();
                    });
                }
                $image->encode('jpg', 80);
                $image->save();
                $school->images()->create(["url" => $image_path, "contexts" => $request->contexts]);
            }
        }

        return response()->json($school, 200);
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
    }
}
