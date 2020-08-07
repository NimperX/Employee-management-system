<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;

class SuppliersController extends Controller
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
        $arr['suppliers'] = Supplier::all();
        return view('admin.suppliers.index')->with($arr);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin\suppliers\create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Supplier $supplier)
    {
        $supplier->supplier_id  = $request->supplier_id;
        $supplier->supplier_company_name = $request->supplier_company_name;
        $supplier->name_of_contact_person = $request->name_of_contact_person;
        $supplier->supplier_contact_number = $request->supplier_contact_number;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->number_of_employees_hired = $request->number_of_employees_hired;
        $supplier->hire_date = $request->hire_date;
        $supplier->additional_remarks = $request->additional_remarks;

        $supplier->save();
        return redirect()->route('admin.suppliers.index');
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
    public function edit(Supplier $supplier)
    {
        $arr['supplier'] = $supplier;
        return view('admin.suppliers.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $supplier->supplier_id  = $request->supplier_id;
        $supplier->supplier_company_name = $request->supplier_company_name;
        $supplier->name_of_contact_person = $request->name_of_contact_person;
        $supplier->supplier_contact_number = $request->supplier_contact_number;
        $supplier->supplier_email = $request->supplier_email;
        $supplier->supplier_address = $request->supplier_address;
        $supplier->hired_date = $request->hired_date;
        $supplier->estimated_work_end_date = $request->estimated_work_end_date;
        $supplier->additional_remarks = $request->additional_remarks;

        $supplier->save();
        return redirect()->route('admin.suppliers.index');
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
