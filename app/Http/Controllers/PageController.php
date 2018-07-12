<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return View('page.index');
    }
    
    public function show(){
        return 1;
    }
}
