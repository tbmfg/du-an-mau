<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class UserController extends Controller
{
    /**
     * Show a list of all of the application's users.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $users = User::all();
        // return $users;
        return view('admin.users.index', [
            'users' => $users,
            'user' => $user,
            'title' => 'Quản lý tài khoản',
        ]);
    }

    public function create()
    {
        $user = Auth::user();
        return view('admin.users.create', [
            'user' => $user,
            'title' => 'Tạo tài khoản',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'image' => 'required',
            'role' => 'required',
            'password' => 'min:6|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required|min:6',
        ]);
        $data = $request->all();
        // return $data;
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'image' => $data['image'],
            'role' => $data['role'],
            'isActive' => $request['isActive'] == 'on' ? 1 : 0,
            'password' => Hash::make($data['password'])
        ]);

        return redirect('/admin/users')->withSuccess('Đã tạo tài khoản!');
    }

    public function edit($id)
    {
        $user = Auth::user();
        $user = User::find($id);
        return view('admin.users.edit', [
            'user' => $user,
            'user' => $user,
            'title' => 'Sửa tài khoản',
        ]);
    }

    public function update(Request $request, $id)
    {
        if ($request['password'] || $request['confirmPassword']) {
            $request->validate([
                'name' => 'required',
                'image' => 'required',
                'role' => 'required',
                'password' => 'min:6|required_with:confirmPassword|same:confirmPassword',
                'confirmPassword' => 'required|min:6',
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'image' => 'required',
                'role' => 'required',
            ]);
        }

        $data = $request->all();
        $dataUpdate = [
            'name' => $data['name'],
            'image' => $data['image'],
            'role' => $data['role'],
            'isActive' => $request['isActive'] == 'on' ? 1 : 0,
        ];
        if ($data['password']) {
            $dataUpdate['password']  = Hash::make($data['password']);
        }

        User::where('id', $id)->update($dataUpdate);

        return redirect('/admin/users')->withSuccess('Đã sửa tài khoản!');
    }

    public function destroy($id)
    {
        $currentUser = Auth::user($id);
        $user = User::find($id);
        if ($currentUser->id == $user->id) {
            return redirect('/admin/users')->withSuccess('Không thể xóa tài khoản đang đang sử dụng!');
        }
        $user->delete();
        return redirect('/admin/users')->withSuccess('Đã xóa tài khoản!');
    }
}
