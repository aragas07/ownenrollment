<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
<<<<<<< HEAD
=======
use Illuminate\Support\Facades\DB;
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }
<<<<<<< HEAD
=======

    public function getUsers(){
        $users = User::all();

        return response()->json($users);
    }
>>>>>>> 4902ee9d50166865fed8abff13e702c06e03287b
}
