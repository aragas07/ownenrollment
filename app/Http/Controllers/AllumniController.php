<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Alumni;
use App\Models\Student;
use App\Models\Region;
use App\Models\Province;
use App\Models\City;
use App\Models\Barangay;
use App\Models\Job;

class AllumniController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function getUser(){
        return Student::where('users_id',Auth::id())->get();
    }

    public function history($submenu){
        $job = '';
        foreach($this->getUser() as $user){
            $job = Job::where('alumni_id',$user->id)->where('alumni_id',$user->id)->get();
            foreach($job as $alljob){
                if($alljob->barangay != null){
                    
                }
            }
            $employee = DB::table('job')->join('barangay','barangay.id','=','job.barangay_id')
            ->join('city','city.id','=','barangay.city_id')
            ->join('province','province.id','=','city.province_id')
            ->join('region','region.id','=','province.region_id')->where('alumni_id',$user->id)->where('status','Employed')->get();
            $employedOutside = Job::whereNotNull('outside')->where('alumni_id',$user->id)->where('status','Employed')->get();
            $selfEmployed = Job::where('status','!=','Employed')->where('status','!=','Unemployed')->where('status','!=','other')->where('alumni_id',$user->id)->get();
            $unemployed = Job::where('status','unemployed')->where('alumni_id',$user->id)->get();
            $other = Job::where('status','other')->where('alumni_id',$user->id)->get();
        }
        return view('allumni.allumnistud.joblist',
        ['loged'=>true, 'user'=>$this->getUser(), 'employee'=>$employee, 'employedOutside'=>$employedOutside,
        'selfemployed'=>$selfEmployed, 'unemployed'=>$unemployed, 'other'=>$other, 'student'=>true, 'submenu'=>$submenu]);
    }
    
    public function insertJob(Request $req){
        $job = new Job();
        $job->salary = $req->income;
        $sample = "";
        $job->alumni_id = $req->userid;
        $job->status = $req->empstatus;
        if($req->empstatus === 'Employed'){
            $sample = "Employed sample";
            $job->sector = $req->sector;
            $job->employername = $req->employername;
            if($req->sector == 2){
                $job->outside = $req->outside;
            }else{
                $job->barangay_id = $req->barangay;
            }
            $job->position = $req->position;
            $job->datestart = $req->from;
            $job->dateend = $req->to;
            $industry = '';
            for($i = 0; $i < count($req->industry) ;$i++){
                $industry .= $req->industry[$i].' & ';
            }
            $job->industry = $industry;
            $job->field = $req->field;
        }else if($req->empstatus === 'Unemployed'){
            $job->hiring = $req->hiring;
            $job->past_employment = $req->employed;
            $sample = "Unemployed sample";
        }else if($req->empstatus === 'Other'){
            $job->religious = $req->religion;
            $sample = "Other sample";
        }else{
            $sample = "Self employed sample";
            $job->status = $req->business;
        }
        $job->save();
        return response()->json(['success'=>true]);
    }
    
    public function index($submenu){
        // return response()->json($submenu);
        if(session('loged')){
            return view('allumni.allumnistud.job',
            ['loged'=>true, 'user'=>$this->getUser(), 'region'=>Region::all(), 
            'province'=>$this->province(1), 'city'=>$this->city(1), 'barangay'=>$this->barangay(1), 'student'=>true, 'submenu'=>$submenu]);
        }else{
            return view('allumni.allumnistud.consent',['loged'=>false, 'student'=>true]);
        }
    }

    public function alumniAdmin($submenu){
        $data = DB::table('job')->select('status',DB::raw('count(*) as total'))->groupBy('status')->get();
        return view('allumni.allumniadmin.home',['loged'=>true, 'student'=>false, 'submenu'=>$submenu, 'data'=>$data]);
    }

    public function info($submenu){
        return view('allumni.allumnistud.info',['loged'=>true, 'user'=>$this->getUser(), 'student'=>true, 'submenu'=>$submenu]);
    }

    public $province;
    public function province($id){
        return Province::where('region_id',$id)->get();
    }

    public function returnProvince(Request $req){
        return response()->json($this->province($req->id));
    }

    public function city($id){
        return City::where('province_id',$id)->get();
    }

    public function returnCity(Request $req){
        return response()->json($this->city($req->id));
    }

    public function barangay($id){
        return Barangay::where('city_id',$id)->get();
    }

    public function returnBrgy(Request $req){
        return response()->json($this->barangay($req->id));
    }

}