<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('admin:2');
    }

    public function index(){
        return view('admin.dashboard.home');
    }
}
