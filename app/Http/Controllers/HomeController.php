<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function authorization(){
        return view('authorization');
    }

    public function registration(){
        return view('registration');
    }

    public function user_create(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'max:50', 'email', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'max:60', 'confirmed', 'regex:/^[0-9a-zA-Z\.\,\?\!\~\@\&\*\;\:]+$/']
        ], [
            'required' => 'Это поле обязательно должно быть заполнено',
            'password.confirmed' => 'Пароли не совпадают',
            'email.email' => 'Это поле принимает только название электронной почты',
            'email.unique' => 'Эта почта уже занята',
            'email.max' => 'Поле электронной почты не может быть больше 50 символов',
            'password.max' => 'Поле пароля не может быть больше 60 символов',
            'password.min' => 'Поле пароля не может быть меньше 8 символов',
            'regex' => 'В пароле допустимо: латинские буквы, числа и символы (.,?!:;~@&*)'
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect()->route('index');
    }

    public function login(Request $request){
        $valid = $request->validate([
            'email' => ['required', 'string','email', 'unique:users,email'],
            'password' => ['required', 'string']
        ], [
            'required' => 'Это поле обязательно должно быть заполнено',
            'email.email' => 'Это поле принимает только название электронной почты',
        ]);

        if(Auth::attempt($valid)){
            $request->session()->regenerate();

           switch(Auth::user()->role){
    case 'user':
        return redirect()->route('index');

    case 'admin':
        return redirect()->route('admin.categories');
}

        }

        return back()->withErrors([
            'email' => 'Неверный логин или пароль',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }
}
