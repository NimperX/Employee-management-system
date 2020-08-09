<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Labor;
use App\Machine;
use App\Project;
use App\Supplier;
use Illuminate\Http\Request;

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
        $arr['projects'] = Project::all();
        $arr['employees'] = Employee::all();
        $arr['labors'] = Labor::all();
        $arr['machines'] = Machine::all();
        $arr['suppliers'] = Supplier::all();

        return view('home')->with($arr);
    }

    public function dashboard()
    {
        
    }
}
