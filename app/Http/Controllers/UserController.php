<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {
        return view('user.login');
    }

    public function akun()
    {
        $user = User::all();
        return view('user.akun',['user'=> $user]);
    }

    public function authenticate(Request $request)
    {
        dd('login berhasil');
        $request->validate([
            'username' => 'required|unique:users,email|min:4',
            'password' => 'required|min:4',
        ]);
    }

    public function add_akun()
    {
        return view('user.addUser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_user' => 'required|unique:users,name',
            'username' => 'required|unique:users,email|min:4',
            'password' => 'required|min:4',
        ]);

        $user = new User();
        $user->name = $request->nama_user;
        $user->email = $request->username;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/akun')->with('succes','Data Berhasil di Tambahkan');

    }

}
