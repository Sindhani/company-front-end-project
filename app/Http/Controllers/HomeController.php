<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shetabit\Visitor\Models\Visit;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $visitors = Visit::all();
        $browsers = DB::table('shetabit_visits')
            ->select('browser', DB::raw('count(*) as total'))
            ->groupBy('browser')
            ->get();

        $sessions = Visit::where('visitor_id','!=', null)->count();

        return view('back_end.index', compact('visitors', 'browsers','sessions'));
    }
}
