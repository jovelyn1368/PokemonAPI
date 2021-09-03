<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\User;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function logout(Request $request) 
    {
      $this->guard()->logout();
        return response()->json([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
        
    }
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password], true)){ 
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
        
        return redirect()->intended('home');
    }
}