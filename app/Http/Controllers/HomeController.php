<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
=======
use App\Models\IncomingStudent;
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
use App\Models\Semester;
use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $auth = '';
<<<<<<< HEAD
    public function __construct()
=======
    public function __construct(Request $request)
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
    {
        $this->middleware('auth');
    }

<<<<<<< HEAD
    protected function isAuthorize($request){
=======
    protected function isAuthorize(){
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
        $authorize = DB::table('users')
        ->join('authorization_app','users.id','=','authorization_app.users_id')
        ->join('app','authorization_app.app_id','=','app.id')->where('authorization_app.users_id', '=',Auth::id())->get();
        $b = false;
        foreach($authorize as $a){
<<<<<<< HEAD
            if($a->link == $request){
=======
            if($a->link == 'admin'){
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
                $b = true;
            }
        }
        return $b;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
<<<<<<< HEAD
    public function index(){
        $enrollees = Student::all();
        $semesters = Semester::all();
        $current_semester = Semester::where('created_at', $semesters->count())->get();
        $countEnrollees = $enrollees->count();
        $countIncoming = $enrollees->where('student_status', 'incoming')->count();
        $countTransferees = $enrollees->where('student_status', 'transferee')->count();
        $countReturning = $enrollees->where('student_status', 'returnee')->count();
        $countOld = $enrollees->where('student_status', 'old')->count();
        $countAdvised = $enrollees->where('application_status', 'advised')->count();
        $countAccepted = $enrollees->where('application_status', 'accepted')->count();
        $transferredTo = $enrollees->where('application_status', 'transferred_to')->count();
        $hasSchoolID = $enrollees->where('school_id', '!=', NULL)->count();

        $sample = DB::table('authorization_app')->selectRaw('app_id')->groupBy("app_id")->get();

        return view('dashboard' , [
            'counted' => $countEnrollees,
            'incoming' => $countIncoming,
            'transferees' => $countTransferees,
            'returning' => $countReturning,
            'old' => $countOld,
            'countAdvised' => $countAdvised,
            'countAccepted' => $countAccepted,
            'transferredTo' => $transferredTo,
            'hasSchoolID' => $hasSchoolID,
            'semesters' => $current_semester,
            'sample' => $sample
        ]);
    }

}
=======
    public function index()
    {
        if($this->isAuthorize()){
            $enrollees = IncomingStudent::all();
            $semesters = Semester::all();
            $current_semester = Semester::where('created_at', $semesters->count())->get();
    
            $countEnrollees = $enrollees->count();
            $countIncoming = $enrollees->where('is_new', 1)->count();
            $countTransferees = $enrollees->where('is_tranferee', 1)->count();
            $countReturning = $enrollees->where('is_returnee', 1)->count();
            $countOld = $enrollees->where('is_old', 1)->count();
            $countAdvised = $enrollees->where('is_advised', 1)->count();
            $countAccepted = $enrollees->where('is_accepted', 1)->count();
            $transferredTo = $enrollees->where('application_status', 'transferred_to')->count();
            $hasSchoolID = $enrollees->where('school_id', '!=', NULL)->count();
    
            $sample = DB::table('authorization_app')->selectRaw('app_id')->groupBy("app_id")->get();
    
            return view('dashboard' , [
                'counted' => $countEnrollees,
                'incoming' => $countIncoming,
                'transferees' => $countTransferees,
                'returning' => $countReturning,
                'old' => $countOld,
                'countAdvised' => $countAdvised,
                'countAccepted' => $countAccepted,
                'transferredTo' => $transferredTo,
                'hasSchoolID' => $hasSchoolID,
                'semesters' => $current_semester,
                'sample' => $sample
            ]);
        }
        return redirect()->route('choose');
    }
}
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
