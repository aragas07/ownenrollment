<?php namespace App\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeComposer
{

    public function compose($view)
    {
        //Add your variables

        $user = Auth::id();
        $employee = DB::table('users')
                        ->join('employees', 'users.id', '=', 'employees.users_id')
                        ->select('employees.oid')
                        ->where('users.id', '=', $user)
                        ->get();

        $employeeData = json_decode( json_encode($employee), true);
        

        $designation = DB::table('designation_employees')
                        ->where('designation_employees.employees_id', '=', $employeeData[0]['oid'])
                        ->select('designation_employees.designation_role', 'designation_employees.program_id')
                        ->get();  

        $designationData = json_decode( json_encode($designation), true);

        $view->with('empDes', $designationData);
    }
}