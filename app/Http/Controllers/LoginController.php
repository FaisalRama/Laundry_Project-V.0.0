<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

// Mengcakup Register Juga
class LoginController extends Controller
{
    public function index()
    {
        return view('login_and_register.index', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function storeRegister(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:300',
            'username' => 'required|min:3|max:300',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:100',
            'outlet_id' => 'required',
            'role' => 'required'
        ]);

        // ENKRIPSI PASSWORD
        $validatedData['password'] = Hash::make($validatedData['password']);

        // CREATE DATA BARU DI USER
        User::create($validatedData);

        // NOTIFIKASI REGISTRASI BERHASIL
        $request->session()->flash('success', 'Registrasi Berhasil! Silahkan Login!');

        // SETELAH REGISTRASI BERHASL, KEMBALI KE HALAMAN LOGIN
        return redirect('/');
    }

    // public function index2()
    // {
    //     return view('member.index');
    // }

    public function authenticate(Request $request)
    {
        $login =$request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        // dd('Login Berhasil');

        if(Auth::attempt($login))
        {
            $request->session()->regenerate();

            if(Auth::user()->role == 'admin')
            {
                return redirect()->route('a.home');
            }else if(Auth::user()->role == 'kasir'){
               return redirect()->route('k.home'); 
            }else if(Auth::user()->role == 'owner'){
                return redirect()->route('o.home');
            } 

            return redirect()->intended('/home');
        }

        return back()->with('error', 'Login Failed!');
    }

    
    public function logout(Request $request)
    {
        $request->session()->invalidate();

        $request->session()->regenerateToken();
    
        return redirect('/');
    }
}
