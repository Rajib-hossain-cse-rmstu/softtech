<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class ForgetPasswordController extends Controller
{
    public function emailCheckForm()
    {
        return view('forgetpassword.changepassword');
    }

    public function emailCheckFormStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $email = $request->email;

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
          ]);


        return redirect()->route('dashboard');
    }

    public function newPassword($token)
    {
        return view('forgetpassword.newpassword', compact('token'));
    }

    public function newPasswordStore(Request $request)
    {
        $validate=Validator::make($request->all(),[
            'email' => 'email|requried|exists:users',
            'password'=>'required|confirmed|min:6',
            'password_confirmation' => 'required',
        ]);

        $updatePassword = DB::table('password_resets')
        ->where([
          'email' => $request->email, 
          'token' => $request->token
        ])
        ->first();

        if($validate)
        {
           Customer::where('email', $request->email)->update([
                'password' => bcrypt($request->password),
            ]);
            DB::table('password_resets')->where(['email'=> $request->email])->delete();
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->back();
        }


    }

}
