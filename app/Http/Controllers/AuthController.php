<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return"it works";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return"it works";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $name=$request->input('name');
        $email=$request->input('email');
        $password=$request->input('password');


        $user= new User([
            'name'=>$name,
            'email'=>$email,
            'password'=>bcrypt($password)
        ]);

        if($user->save()){

            $user->signin=[
                'href'=>'api/user/sign_in',
                'method'=>'POST',
                'params'=>'email,password'
            ];
            $response=[
                'msg'=>'user created',
                'user'=>$user

            ];
            return response()->json($response,201);

        }


$response=[
  'msg'=>'an error ocured',


];
        return response()->json($response,404);

    }

    public function signin(Request $request)
    {

        $email=$request->input('email');
        $password=$request->input('password');
        return"it works";
    }
}

