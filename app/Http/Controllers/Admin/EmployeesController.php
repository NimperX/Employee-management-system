<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Employee;
use App\Project; //name of model
use App\Type;
use App\EmployeeCategory;



class EmployeesController extends Controller
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

        $arr['employees'] = Employee::all();
        return view('admin.employees.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns a form to add a new employee
        $arr['project_types'] = Type::all();

        $arr['employee_category'] = EmployeeCategory::all();

        return view ('admin.employees.create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Employee $employee)
    {

        $employee->employee_nic = $request->employee_nic;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->employee_type = $request->employee_type;
        $employee->employee_category = $request->employee_category;
        $employee->designation = $request->designation;
        $employee->employee_contact_number = $request->employee_contact_number;
        $employee->email = $request->email;
        $employee->employee_availability = $request->employee_availability;
       

        $employee->save();
        return redirect()->route('admin.employees.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
         //to edit data
        //the value from db is stored inside this object and passed through the url to the view
        
        $arr['project_types'] = Type::all();

        $arr['employee_category'] = EmployeeCategory::all();
        
        $arr['employee'] = $employee;
        return view('admin.employees.edit')->with($arr);
        
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Employee $employee)
    {
         //the entire entry in the db is represented
        //$employee = Employee::findOrFail($employee_nic);
        $employee->employee_nic = $request->employee_nic;
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->employee_type = $request->employee_type;
        $employee->employee_category = $request->employee_category;
        $employee->designation = $request->designation;
        $employee->employee_contact_number = $request->employee_contact_number;
        $employee->email = $request->email;
        $employee->employee_availability = $request->employee_availability;
       

        $employee->save();
        return redirect()->route('admin.employees.index');

    }

    public function allocationEdit(Employee $employee)
    {
         //retrieve view to allocate employee to the project
        //the value from db is stored inside this object and passed through the url to the view
        
        $arr['project_types'] = Type::all();

        $arr['projects'] = Project::all();

        $arr['employee_category'] = EmployeeCategory::all();

        $arr['employees'] = Employee::all();
        
        //$arr['employee'] = $employee;
        return view('admin.employees.allocationview')->with($arr);    
    }

    public function allocationUpdate(Request $request, $employee_nic)
    {
         //the entire entry in the db is represented
         $e = Employee::find($employee_nic);
        $e->employee_nic = $request->employee_nic;
        $e->first_name = $request->first_name;
        $e->last_name = $request->last_name;
        $e->employee_type = $request->employee_type;
        $e->employee_category = $request->employee_category;
        $e->designation = $request->designation;
        $e->employee_contact_number = $request->employee_contact_number;
        $e->email = $request->email;
        $e->employee_availability = $request->employee_availability;
        $e->project_id = $request->project_id;
        $e->project_details = $request->project_details;
       

        $e->save();
        return redirect()->route('admin.employees.index');

    }

    //public function allocationindex()
    //{
        //displays all data in the projects table in db inside projects view
        //this is passed as an array

       // $arr['employees'] = Employee::all();
        //return view('admin.employees.allocationindex')->with($arr);
    //}

    /*public function employee_allocation_report(Request $request)
    {

    
    $sortBy = $request->input('sort_by');

    $title = 'Employee Allocation Report'; // Report title

    $meta = [ // For displaying filters description on header
        'Sort By' => $sortBy
    ];

    $queryBuilder = Employee::select(['first_name', 'last_name', 'project_id', 'project_details']) // Do some querying..
                        ->orderBy($sortBy);

    $columns = [ // Set Column to be displayed
        'First Name' => 'first_name',
        'Last Name' => 'last_name',
        'Project ID' => 'project_id',
        'Project details' => 'project_details',
    ];

    // Generate Report with flexibility to manipulate column class even manipulate column value (using Carbon, etc).
    return PdfReport::of($title, $meta, $queryBuilder, $columns)
                    ->limit(20) // Limit record to be showed
                    ->stream(); // other available method: download('filename') to download pdf / make() that will producing DomPDF / SnappyPdf instance so you could do any other DomPDF / snappyPdf method such as stream() or download()
}*/
    


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        //
    }
}
