<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function dashboard()
    {
        return view('pages.dashboard');
    }

    public function index()
    {
        $users = User::get();
        
        return view('pages.user.index', [
            'users' => $users
        ]);
    }

    public function login()
    {
        return view('pages.login');
    }

    public function authenticate(Request $request)
    {
        //hanya mengambil request->
        $credentials = $request->only(['email','password']);

        // true akan login selamanya walaupun komputer sudah mati
        // if (Auth::attempt($credentials, true)) {
        if (Auth::attempt($credentials)) {
            //lebih aman pake ini dari serangan hacker
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }

        return back()->with([
            'error' => 'gagal login'
        ]);
    }

    public function create( )
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required',
        //     // 'password' => 'required|min:8',
        //     'password' => Hash::make($data['password']),
        //     'role' => 'required'
        // ]);

        // // $password = Hash::make($request->password);

        // // dd($password);

        // // $request->merge([
        // //     'password' => $password
        // // ]);

        // User::create($data);

        return view('pages.user.index');

    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }
}
