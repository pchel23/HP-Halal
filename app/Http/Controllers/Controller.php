<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index(){
        if (!Auth::check()) {
            return view('index');
        }
        switch(Auth::user()->role){
            case 'user':
                return view('index');
                    
            case 'admin':
                return redirect()->route('category');
        }
    }

    public function profile(){
        return view('user.profile');
    }

}
