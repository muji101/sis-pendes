<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use  RealRashid\SweetAlert\Facades\Alert;

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

            if(Auth::user()->role == 'ADMIN'){
                Alert::success('Selamat Datang '. Auth::user()->name,  'Silahkan cek setting profile village jika belum ada data' );
            }else{
                Alert::success('Selamat Datang '. Auth::user()->name,  'Selamat Bertugas !!!' );
            }
            

            return redirect()->intended('dashboard');
            // ->with('welcome', 'Selamat Datang '. Auth::user()->name. ' Jangan Lupa Bahagia  !!!');
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
            'role' => $data['role']
        ]);

        Alert::success('Selamat', 'Berhasil Membuat Data');

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
            $request->validate([
                'name'=> 'required|max:25',
                'email'=> 'required|min:4|max:25|email:rfc,dns|unique:users,email,'.$id,
                // 'current_password' => 'required',
                'password' =>'required|min:5',
                // 'image'
            ]);
    
            $request->merge([
                'password' => Hash::make($request->password)
            ]);
    
            }else{
                $request->validate([
                    'name'=> 'required|max:25',
                    'email'=> 'required|min:4|max:25|email:rfc,dns|unique:users,email,'. $id,
                    // 'image' => 'required'
                ]);
            }

        if ($request->password) {
            $data->update($request->all());
        }else{
            $data->update($request->except('password'));
        }

        Alert::success('Selamat', 'Berhasil Mengedit Data');
        
        return redirect()->route('user.index');

    }

    public function delete($id)
    {
        $data  = User::find($id);

        $data->delete();
        return back();
    }
}
