<?php

namespace App\Http\Controllers;

use App\Models\IncomingStudent;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    { 
        //$incoming_students = IncomingStudent::all();

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

        //$designation = $user->whatIs();

        $designationData = json_decode( json_encode($designation), true);

        //dd($designationData[0]['program_id']);
        
        if($designationData[0]['designation_role'] == "adviser"){

            $incoming_students = DB::table('incoming_students')
            ->join('program', 'incoming_students.course_prio', '=', 'program.id')
            ->select('incoming_students.*', 'program.major as course_1')        
            ->where('incoming_students.is_accepted', '=', NULL)
            ->where('incoming_students.course_prio', '=', $designationData[0]['program_id'])
            ->orderBy('incoming_students.school_id', 'DESC')
            ->orderBy('incoming_students.created_at', 'DESC')
            
            ->paginate(10);

            return view('students.adviser');
            
        }
        elseif($designationData[0]['designation_role'] == "admission_staff"){
            return view('students.admission');
        } else {
            return view('students.adviser');
        }
    }

    public function ajaxIndex(){

        $user = Auth::id();
        $employee = DB::table('users')
                        ->join('employees', 'users.id', '=', 'employees.users_id')
                        ->select('employees.oid')
                        ->where('users.id', '=', $user)
                        ->get();

        $employeeData = json_decode( json_encode($employee), true);
        
        $designation = DB::table('designation_employees')
                        ->where('designation_employees.employees_id', '=', $employeeData[0]['oid'])
                        ->select('designation_employees.designation_role as dr', 'designation_employees.program_id as dpi')
                        ->get();  

        //$designationData = json_decode( json_encode($designation), true);

        if($designation[0]->dr == 'adviser' || $designation[0]->dr == 'program_head'){

            $orderByClause  = "CASE WHEN program.id = '" . $designation[0]->dpi . "' THEN 0 ELSE 1 END";

            $students = DB::table('incoming_students')
            ->join('program', 'incoming_students.course_prio', '=', 'program.id')
            ->select('incoming_students.*', 'program.description')
            
            ->orderByRaw($orderByClause);
            //->orderBy('school_id', 'asc');

            if(request()->ajax()) {
                return DataTables::of($students)
                ->addColumn('fullname', function($row){
                    return $row->first_name.' '.$row->middle_name.' '.$row->last_name;
                })
                ->filterColumn('fullname', function($students, $keyword){
                    $keywords = trim($keyword);
                    $students->whereRaw("CONCAT(first_name, middle_name, last_name) like ?", ["%{$keywords}%"]);
                })
                ->addColumn('action', function($row){
                    return
                '<a class="btn btn-primary btn-sm mx-1" 
                    id="viewStudent"
                    href="javascript:void(0)" 
                    role="button"
                    data-url="' . route('viewStudent', $row->id) . '">View</a> 
                <a  class="btn btn-primary btn-sm mx-1" 
                    id="viewAdvisee" 
                    href="javascript:void(0)" 
                    role="button" 
                    data-url="' . route('checkRequirements', $row->id) . '">Advise</a>
                <a  class="btn btn-primary btn-sm mx-1" 
                    id="viewEndorse" 
                    href="javascript:void(0)" 
                    role="button" 
                    data-url="' . route('checkRequirements', $row->id) . '">Endorse</a>';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
            }
        } elseif ($designation[0]->dr == 'admission_staff' || $designation[0]->dr == 'admission_head') {

            $students = DB::table('incoming_students')
                ->join('program', 'incoming_students.course_prio', '=', 'program.id')
                ->select('incoming_students.*', 'program.description')
                ->orderBy('school_id', 'asc');

            if(request()->ajax()) {
                return DataTables::of($students)
                ->addColumn('fullname', function($row){
                    return $row->first_name.' '.$row->middle_name.' '.$row->last_name;
                })
                ->filterColumn('fullname', function($students, $keyword){
                    $keywords = trim($keyword);
                    $students->whereRaw("CONCAT(first_name, middle_name, last_name) like ?", ["%{$keywords}%"]);
                })
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
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
            }
        }
        //return view('students.admission');
    }

    public function requirements($id)
    {
        $student = IncomingStudent::find($id);
        
        //dd($student);

        return view('students.requirements')->with('student', $student);
    }

    public function checkRequirements($id)
    {
        $student = DB::table('incoming_students')
            ->select('*')
            ->where('id', $id)
            ->get();

        return response()->json($student);
    }

    public function forAdvising($id)
    {
        $student = DB::table('incoming_students')
            ->select('id', 'first_name', 'middle_name', 'last_name', 'transfer_creds', 'clearance', 'remarks', 'is_accepted', 'is_advised')
            ->where('id', $id)
            ->get();

        return response()->json($student);
    }

    public function checkFiles(Request $request)
    {
        IncomingStudent::where('id', $request->input('reqIdHidden'))
            ->update([
                'student_profile' => $request->input('student_profile'),
                'suast_result' => $request->input('suast_result'),
                'form_138' => $request->input('form_138'),
                'als_pept' => $request->input('als_pept'),
                'good_moral' => $request->input('good_moral'),
                'nso_auth' => $request->input('nso_auth'),
                'marriage_contract' => $request->input('marriage_contract'),
                'id_picture' => $request->input('id_picture'),
                'long_b_env' => $request->input('long_b_env'),
                'win_env_stamp' => $request->input('win_env_stamp'),
                'remarks' => $request->input('remarks'),
            ]);
        return redirect('students');
    }

    public function assign()
    {
        $assign_students = DB::table('incoming_students')
        ->join('program', 'incoming_students.course_prio', '=', 'program.id')
        ->select('incoming_students.*', 'program.major as course_1')        
        ->where('incoming_students.is_accepted', '=', 1)
        ->where('incoming_students.school_id', '=', NULL)
        ->orderBy('incoming_students.date_accepted', 'DESC')
        
        ->paginate(10);

        //dd($assign_students);
        return view('students.assign', [
            'assign_students' => $assign_students,
        ]);
    }

    public function assigned(){

        $students = DB::table('incoming_students')
            ->join('program', 'incoming_students.course_prio', '=', 'program.id')
            ->select('incoming_students.*', 'program.description')
            ->where('school_id', '!=',  'NULL');

        if(request()->ajax()) {
            return DataTables::of($students)
            ->addColumn('fullname', function($row){
                return $row->first_name.' '.$row->middle_name.' '.$row->last_name;
            })
            ->filterColumn('fullname', function($students, $keyword){
                $keywords = trim($keyword);
                $students->whereRaw("CONCAT(first_name, middle_name, last_name) like ?", ["%{$keywords}%"]);
            })
        
            ->rawColumns([])
            ->addIndexColumn()
            ->make(true);
        }
        return view('students.assigned');
    }

    public function accept(Request $request)
    {
        $accepted = 1;
        $currentDate = Carbon::now();

        IncomingStudent::where('id', $request->id)
            ->update([
                'is_accepted' => $accepted,
                'date_accepted' => $currentDate,
            ]);
        return redirect('students');
    }

    public function advise(Request $request)
    {
        $advised = 1;
        $currentDate = Carbon::now();


        IncomingStudent::where('id', $request->id)
            ->update([
                'is_advised' => $advised,
                'date_advised' => $currentDate,
            ]);
        return redirect('students');
    }

    public function endorse(Request $request)
    {

        IncomingStudent::where('id', $request->id)
            ->update([
                'course_prio' => $request->courseSelect,
                'course_second_prio' => $request->courseSelect2,
                'course_third_prio' => $request->courseSelect3,
            ]);

        return redirect('students');
    }

    public function updateSchoolID(Request $request)
    {
        $now = Carbon::now();
        $campus = IncomingStudent::select('campus')
            ->where('id', '=', $request->id)
            ->get();

        $prefix_for_id = '';

        if($campus[0]->campus == 'Main Campus(Mati)'){
            $prefix_for_id = $now->year;
        } elseif ($campus[0]->campus == 'Banaybanay Extension Campus') {
            $prefix_for_id = 'BE22';
        } elseif ($campus[0]->campus == 'Cateel Extension Campus') {
            $prefix_for_id = 'CE22';
        } elseif ($campus[0]->campus == 'San-Isidro Extension Campus') {
            $prefix_for_id = 'SE22';
        } elseif ($campus[0]->campus == 'Baganga Classes Campus') {
            $prefix_for_id = 'BC22';
        }

        
        $last_sid = DB::select('
            SELECT MAX(RIGHT(school_id, POSITION("-" IN school_id)-1)) 
            AS last_count FROM incoming_students 
            WHERE school_id like "' . $prefix_for_id . '-%"
        ');

        if($last_sid[0]->last_count == NULL){
            $counter = 1;
        } else {
            $counter = (int)$last_sid[0]->last_count + 1;
        }

        //$num = (int)$last_sid[0]->last_count + 1;
        //dd($last_sid);
        $school_id = $prefix_for_id . '-' . str_pad($counter, 4, '0', STR_PAD_LEFT);

        IncomingStudent::where('id', $request->id)
            ->update([
                'school_id' => $school_id,
                'school_id_at' => $now->toDateString(),
            ]);

        return redirect('students/assign');
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
        $student = Student::find($id);
        
        return view('students.show')->with('student', $student);
    }

    public function viewStudent($id)
    {
        $student = IncomingStudent::find($id);

        return response()->json($student);
    }

    public function programList(){
        $programs = DB::table('program')
            ->select('*')
            ->get();

        return response()->json($programs);
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
        IncomingStudent::where('id', $id)
            ->update(['school_id'=>$request->input('school_id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
