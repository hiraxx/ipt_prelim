<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Nexmo\Laravel\Facade\Nexmo;

class AuthController extends Controller
{
    public function registrationForm(){
        return view('registration');
    }

    public function loginForm(){
        return view('login');
    }

    public function register(Request $request){
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'phone' => 'string|required',
            'password' => 'string|required'
        ]);
        
        $token = Str::random(24);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $token
        ]);
        
        Mail::send('verification-email', ['user'=>$user], function($mail) use ($user) {
            $mail->to($user->email);
            $mail->subject('Account Verification');
            $mail->from('blue15081@gmail.com', 'IPT APP');
        });

        Nexmo::message()->send([
            'to' => '63'.$request->phone,
            'from' => 'IPT APP',
            'text' => 'Your account is created please check your email to verify. Thank you!'
        ]);

        return redirect('/login')->with('Message_Info', 'Account created, check your email to verify it.');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|required'
        ]);

        $user = User::where('email', $request->email)->first();

        $login = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]); 

        if(!$login){
            return back()->with('Error', 'Invalid Credentials');
        }

        if(!$user || $user->email_verified_at==null){
            return redirect('/login')->with('Error', 'Account not verified yet. Please verify your email first.');
        }

        return redirect('/dashboard');
    }

    public function verification(User $user, $token){
        if($user->remember_token!==$token){
            return redirect('/login')->with('Error', 'Invalid Token');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('Message_Success', 'Account verified. You may now login.');        
    }
}
