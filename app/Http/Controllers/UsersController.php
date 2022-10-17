<?php

namespace App\Http\Controllers;
  
use App\Models\Users;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\UserVerify;
use Hash;
use Mail; 
use Session;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=  Users::latest()->paginate(5);
        return view('users.list',compact('users'))
        ->with('i', (request()->input('page', 1) - 1) * 5);

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        $check = Users::create( [
            'name' => Str::slug($request->name),
            'lastname' => Str::slug($request->lastname),
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $request->image,
            
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
            return redirect("users.index")->withSuccess('Great! Verify your email through the link sent to your email inbox');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Users $users)
    {
        $iduser=$request->id;
            $users =DB::table('users')
           ->where('users.id', $iduser)//<-- $var query
           ->get();
        return view('users.show',compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit( Users $users)
    {
        
            return view('users.edit',compact('users')); 
        
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $users)
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
 
   
}else{
    unset( $imageName);
}
// END CARGA DE FILE IMAGES CON INTERVENTION IMAGE

        $users->update([
            'name' => Str::slug($request->name),
            'lastname' => Str::slug($request->lastname),
            'username' => $request->username,
            'email' => $request->email,
            'image' => $request->image,
           
          ]);
      
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Users $users)
    {
        $user= Users::select('id')->where('id', $request->id)->delete();
        $image=$user->image;
        // DELETE FILE IMAGE
        $image_path = public_path('thumbnail/'. $image);

        if (Users::exists( $image_path))
        {
            unlink($image_path);

        }
        // DELETE FILE IMAGE
       
       
        
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
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
