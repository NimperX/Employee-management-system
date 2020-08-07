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
    public function store(Request $request, Expense $expense)
    {
        $expense->expense_id  = $request->expense_id;
        $expense->project_name = $request->project_name;
        $expense->money_given_start_date = $request->money_given_start_date;
        $expense->money_given_end_date = $request->money_given_end_date;
        $expense->amount_given = $request->amount_given;
        $expense->receiver_name = $request->receiver_name;
        
      
        

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
    public function update(Request $request, Expense $expense)
    {
        //$expense = Expense::findOrFail($expense_id);
        $expense->expense_id  = $request->expense_id;
        $expense->project_name = $request->project_name;
        $expense->money_given_start_date = $request->money_given_start_date;
        $expense->money_given_end_date = $request->money_given_end_date;
        $expense->amount_given = $request->amount_given;
        $expense->amount_spent = $request->amount_spent;
        $expense->amount_leftover = $request->amount_leftover;
        $expense->receiver_name = $request->receiver_name;

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
