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

    public function show($id){
        $tour = Tour::find($id);
        return $tour;
    }

    public function store(Request $req){
        return 'create';
    }

    public function update(Request $req, Tour $tour){
        return 'update';
    }

    public function destroy(Tour $tour){
        return 'delete';
    }
}
