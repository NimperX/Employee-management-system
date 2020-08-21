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
        $projects = Project::all();
        $arr['projects'] = $projects;
        $arr['employees'] = Employee::all();
        $arr['labors'] = Labor::all();
        $arr['machines'] = Machine::all();
        $arr['suppliers'] = Supplier::all();

        $proj_emp_count='';
        $proj_emp_label='';
        $proj_labor_count='';
        $proj_labor_label='';

        $i=0;
        foreach($projects as $p){
            $proj_emp_count .= $p->employees->count().',';
            $proj_emp_label .= $p->project_name.',';
            $proj_labor_count .= $p->labors->count().',';
            $proj_labor_label .= $p->project_name.',';
            $i++;
            if($i >= 5) break;
            dd($p->employees);
        }

        $arr['proj_emp_count'] = $proj_emp_count;
        $arr['proj_emp_label'] = $proj_emp_label;
        $arr['proj_labor_count'] = $proj_labor_count;
        $arr['proj_labor_label'] = $proj_labor_label;

        return view('home')->with($arr);
    }

    public function dashboard()
    {
        
    }
}
