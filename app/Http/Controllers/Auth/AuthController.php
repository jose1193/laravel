<?php
  /* IMPORT CONTROLLERS CLASS*/
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
 /* IMPORT CONTROLLERS CLASS*/
 use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Session;
use App\Models\User;
use App\Models\UserVerify;
use Hash;
use Mail; 
use DB;
  
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
                        ->withSuccesslogin('You have Successfully loggedin');
        }
  
        return redirect("login")->withError('Opps! You have entered invalid credentials');

        
    }
      
    public function create()
    {
        return view('auth.create');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required|max:20|min:4',
            'lastname' => 'required|max:20|min:4',
            'username' => 'required|unique:users|max:20|min:6',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|confirmed|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       
// CARGA DE FILE IMAGES CON INTERVENTION IMAGE
if ($image = $request->file('image')) {
   
   
    $imageName = time().'.'.$image->extension();
   
    $destinationPathThumbnail = public_path('/thumbnail');
    $img = Image::make($image);
    $img->fit(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPathThumbnail.'/'.$imageName);
 
   
}
// END CARGA DE FILE IMAGES CON INTERVENTION IMAGE

        $check = User::create( [
            'name' => Str::slug($request->name),
            'lastname' => Str::slug($request->lastname),
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' =>  $imageName,
            
          ]);
 

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
    
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:20|min:4',
            'lastname' => 'required|max:20|min:4',
            'username' => 'required|unique:users|max:20|min:6',
            'email' => 'required|email|unique:users|max:60',
            'password' => 'required|confirmed|min:6',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       
// CARGA DE FILE IMAGES CON INTERVENTION IMAGE
if ($image = $request->file('image')) {
   
   
    $imageName = time().'.'.$image->extension();
   
    $destinationPathThumbnail = public_path('/thumbnail');
    $img = Image::make($image);
    $img->fit(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPathThumbnail.'/'.$imageName);
 
   
}
// END CARGA DE FILE IMAGES CON INTERVENTION IMAGE

        $check = User::create( [
            'name' => Str::slug($request->name),
            'lastname' => Str::slug($request->lastname),
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $imageName,
            
          ]);
 

          $token = Str::random(64);
    
          UserVerify::create([
                'user_id' => $check->id, 
                'token' => $token
              ]);
    
          Mail::send('email.emailVerificationEmail', ['token' => $token], function($message) use($request){
                $message->to($request->email);
                $message->subject('Email Verification Budget Control System');
            });
            
            return redirect("users-list")->withSuccess('Great! Verify your email through the link sent to your email inbox');

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
    
    
    public function show(Request $request, User $users)
    {
        $iduser=$request->id;
            $users =DB::table('users')
           ->where('users.id', $iduser)//<-- $var query
           ->get();
        return view('auth.show',compact('users'));
    }

    
    public function lists()
    {
        $users=  User::latest()->paginate(5);
        return view('auth.list',compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

        
    }


    public function edit(Request $request, User $users)
    {
        $iduser=$request->id;
        $users =DB::table('users')
       ->where('id', $iduser)//<-- $var query
       ->get();   
            return view('auth.edit',compact('users')); 
        
      
    }
/**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $users)
    {
        $request->validate([
            'name' => 'required|max:20|min:4',
            'lastname' => 'required|max:20|min:4',
            'username' => 'required|max:20|min:6',
            'email' => 'required|email|max:60',
            
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

       
// UPDATE DE FILE IMAGES CON INTERVENTION IMAGE
if ($image = $request->file('image')) {
   
    $users = User::find($request->id);

    $destinationPathThumbnail =  'thumbnail/';
//code for remove old file
if($users->image != ''  && $users->image != null){
    $file_old = $destinationPathThumbnail.$users->image;
    unlink($file_old);
}
$imageName = time().'.'.$image->extension();
    $img = Image::make($image);
    $img->fit(100, 100, function ($constraint) {
        $constraint->aspectRatio();
    })->save($destinationPathThumbnail.'/'.$imageName);
   
   
}
// END UPDATE DE FILE IMAGES CON INTERVENTION IMAGE

        $users->update([
            'name' => $request->name,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'image' =>  $imageName,
           
          ]);
      
        return redirect()->route('list')
                        ->with('success','User updated successfully');

    }

    public function destroy(Request $request,User $users)
    {
       
        $users = User::find($request->id);
       
        $image=$users->image;
        // DELETE FILE IMAGE
     
        $image_path ='thumbnail/'. $users->image;

        if (User::exists( $image_path))
        {
            $user= User::where('id', $request->id)->delete();
            unlink($image_path);

        }
        // DELETE FILE IMAGE
       
       
        
        return redirect()->route('list')
                        ->with('success','User deleted successfully');
    }



}