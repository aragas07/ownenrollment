<?php
namespace App\Http\Controllers;
use App\Models\IncomingStudent;
use App\Models\Student;
use App\Models\User;
use App\Models\Studentgrade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function grade(){
        $sid = Auth::user()->username;
        $grades = DB::select("SELECT * FROM `studentgrade` where username='$sid' and sy = (select sy from studentgrade where username='$sid' order by sy desc limit 1) and 
        semester = (select semester from studentgrade where username='$sid' and sy=(select sy from studentgrade where username='$sid' order by sy desc limit 1) order by semester desc limit 1)");
        $sem = collect(\DB::select("SELECT semester FROM studentgrade where username='$sid' and sy=(SELECT sy FROM studentgrade where username='$sid' order by sy desc limit 1) order by semester desc limit 1"))->first();
        $sy = DB::table('studentgrade')->select('sy')->where('username','=',Auth::user()->username)->groupBy('sy')->get();
        if($sem === null){
            $sem = collect(\DB::SELECT("SELECT semester FROM studentgrade limit 1"))->first();
        }
        //return response(['grade'=>$grades, 'sy'=>$sy, 'sem'=>$sem]);
        return view('students.portal.grade',['grade'=>$grades, 'sy'=>$sy, 'sem'=>$sem]);
    }

    public function getGrade(Request $request){
        $sid = Auth::user()->username;
        $grades = DB::select("SELECT * FROM `studentgrade` where username='$sid' and semester = $request->sem and sy = '$request->sy'");
        $returnGrade = "";
        foreach($grades as $grade){
            $returnGrade .= "<tr><td>".$grade->subject."</td>
            <td>".$grade->description."</td>
            <td>".$grade->grade."</td>
            <td>".$grade->completion."</td></tr>";
        }
        return response()->json(['grade'=>$returnGrade]);
    }

    public function uploadStudent(Request $request){
        $file= $request->uploadedfile;
        $filename = $request->uploadedfile->getClientOriginalName();
        $file->move('upload',$filename);
        $filepath = public_path("upload/".$filename);
        $file = fopen($filepath,"r");
        $importData_arr = array();
        set_time_limit(0);
        $i = 0;
        while (($filedata = fgetcsv($file, 100000, ",")) !== FALSE) {
            $num = count($filedata);
            $user = new User();
            $user->username = $filedata[0];
            $user->password = Hash::make($filedata[1]);
            $user->name = $filedata[2];
            $user->email = $filedata[0]."_".$i."@gmail.com";
            $user->type = 'student';
            $user->save();
            $i++;
            // if($i == 0){
            //     $i++;
            //     continue;
            // }
            // for ($c = 0; $c < $num; $c++) {
            //     $importData_arr[$i][] = $filedata[$c];
            // }
            // $i++;
            // $j = 0;
            // foreach($importData_arr as $importData){
            //     $j++;
            //     $user = new User();
            //     $user->username = $importData[0];
            //     $user->password = Hash::make($importData[1]);
            //     $user->name = $importData[2];
            //     $user->email = $i."-".$j."@gmail.com";
            //     $user->save();
            // }
        }
        return view('auth.register');
    }

    public function index()
    {
        //$incoming_students = IncomingStudent::all();

        $incoming_students = DB::table('incoming_students')
        ->select('*')
        ->paginate(5);

        // $students = DB::table('students')
        // ->select('students.oid as id', 'school_id', 'first_name', 'middle_name', 'last_name', 'courses.acronyms as acronyms', 'student_status', 'application_status')
        // ->join('courses as courses', 'incoming_students.course_first_choice', '=', 'courses.id', 'left')
        // ->orderBy('id', 'DESC')
        // ->paginate(5);
        return view('students.index', [
            'incoming_students' => $incoming_students,'students' => $incoming_students
        ]);
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