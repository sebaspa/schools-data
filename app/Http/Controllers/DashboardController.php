<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\School;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $colors = ['#17a2b8', '#28a745', '#ffc107', '#dc3545', '#0274ff', '#30a6ba'];

        $users = DB::table('users')->count();
        $schools = DB::table('schools')->count();

        $buidings = Building::all();

        $buildingsName = [];
        foreach ($buidings as $key => $valueBuilding) {
            array_push($buildingsName, $valueBuilding->name);
        }

        $dataBuildingSchools = DB::table('building_school')
            ->select('school_id')
            ->distinct('school_id')
            ->take(6)
            ->get()->toArray();

        $schoolsData = [];
        foreach ($dataBuildingSchools as $keyData => $valueDataBuilding) {
            $school = School::select()->where('id', $valueDataBuilding->school_id)->first();
            $school->load([
                'buildings',
            ]);
            array_push($schoolsData, $school);
        }

        $dataGraph = [];
        foreach ($schoolsData as $keySchoolData => $valueSchool) {
            $valueGraph = [];
            foreach ($valueSchool->buildings as $key => $valueSchoolBuilding) {
                array_push($valueGraph, $valueSchoolBuilding->pivot->quantity);
            }
            array_push($dataGraph, [
                'label' => $valueSchool->name,
                'data' => $valueGraph,
                'borderColor' => $colors[$keySchoolData],
                'backgroundColor' => $colors[$keySchoolData],
                'fill' => false,
                'tension' => 0,
            ]);
        }

        return view('dashboard', compact('users', 'schools', 'buildingsName', 'dataGraph'));
    }
}
