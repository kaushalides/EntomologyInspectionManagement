<?php

namespace App\Http\Controllers;
use DB;
use App\Employee;
use App\Companies;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::table('employees')->insert(
            ['emp_name' => $request->emp_name, 
            'emp_designation' => $request->emp_des,
            'emp_address' => $request->emp_address,
            'emp_email' => $request->emp_email, 'emp_phone' => $request->emp_contact]
        );
        
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $employees = DB::table('employees')
        ->orderBy('emp_name', 'asc')
        ->get();
        return view('view_employee',compact(['employees', 'employees'])
 );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    public function getEmployees($sectionid=0){
        // Fetch Employees by Departmentid
        $userData['data'] = Employee::getCompanyEmployee($sectionid);

             return  $userData;                                                                                                                                                                                                                                                                                                                                                                                                                                                
      }
}
