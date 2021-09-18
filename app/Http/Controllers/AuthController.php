<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Hash;
// use Session;
use App\Models\User;
use Illuminate\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index()
    {
        return view('auth.signin');
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only('email', 'password');
        // return User::create([
        //     'name' => "admin",
        //     'email' => $data['email'],
        //     'password' => Hash::make($data['password'])
        // ]);
        $credentials = $request->only('email', 'password');
        // return redirect('/')->withSuccess('Signed in');
        // dd($credentials);
        if (Auth::attempt($credentials)) {
            // dd($credentials);
            return redirect('/')->withSuccess('Signed in');
            return redirect('homepage')->intended('homepage')
                ->withSuccess('Signed in');
        }

        return redirect("signin")->with('message', 'Sai email hoặc mật khẩu!');
    }



    public function signup()
    {
        return view('auth.signup');
    }


    public function signupSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        return redirect("/")->withSuccess('You have signed-in');
    }


    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect("signin")->withSuccess('You are not allowed to access');
    }


    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return Redirect('signin');
    }
}
