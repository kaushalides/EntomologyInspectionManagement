<?php

namespace App\Http\Controllers;
use \Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Companies;
class CompanyController extends Controller
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
       
        DB::table('company')->insert(
            ['company_name' => $request->company_name, 'company_address' => $request->company_address,
            'company_contact' => $request->company_contact, 'company_fax' => $request->company_fax,
            'company_email' => $request->company_email, 'company_reg_no' => $request->company_reg_no]
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
            $companies = DB::table('company')
            ->orderBy('company_name', 'asc')
            ->get();
            return view('view_company',compact(['companies', 'companies'])
     );
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $req)
    {
        DB::table('company')
        ->where('company_id', $req->company_id)
        ->update(['company_name' => $req->com_name,
        'company_address' => $req->com_address,
        'company_fax' => $req->com_fax,
        'company_reg_no' => $req->com_reg,
        'company_email' => $req->com_email,
        'company_contact' => $req->com_nmbr]);
        return redirect()->back();

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
}
