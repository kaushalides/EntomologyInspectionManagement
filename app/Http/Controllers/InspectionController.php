<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
use App\Employee;
use App\Companies;
use App\Inspection;
class InspectionController extends Controller
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
        DB::table('inspection')->insert(
            ['emp_id' => $request->emp, 'company_id' => $request->company,
            'ins_date' => $request->date, 'inspection_note' => $request->note,
            'export_date' => $request->ex_date,'commodity' => $request->commodity]
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
        $inspection = DB::table('inspection')
       ->join('employees', function ($join) {
           $join->on('inspection.emp_id', '=', 'employees.emp_id');

       })->join('company', function ($join) {
        $join->on('inspection.company_id', '=', 'company.company_id');

    })->orderBy('inspection.ins_date', 'desc')
       ->get();
        return view('view_inspection',compact(['inspection', 'inspection'])
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
    public function returnView(){
        $emp = Employee::select('emp_id','emp_name')->get()->toArray();
        $company = DB::select("select * from company");
        //dd($company);
       // $sections= Sections::all()->toArray();
       //$company = json_encode($result);
        return view('add_inspection',compact('emp','company'));
  
       //  return  $emp ;
     }
}
