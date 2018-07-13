<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $outstandingTour = Tour::orderBy('booked', 'DESC')
                                ->take(10)
                                ->get();

        $recentlyTour = Tour::orderBy('created_at', 'DESC')
                            ->take(10)
                            ->get();
        
        $discountTours = Tour::orderBy('created_at', 'DESC')
                            ->take(10)
                            ->get();

        return view("page/index", [
                    "outstanding_tour" => $outstandingTour,
                    "recently_tour" => $recentlyTour,
                    "discount_tour" => $discountTours
                    ]);
    }
    
    public function show(){
        return 1;
    }
}
