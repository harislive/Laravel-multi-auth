<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function LoadRegister(): View
    {
        if(Auth::user())
        {
            $route = $this->redirectDash();
            return view($route);
        }
        return view('register');
    }

    public function Register(RegisterRequest $request): RedirectResponse
    {
        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'confirm_password' => $request->confirm_password,
            ]);
        return redirect('/login');
    }

    public function LoadLogin(): View
    {
        if(Auth::user()){
            $route = $this->redirect();
            return view($route);
        }
        return view('login');
    }
    public function Login(LoginRequest $request): RedirectResponse
    {
        $credential = $request->only('email','password');
        if(Auth::attempt($credential))
        {
            $route = $this->redirectDash();
            return redirect($route);
        }
        return redirect();
    }

    public function userDash(): View
    {
        return view();
    }

    public function redirectDash()
    {
        $redirect = '';
        if(Auth::user() && Auth::user()->Role == 1)
        {
            $redirect = '/admin/dashboard';

        } // if more User Roles i created example user, Super Admin , employee
        else
        {
            $redirect = '/user/dashboard';
        }
        return $redirect;
    }
}
