<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    ///////////////////////
    public function admin()
    {
        if(Auth::user()->id == 1) {
            return view('admin.index');
        }
        else{
            return redirect('/');
        }
    }
}