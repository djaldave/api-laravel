<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        // echo $request->input("name");
        // return request()->json($request->input(),201);
        // return response()->json($request->input(),201);
        $user  = new User;
        $validator = Validator::make(
            $request->all(),
            [
                "name"=>"required",
                "password"=>"required|min:8",
                "email"=>"required|email|unique:users,email",
            ]
        );

        if($validator->fails()){
            $errors = $validator->errors();
            $err = array(
                "name"=>$errors->first("name"),
                "password"=>$errors->first("password"),
                "email"=>$errors->first("email")
            );
            echo $errors->first('email');
            return response()->json(
                array(
                    "messsage" => "Error",
                    "errors"=> $err
                ),
                422
            );
        }

        $user->name =$request->input("name");
        $user->email=$request->input("email");
        $user->password=Hash::make($request->input("password"));
        $user->save();
        // return response()->json($request->input(),201);
        return response()->json(
            array(
                "messsage"=>"Registration Successs",
                "user"=>$user
            ),
            201
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
