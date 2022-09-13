<?php

namespace App\Http\Controllers;

use App\Models\DesignationEmployee;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramHeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employees = Employee::join('people', 'people.id', '=', 'employees.person_id')
        ->get(['*']);

        $advisers = DesignationEmployee::join('employees', 'employees.id', '=', 'designation_employees.employee_id')
        ->join('people', 'people.id', '=', 'employees.person_id')
        ->where('designation_employees.designation_id', '=', 1)->get(['*']);
        
        return view('programhead.index', [
            'advisers' => $advisers,
            'employees' => $employees
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::join('people', 'people.id', '=', 'employees.person_id')
            ->get(['*, employees.first_name']);
        
        return view('programhead.create', [
            'employees' => $employees,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $current_date = Carbon::now();
        $assignment = DesignationEmployee::create([
            'employee_id' => $request->input('employee_id'),
            'designation_id' => 1,
            'designation_role' => 'adviser',
            'academic_year' => $request->input('academic_year'),
            'semester' => $request->input('semester'),
            'assigned_by' => $user->id,
            'date_assigned' => $current_date,
        ]);
        return redirect('program-head');
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
}
