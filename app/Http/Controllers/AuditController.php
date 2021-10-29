<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;

class AuditController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth']);

        $this->middleware(['can:audit.index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('audit.index');
    }

    public function get(Request $request)
    {
        if ($request->ajax()) {
            $audits = Activity::select('id', 'log_name', 'event', 'description', 'causer_id', 'created_at')->get();
            return DataTables::of($audits)
                ->addColumn('causer', function ($audit) {
                    return '<a href="/users/' . $audit->causer_id . '" class="btn btn-xs btn-warning"><i class="fas fa-eye mr-2"></i> Ver</a>';
                })
                ->addColumn('created_at', function ($audit) {
                    return $audit->created_at->diffForHumans();
                })
                ->rawColumns(['causer'])
                ->make(true);
        }
    }
}
