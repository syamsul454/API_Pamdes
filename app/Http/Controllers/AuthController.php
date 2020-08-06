<?php

namespace App\Http\Controllers;

use App\User;
use App\DataPegawai; 
use Validator;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Http\Controllers\API\ResponseController as ResponseController;
use Laravel\Passport\Client as OClient; 

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|',
            'password' => 'required',
            'role' => 'required',

        ]);

        if($validator->fails()){
            return response()->json(['messge' => $validator->errors()], 401);
            //return $this->sendError($validator->errors());       
        }


        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        if($user){
            DataPegawai::create([
                'user_id' => $user->id,
                'name' => $request->name,
                'nip' => $request->nip,
                'jabatan' => $request->jabatan,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat,
            ]);
            
            $success['token'] =  $user->createToken('token')->accessToken;
            $success['message'] = "Registration successfull..";
            return 'success';
        }
        else{
            $error = "Sorry! Registration is not successfull.";
            return $error;
        }
        
    }
    
    //login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $credentials = request(['username', 'password']);
        if(!Auth::attempt($credentials)){
            $error = "Unauthorized";
            return $this->sendError($error, 401);
        }
        $user = $request->user();
        $success['token'] =  $user->createToken('token')->accessToken;
        return response()->json($success, 200);
    }

    //logout
    public function logout(Request $request)
    {
        
        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Successfully logged out.";
            return $this->sendResponse($success);
        }
        else{
            $error = "Something went wrong.";
            return $this->sendResponse($error);
        }
            
        
    }

    //getuser
    public function getUser(Request $request)
    {
        //$id = $request->user()->id;
        $user = $request->user();
        if($user){
            return $this->sendResponse($user);
        }
        else{
            $error = "user not found";
            return $this->sendResponse($error);
        }
    }
   
}
