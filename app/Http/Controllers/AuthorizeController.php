<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\PageController;
<<<<<<< HEAD
use App\Http\Controllers\AllumniController;
=======
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
use App\Http\Controllers\Auth\RegisterController;

class AuthorizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getAuthorize(){
        $authorize = DB::table('users')
        ->join('authorization_app','users.id','=','authorization_app.users_id')
        ->join('app','authorization_app.app_id','=','app.id')->where('users.id', '=',Auth::id())->get();
<<<<<<< HEAD
=======
        // $subApp = DB::table('authorize_sub_app')->join('sub_app','authorize_sub_app.sub_app_oid','=','sub_app.oid')
        // ->where('authorization_app_id','=',)
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
        return $authorize;
    }

    public function getSubAuthorize($request){
<<<<<<< HEAD
        $authorize = DB::table('sub_app')->join('authorize_sub_app as asap','asap.sub_app_id','=','sub_app.id')
        ->join('authorization_app as ap','ap.id','=','asap.authorization_app_id')
        ->where('users_id','=',Auth::id())->get();
        return $authorize;
    }
    public function index($request){
=======
        $authorize = DB::table('sub_app')->join('authorize_sub_app as asap','asap.sub_app_oid','=','sub_app.oid')
        ->join('authorization_app as ap','ap.id','=','asap.authorization_app_id')
        ->where('users_id','=',Auth::id())->where('link','=',$request)->get();
        return $authorize;
    }
    public function getDesignation(){
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
        return response()->json($designation);

        // example
    }

    public function index($request){
        $sample = '';
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
        foreach($this->getAuthorize() as $item){
            if($item->link === $request){
                switch($request){
                    case 'login': return view('auth.login'); break;
                    case 'admin': return app(HomeController::class)->index(); break;
                    case 'register': return view('auth.register'); break;
<<<<<<< HEAD
                    case 'alumni': return app(AllumniController::class)->index($this->getSubAuthorize($request)); break;
                    case 'alumniAdmin': return app(AllumniController::class)->alumniAdmin($this->getSubAuthorize($request)); break;
                    case 'grade_inquiry': return app(StudentsController::class)->grade();
                }
            }else{
=======
                }
            }else{
                $sample = '';
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
                foreach($this->getSubAuthorize($request) as $subitem){
                    if($subitem->link === $request){
                        switch($request){
                            case 'semester': return app(SemestersController::class)->index(); break;
                            case 'semesterCreate': return app(SemestersController::class)->create(); break;
                            case 'employees': return app(EmployeesController::class)->index(); break;
                            case 'employeeCreate': return app(EmployeesController::class)->create(); break;
                            case 'student': return app(StudentsController::class)->index(); break;
                            case 'schoolId': return app(StudentsController::class)->assign(); break;
<<<<<<< HEAD
                            case 'alumniinfo': return app(AllumniController::class)->info($this->getSubAuthorize($request)); break;
                            case 'jobhistory': return app(AllumniController::class)->history($this->getSubAuthorize($request)); break;
                        }
                    }
                } 
                //return app(PageController::class)->index($request);
            }
        }
        return redirect('/choose');
        // if($request === 'choose'){
        //     return view('choose',['authorize' => $authorize]);
        // }else{
        //     foreach($authorize as $auth){
        //         if($auth->link == $request && $request == 'register'){
        //             return view('auth.register');
        //         }else if($auth->link == $request){
        //             return redirect($request);
        //         }       
        //     }
        // }
    }

    public function choose(){
        return view('choose',['authorize'=>$this->getAuthorize()]);
=======
                        }
                    }
                } 
                return app(PageController::class)->index($request);
            }
        }
        return redirect('/choose');
    }
    public function choose(){
        return view('choose', ['authorize'=>$this->getAuthorize()]);
    }

    public function login(){
        return view('auth.login');
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
    }

    public function store(Request $request){

    }

    public function create(){
        
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