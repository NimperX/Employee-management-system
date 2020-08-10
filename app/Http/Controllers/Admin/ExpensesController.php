<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Expense;
use App\Project;
use App\Employee;

class ExpensesController extends Controller
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
        $arr['expenses'] = Expense::all();
        $arr['projects'] = Project::all();
        return view('admin.expenses.index')->with($arr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $arr['expenses'] = Expense::all();

        $arr['projects'] = Project::all();

        $arr['employees'] = Employee::all();
        
        //returns a form to add a new expense
        return view ('admin\expenses\create')->with($arr);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = new Expense();
        $project = Project::find($request->project_id);
        $employee = Employee::find($request->receiver_id);
        
        $expense->money_given_start_date = $request->time_period_start_date;
        $expense->money_given_end_date = $request->time_period_end_date;
        $expense->amount_given = $request->amount_given;
        
        $expense->project()->associate($project);
        $expense->employee()->associate($employee);

        $expense->save();
        return redirect()->route('admin.expenses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        $arr['expense'] = $expense;

        $arr['projects'] = Project::all();

        $arr['employees'] = Employee::all();
        
        //returns a form to edit an expense
        return view ('admin.expenses.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $project = Project::find($request->project_id);
        $employee = Employee::find($request->receiver_id);
        
        $expense->money_given_start_date = $request->time_period_start_date;
        $expense->money_given_end_date = $request->time_period_end_date;
        $expense->amount_given = $request->amount_given;
        
        $expense->project()->associate($project);
        $expense->employee()->associate($employee);

        $expense->save();
        return redirect()->route('admin.expenses.index');
    }

    public function ExpenseView(Expense $expense)
    {
        $arr['expense'] = $expense;

        $arr['projects'] = Project::all();

        $arr['employees'] = Employee::all();
        
        //view an expense
        return view ('admin.expenses.expenseview')->with($arr);
    }

    public function ExpenseNew(Request $request){
        $expense = new Expense();
        $project = Project::find($request->project_id);
        
        $expense->description = $request->description;
        $expense->amount_spent = $request->amount;
        
        $expense->project()->associate($project);

        $expense->save();
        return redirect()->route('admin.expenses.index');
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
