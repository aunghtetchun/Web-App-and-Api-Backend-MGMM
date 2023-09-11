<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class AuthController extends ResponseController
{
    //create user
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|unique:users|max:30',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        // $input = $request->all();
        $user=new User();
        $user->name= $request->name;
        $user->email= $request->email;
        $user->password=bcrypt($request->password);
        $user->role=3;
        $user->save();
        // $input=$request->only('name','email', 'password');
        // $input['password'] = bcrypt($input['password']);
        // $input['role'] = 3;
        // $user = User::create($input);
        if ($user) {
            $success['token'] =  $user->createToken('token')->accessToken;
            $success['message'] = "Registration successfull..";
            $success['email'] = $user->email;
            $success['name'] = $user->name;
            return $this->sendResponse($success);
        } else {
            $error = "Sorry! Registration is not successfull.";
            return $this->sendError($error, 401);
        }
    }

    //login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|max:30',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $accessToken = $user->createToken('authToken')->accessToken;

            return response()->json([
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'token' => $accessToken,
                'token_type' => 'Bearer',
                'expires_in' => 3600
            ],200);
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

  

    //logout
    public function logout(Request $request)
    {

        $isUser = $request->user()->token()->revoke();
        if ($isUser) {
            $success['message'] = "Successfully logged out.";
            return $this->sendResponse($success);
        } else {
            $error = "Something went wrong.";
            return $this->sendResponse($error);
        }
    }

    //getuser
    public function getUser(Request $request)
    {
        //$id = $request->user()->id;
        $user = $request->user();
        if ($user) {
            return $this->sendResponse($user);
        } else {
            $error = "user not found";
            return $this->sendResponse($error);
        }
    }
}
