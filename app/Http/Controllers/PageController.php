<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $outstandingTour = Tour::take(10)->get();
        return View('page.index')->with('outstandingTour',$outstandingTour);
    }
    
    public function show(){
        return 1;
    }
}
