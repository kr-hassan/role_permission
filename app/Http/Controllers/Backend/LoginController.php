<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function admin()
    {
        if (Auth::check()){
            return redirect()->route('dashboard');
        } else{
            return view('backend.user.login');
        }
    }
    public function login()
    {
        if (Auth::check()){
            return redirect()->route('dashboard');
        } else{
            return view('backend.user.login');
        }
    }
    public function login_process(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'email'  => 'required | email',
                'password'  => 'required',
            ], [
                'email.required' => 'Email is required.',
                'email.email' => 'Email is not valid.',
                'password.required' => 'Password is required.',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator);
            }

            $column = "email";
            $value = $request->email;
            $check_user_status = $this->user->find_single_data($column, $value);

            if ($check_user_status){
                if ($check_user_status->status == 1){
                    $credentials = $request->only('email', 'password');
                    if (Auth::attempt($credentials)) {
                        toastr()->success('Login Successfully');
                        return redirect()->intended('dashboard');
                    }
                    toastr()->error('Wrong Credentials. Please Try Again');
                    return redirect("login");
                } else{
                    toastr()->error('Please contact with Admin.');
                    return redirect("login");
                }
            } else{
                toastr()->error('Something went wrong.');
                return redirect("login");
            }


        } catch (\Exception $exception){
            return back()->withErrors($exception->getMessage());
        }
    }

    public function logout()
    {
        Auth::logout();
        toastr()->success('Logout Successfully. Thanks');
        return redirect()->route('admin');
    }
}
