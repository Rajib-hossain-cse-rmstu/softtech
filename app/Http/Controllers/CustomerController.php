<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        return view('layouts.home');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // $check=Auth::guard('customers')->attempt([
        $check=Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password,
        ]);
        dd($check);


            if($check){
                dd("authenticate");
                return redirect()->route('dashboard');
            }else{
                return redirect()->back();
            }
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'required|min:6', 

            // 'status' => 'string|required'
        ]);
        // dd($request->all());
        $data = Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        // dd($request->all());
        return redirect()->route('dashboard');
        // $data = [
        //     'name' => $request->name,
        //     'email' => $request->email, 
        //     'subject' => $request->subject,
        //     'issue' => $request->issue,
        //     'message' => $request->message,
        // ];


            // Mail::to('receiver@gmail.com')->send(new MailContact($data));
            // Toastr::success('Thanks for Giving us Feedback');
            // return redirect()->route('frontend.dashboard')->with('success', 'Thanks for giving us your feedback');
    }

    public function dashboard(){
        dd('ok');
    }
}
