<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Village;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
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

            return redirect()->intended('dashboard')->with('welcome', 'Selamat Datang '. Auth::user()->name. ' Jangan Lupa Bahagia  !!!');
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
        $users = User::get();

        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role']
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

        // return view('pages.user.index', [
        //     'users' => $users
        // ]);
        return redirect()->route('user.index');


    }

    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/');
    }

    public function edit($id)
    {
        $users = User::findOrFail($id);
        
        return view('pages.user.create', ['users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        // dd($request->password);
        if($request->password){
            // $request->validate([
            //     'name'=> 'required|min:5|max:25',
            //     'email'=> 'required|min:5|max:25|email:rfc,dns|unique:users,email,'.$id,
            //     // 'current_password' => 'required',
            //     'password' =>'required|min:5|confirmed',
            //     // 'image'
            // ]);
    
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
    
            }else{
                // $request->validate([
                //     'name'=> 'required|min:5|max:25',
                //     'email'=> 'required|min:5|max:25|email:rfc,dns|unique:users,email,'. $id,
                //     // 'image' => 'required'
                // ]);
            }

        if ($request->password) {
            $data->update($request->all());
        }else{
            $data->update($request->except('password'));
        }
        
        return redirect()->route('user.index');

    }

    public function delete($id)
    {
        $data  = User::find($id);

        $data->delete();
        return back();
    }
}
