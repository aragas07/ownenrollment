<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
<<<<<<< HEAD
=======
use Yajra\DataTables\Facades\DataTables;
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
<<<<<<< HEAD
        $employees = Employee::join('users', 'users.id', '=', 'employees.users_id')
            ->get();
        
        return view('employees.index', [
            'employees' => $employees
        ]);
=======
        return view('employees.index');
    }

    public function getEmployees(){
        $employees = Employee::join('designation_employees', 'employees.oid', '=', 'designation_employees.employees_id')
            ->join('users', 'users.id', '=', 'employees.users_id')
            ->get(['*', 'employees.id as employeeid']);

        if(request()->ajax()) {
            return DataTables::of($employees)
            ->addColumn('action', function($row){
                return
            '<a class="btn btn-primary btn-sm mx-1" 
                id="viewStudent"
                href="javascript:void(0)" 
                role="button"
                data-url="' . route('viewStudent', $row->id) . '">View</a> 
            <a  class="btn btn-primary btn-sm mx-1" 
                id="checkRequirements" 
                href="javascript:void(0)" 
                role="button" 
                data-url="' . route('checkRequirements', $row->id) . '">Accept</a>';
            }
            )
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }
        
        return response()->json($employees);
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
