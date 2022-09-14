<?php

namespace App\Http\Controllers;

use App\Models\IncomingStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Photos;
use App\Models\App;
use App\Models\Program;
use App\Models\User;
use Validator;

class IncomingStudentsController extends Controller{
    public function index(){
        $programs = DB::table('program')->join('department','program.department_id','=','department.id')->
        where('department.id', '!=', 5)->select('*','program.id as pid')->get();
        return view('incomingstudents/stepbystep')->with('program',$programs);
    }

    public function StopNum(Request $req){
    session(['key'=>$req->key,'studenttype'=>$req->type]);
        return response()->json(['number'=>session('key'), 'type'=>session('studenttype')]);
    }

    public function GetNum(){
        return response()->json(['number'=>session('key'), 'type'=>session('studenttype'), 'transaction' => session('tracking')]);
    }
    
    public function create()
    {
        return view('incomingstudents.create');
    }
    
    public function studentform($id){
        return view('studentform')->with(['type'=>$id]);
    }
    
    public function accept(){
        session(['loged'=>true]);
        return response(true);
    }
    
    public function store(Request $request)
    {
        $newStud = new IncomingStudent();
        $newStud->first_name = $request['fname']; 
        $newStud->middle_name = $request['mname'];
        $newStud->last_name = $request['lname'];
        $newStud->suffix = $request['suffix'];
        $newStud->birthdate = $request['birthdate'];
        $newStud->age = $request['age'];
        $newStud->sex = $request['gender'];
        $newStud->civil_status = $request['status'];
        $newStud->spouse_name = $request['spousename'];
        $newStud->citizenship = $request['citizenship'];
        $newStud->height = $request['height'];
        $newStud->weight = $request['weight'];
        $newStud->spouse_occupation = $request['spouseoccupation'];
        $newStud->child_number = $request['marriedchildren'];
        $newStud->r_address = $request['res-add'].', '.$request['res-city'].', '.$request['res-state'].' '.$request['res-zip'];
        $newStud->c_address = $request['cur-add'].', '.$request['cur-city'].', '.$request['cur-state'].' '.$request['cur-zip'];
        $newStud->email = $request['email'];
        $newStud->fb_account = $request['fbacc'];
        $newStud->contact_number = $request['contact'];
        $newStud->ethnic_group = $request['ethnic'];
        $newStud->religion = $request['religion'];
        $newStud->languages = $request['language'];
        $newStud->is_working = $request['wstudent'];
        $newStud->working_for = $request['detailemp'];
        $fathersname = $request['fafname'].' '.$request['famname'].' '.$request['falname'];
        if($request['fasuffix'] !== null){
            $fathersname .= ' '.$request['fasuffix'].'.';
        }
        $mothersname = $request['mofname'].' '.$request['momname'].' '.$request['molname'];
        if($request['mosuffix'] !== null){
            $mothersname .= ' '.$request['mosuffix'].'.';
        }
        if($request['studtype'] === 'new'){
            $newStud->is_new = 1;
        }else if($request['studtype'] === 'transferee'){
            $newStud->is_transferee = 1;
        }
        $newStud->fathers_name = $fathersname;
        $newStud->fathers_contact_number = $request['facontact'];
        $newStud->fathers_address = $request['faaddress'];
        $newStud->fathers_employment = $request['fa-work'];
        $newStud->mothers_name = $mothersname;
        $newStud->mothers_contact_number = $request['mocontact'];
        $newStud->mothers_address = $request['moaddress'];
        $newStud->mothers_employment = $request['mo-work'];
        $newStud->parents_are = $request['optradio2'];
        $newStud->family_monthly_income = $request['famincome'];
        $newStud->siblings = $request['siblings'];
        $newStud->working_siblings = $request['wsiblings'];
        $newStud->college_siblings = $request['csiblings'];
        $newStud->hs_siblings = $request['hsiblings'];
        $newStud->guardian = $request['guardian'];
        $newStud->guardians_number = $request['gcontact'];
        $newStud->guardian_address = $request['gaddress'];
        $newStud->gen_ability = $request['genability'];
        $newStud->spatial_apt = $request['spatial'];
        $newStud->verbal_apt = $request['verbal'];
        $newStud->perceptual_apt = $request['perceptual'];
        $newStud->numerical_apt = $request['numerical'];
        $newStud->manual_dex = $request['manual'];
        $newStud->guardian_not_living_parents = $request['guardianliving'];
        $newStud->elem_school = $request['elemschool'];
        $newStud->elem_year = $request['elemyear'];
        $newStud->high_school = $request['secschool'];
        $newStud->strand = $request['strand'];
        $newStud->hs_year = $request['secyear'];
        $newStud->vocational_school = $request['vocschool'];
        $newStud->vocational_year = $request['vocyear'];
        $newStud->vocational_course = $request['voccourse'];
        $newStud->honors = $request['honors'];
        $newStud->scholar = $request['scholar'];
        $newStud->gctc_course = $request['gctccourse'];
        $newStud->gctc_year = $request['gctcyear'];
        $newStud->campus = $request['campus'];
        $newStud->course_prio = $request['firstcourse'];
        $newStud->course_second_prio = $request['secondcourse'];
        $newStud->course_third_prio = $request['thirdcourse'];
        $newStud->why_this_course = $request['qcourse'];
        $newStud->decide = $request['decide'];
        $newStud->why_dorsu = $request['qenroll'];
        $newStud->ambition_in_life = $request['qambition'];
        $newStud->school_expectation = $request['expectschool'];
        $newStud->instructor_expectation = $request['expeectinstructor'];
        $newStud->subject_like = $request['expectsubjectleast'];
        $newStud->course_expectation = $request['expectcourse'];
        $newStud->student_expectation = $request['expectstudent'];
        $newStud->subject_most_like = $request['expectsubjectmost'];
        $newStud->hobbies = $request['hobbies'];
        $newStud->motto = $request['moto'];
        $newStud->talent = $request['talent'];
        $newStud->interest = $request['interest'];
        $newStud->lrn = $request['lrn'];
        $selfassesment = '';
        for($i = 0; $i < count($request->selfassesment) ;$i++){
            $selfassesment .= $request->selfassesment[$i].' & ';
        }
        $bothers = '';
        for($i = 0; $i < count($request->bothers) ;$i++){
            $bothers .= $request->bothers[$i].' & ';
        }
        $newStud->selfassesment = $selfassesment;
        $newStud->bothers = $bothers;
        $who = 'Friends: '.$request['friends'].', Parents: '.$request['parents'].', Teacher: '.$request['teacher'].', Councilors: '.$request['counselors'];
        $newStud->would_you_like_to_talk = $who;
        $tracking = time().''.rand(0,99);
        $newStud->transaction_number = $tracking;
        $path = public_path().'/studentfile/'.$request['fname'].' '.$request['mname'].' '.$request['lname'];
        $newStud->save();
        $path .= time();
        mkdir($path);
        if($request->image !== null){
            $file = time().'.'.$request->image->extension();
                $newStud->profile = $file;
            $request->image->move($path, $file);
        }
        session(['path' => $path, 'tracking' => $tracking]);
        return response()->json(['transaction'=>$tracking,'success'=>true]);
    }

    public function uploadreq(Request $request){
        $adProfile = ''; $formOne = ''; $goodMoral = ''; $psa = ''; $marriage = ''; $husband = ''; $rog =''; $tor =''; $honorable = '';
        if($request->admissionProfile != ""){ 
            $adProfile = $request->admissionProfile->getClientOriginalName();
            $request->admissionProfile->move(session("path"),$adProfile);
        }
        if($request->formOne != ""){ 
            $formOne = $request->formOne->getClientOriginalName();
            $request->formOne->move(session("path"),$formOne);
        }
        if($request->goodMoral != ""){ 
            $goodMoral = $request->goodMoral->getClientOriginalName();
            $request->goodMoral->move(session("path"),$goodMoral);
        }
        if($request->psa != ""){ 
            $psa = $request->psa->getClientOriginalName();
            $request->psa->move(session("path"),$psa);
        }
        if($request->marriage != ""){ 
            $marriage = $request->marriage->getClientOriginalName();
            $request->marriage->move(session("path"),$marriage);
        }
        if($request->husband != ""){ 
            $husband = $request->husband->getClientOriginalName();
            $request->husband->move(session("path"),$husband);
        }
        if($request->rog != ""){ 
            $rog = $request->rog->getClientOriginalName();
            $request->rog->move(session("path"),$rog);
        }
        if($request->tor != ""){ 
            $tor = $request->tor->getClientOriginalName();
            $request->tor->move(session("path"),$tor);
        }
        if($request->honorable != ""){ 
            $honorable = $request->honorable->getClientOriginalName();
            $request->honorable->move(session("path"),$honorable);
        }
        DB::update('update incoming_students set admission=?,psa_husband=?,form_138=?,good_moral=?,nso_auth=?,marriage_contact=?,transcript_records=?,transfer_creds=?,last_sem_grades=? where transaction_number = ?',
        [$adProfile,$husband,$formOne,$goodMoral,$psa,$marriage,$tor,$honorable,$rog,session('tracking')]);
        //$request->file->move(session('path'),$filename);
        return response()->json(['success'=>"The file has been uploaded",'file'=>"EHOSER","path"=>session("path")]);
    }


    public function showView(){
        $photo = Photos::All();
        return view('incomingstudents.sample')->with('photo',$photo);
    }

    public function searchticket(Request $req){
        $student = DB::table('incoming_students')->where('transaction_number',$req->search)->first();
        return response()->json($student);
    }

    public function show($id)
    {
        $incoming_student = IncomingStudent::find($id);
        return view('incomingstudents.show')->with('incoming_student', $incoming_student);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
