<?php

namespace App\Http\Controllers;

use App\Models\IncomingStudent;
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
    public function __construct(Request $request)
    {
        $this->middleware('auth');
    }

    protected function isAuthorize(){
        $authorize = DB::table('users')
        ->join('authorization_app','users.id','=','authorization_app.users_id')
        ->join('app','authorization_app.app_id','=','app.id')->where('authorization_app.users_id', '=',Auth::id())->get();
        $b = false;
        foreach($authorize as $a){
            if($a->link == 'admin'){
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
