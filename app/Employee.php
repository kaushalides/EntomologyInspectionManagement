<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
class Employee extends Model
{
    public static function getCompanyEmployee($sectionid=0){
        
        $value =  DB::table('employees')
        ->where('inspection.company_id',$sectionid)
        ->join('inspection', 'inspection.emp_id', '=', 'employees.emp_id')
        ->orderBy('inspection.ins_date', 'desc')->limit(1)->get();
        return $value;
      }
}
