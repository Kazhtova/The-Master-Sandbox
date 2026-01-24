<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    //
    public function register(Request $request){
            $validated = $request->validate([
                'nama' => 'required|string|min:3|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8|confirmed'
            ]);
            $user = User::create($validated);

            Auth::login($user);

            return redirect()->route('siswa.index');
        }

    public function login(Request $request){
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required|min:8'
            ]);
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect('');
            }
            throw ValidationException::withMessages([
                'email' => 'Email Or Password Incorrect'
            ]);
        }

    public function showRegister(){
            return view('auth.register');
        }

    public function Showlogin(){
            return view('auth.login');
        }

    public function logout(Request $request) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('auth.login');
        }
    }



    