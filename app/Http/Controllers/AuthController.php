<?php

namespace App\Http\Controllers;

use session;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function LoadRegister(): View|RedirectResponse
    {
        if(Auth::user())
        {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('register');
    }

    public function Register(RegisterRequest $request): RedirectResponse
    {
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'confirm_password' => $request->confirm_password,
            ]);
        return redirect('login');
    }

    public function LoadLogin(): View|RedirectResponse
    {
        if(Auth::user()){
            $route = $this->redirectDash();
            return redirect($route);
        }
        return view('login');
    }
    public function Login(LoginRequest $request)
    {
        $credential = $request->only('email','password');
        if(Auth::attempt($credential))
        {
            $route = $this->redirectDash();
            return redirect($route);
        }else
        {

        }

    }

    public function userDash(): View
    {
        return view();
    }

    public function redirectDash()
    {
        $redirect = '';
        if(Auth::user() && Auth::user()->role == 1)
        {
            $redirect = '/admin/dashboard';

        } // if more User Roles i created example user, Super Admin , employee
        else
        {
            $redirect = '/user/welcome';
        }
        return $redirect;
    }
    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return redirect('/');
    }
}
