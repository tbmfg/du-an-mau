<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view(
            'auth.signin',
            ['categories' => $categories, 'user' => null]
        );
    }

    public function signin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = $request->only('email', 'password');
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return Redirect::back()->withSuccess('Đăng nhập thành công!');
            // return redirect('/')->withSuccess('Đăng nhập thành công!');
        }

        return redirect("signin")->with('message', 'Sai email hoặc mật khẩu!');
    }

    public function signinAPI(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $user = Auth::user();

        return $user;
    }

    public function signup()
    {
        $categories = Category::all();

        return view(
            'auth.signup',
            ['categories' => $categories, 'user' => null]
        );
    }


    public function signupSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'min:6|required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required|min:6',
        ]);

        $data = $request->all();
        $data['role'] = 'guest';
        $this->create($data);
        return redirect("/signin")->withSuccess('Tạo tài khoản thành công!');
    }

    public function changePassword()
    {
        $categories = Category::all();
        $user = Auth::user();

        return view(
            'auth.changePassword',
            ['categories' => $categories, 'user' => $user]
        );
    }

    public function signupAPI(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        // return $data;
        $res = $this->create($data);

        return $res;
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
        return Redirect::back()->withSuccess('Đăng xuất thành công!');
        // return Redirect('')->withSuccess('Đăng xuất thành công!');
    }
}
