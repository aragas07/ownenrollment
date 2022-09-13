<?php

namespace App\Http\Controllers;

use App\Models\IncomingStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Photos;
use App\Models\App;
use Validator;

class IncomingStudentsController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        return view('incomingstudents/create');
    }

    public function StopNum($id,$type){
        session(['key'=>$id,'studenttype'=>$type]);
        return response()->json(['number'=>session('key'), 'type'=>session('studenttype')]);
    }

    public function GetNum(){
        return response()->json(['number'=>session('key'), 'type'=>session('studenttype')]);
    }
    
    public function create()
    {
        return view('incomingstudents.create');
    }
    
    public function studentform($id){
        return view('studentform')->with(['type'=>$id]);
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

        $newStud->fathers_employment = $request['faemployment'];
        $newStud->fathers_contact_number = $request['facontact'];
        $newStud->selfassesment = $request['selfassesment'];
        $newStud->bothers = $request['bothers'];
        $who = 'Friends: '.$request['friends'].', Parents: '.$request['parents'].', Teacher: '.$request['teacher'].', Councilors: '.$request['counselors'];
        $newStud->would_you_like_to_talk = $who;
    
        $file = time().'.'.$request->image->extension();
        $path = public_path().'/studentfile/'.$request['fname'].' '.$request['mname'].' '.$request['lname'];
        $newStud->profile = $file;
        $newStud->save();
        mkdir($path);
        $request->image->move($path, $file);
        return response()->json(['sample'=>$request['fname']]);
    }

    public function showView(){
        $photo = Photos::All();
        return view('incomingstudents.sample')->with('photo',$photo);
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
