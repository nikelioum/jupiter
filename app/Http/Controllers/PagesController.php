<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Index page
    public function index(){
        return view ('front.index');
    }

    //Promoter Dashboard
    public function promoter_dashboard(){

        return view('front.dashboard');
    }
}
