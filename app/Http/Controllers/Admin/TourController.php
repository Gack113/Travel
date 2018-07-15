<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tour;

class TourController extends BaseController
{
    public function index(){
        $tours = Tour::all();
        return view('admin.tour.index', compact('tours'));
    }

    public function show(Request $req){
        $tour = Tour::where('id',$req->id)->first();
        return $tour;
    }
}
