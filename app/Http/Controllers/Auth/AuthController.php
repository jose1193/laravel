<?php
  /* IMPORT CONTROLLERS CLASS*/
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 /* IMPORT CONTROLLERS CLASS*/
 use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\UserVerify;
use Hash;
use Mail; 
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.register');
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        //$remember = $request->has('remember') ? true : false; 
        $remember = $request->remember; 
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('You have Successfully loggedin');
        }
  
        return redirect("login")->withError('Opps! You have entered invalid credentials');

        
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required|unique:users|max:20|min:6',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|confirmed|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        $token = Str::random(64);
  
        UserVerify::create([
              'user_id' => $check->id, 
              'token' => $token
            ]);
  
        Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Budget Control System');
          });
         
         
        return redirect("register")->withSuccess('Great! Verify your email through the link sent to your email inbox');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => Str::slug($data['name']),
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
  
        return Redirect('login');
    }
    
    
    /** FUNCION PARA CONSULTAR SI EL USER YA FUE ACTIVADO
     * Write code on Method
     *
     * @return response()
     */
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $warning = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $emailverificationmessage2 = "Your e-mail is verified. You can now login.";
            } else {
                $emailverificationmessage2 = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('emailverificationmessage2', $emailverificationmessage2);
    }
    ///** FIN FUNCION PARA CONSULTAR SI EL USER YA FUE ACTIVADO
    
}