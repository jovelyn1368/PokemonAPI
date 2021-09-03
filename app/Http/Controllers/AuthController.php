<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{

    public function index()
    {
        return view('app');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('app');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user= Auth::user();
            $username = $user->name;
            return response()->json([
              'status'   => 'success',
              'user' => $username,
            ]); 
          } else { 
            return response()->json([
              'status' => 'error',
              'user'   => 'Unauthorized Access'
            ]); 
          } 
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            
          ]);
          if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()]);
          }
          $postArray = $request->all(); 
         
          $postArray['password'] = bcrypt($postArray['password']); 
          $user = User::create($postArray); 
          
          $success['token'] = $this->apiToken;  
          $success['name'] =  $user->name;
          // send output data to vue3
          return response()->json([
            'status' => 'success',
            'data' => $success,
          ]); 
        
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('home');
        }
  
        return redirect("app")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('app');
    }
}