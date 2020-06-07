<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Project; //name of model

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          //displays all data in the projects table in db inside projects view
        //this is passed as an array
        $arr['projects'] = Project::all();
        return view('admin.projects.index')->with($arr);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns a form to add a new project
        return view ('admin\projects\create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //ha created a object from the model 
    public function store(Request $request, Project $project )
    {
        //fetches form data from the db on button click
        //values inside input fields are stored in the instance of project obj
        $project->project_id  = $request->project_id;
        $project->project_type = $request->project_type;
        $project->project_name = $request->project_name;
        $project->project_location = $request->project_location;
        $project->customer_name = $request->customer_name;
        $project->contact_number = $request->contact_number;
        $project->email = $request->email;
        $project->project_start_date = $request->project_start_date;
        $project->status = $request->status;
        $project->senior_engineer_name = $request->senior_engineer_name;
        $project->project_supervisor_name = $request->project_supervisor_name;

        $project->save();
        return redirect()->route('admin.projects.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //to edit data
        //the value from db is stored inside this object and passed through the url to the view
        $arr['project'] = $project;
        return view('admin.projects.edit')->with($arr);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Project $project)
    {
        //the entire entry in the db is represented
        $project->project_id  = $request->project_id;
        $project->project_type = $request->project_type;
        $project->project_name = $request->project_name;
        $project->project_location = $request->project_location;
        $project->customer_name = $request->customer_name;
        $project->contact_number = $request->contact_number;
        $project->email = $request->email;
        $project->project_start_date = $request->project_start_date;
        $project->status = $request->status;
        $project->senior_engineer_name = $request->senior_engineer_name;
        $project->project_supervisor_name = $request->project_supervisor_name;

        $project->save();
        return redirect()->route('admin.projects.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }
}
