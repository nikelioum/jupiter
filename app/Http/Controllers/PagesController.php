<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //Index page
    public function index(){
        return view ('front.index');
    }
}
