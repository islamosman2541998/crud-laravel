<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function register(){
        return view(
            'auth.register'
        );
    }
    public function handleRegister(Request $request ){

        $request->validate([
            'name' => 'Required|string|max:100',
             'email' => 'required|email|max:100|unique:users,email',
            'password' => 'Required|string|max:50|min:5',
        ]); 
       $user = User::create([

            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),

        ]); 
        Auth::login($user);

        return redirect (route('auth.login'));

    }

    public function login(){
        return view(
            'auth.login'
        );
    }
    public function handleLogin(Request $request ){

        $request->validate([
           
            'email' => 'Required|email|max:100',
            'password' => 'Required|string|max:50|min:5',
        ]); 
      $isLogin = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);

      

      if($isLogin){
        return redirect(route('students.index'));
      }else {
        return back();
      }


    }
    public function logout(){
        Auth::logout();
        return redirect(route('auth.login'));
    }

   public function redirectToProvider () {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback () {
        $user = Socialite::driver('github')->user();
       $email = $user->email;
      $db_user = User::where('email','=',$email)->first();

      if($db_user == null){
        $register_user = User::create([
            'name'=>$user->name,
            'email'=>$user->email,
            'password'=>Hash::make('123456'),
            'oauth_token'=>$user->token,

        ]);
        Auth::login($register_user);

    }else{
        Auth::login($db_user);
    }

        return redirect(route('students.index'));
    }

}
