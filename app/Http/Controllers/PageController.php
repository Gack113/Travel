<?php

namespace App\Http\Controllers;

use App\Tour;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function redirect() {
        return \Redirect::route('HomeEn');
    }

    public function index(Request $request) {
        $outstandingTour = Tour::where('is_active', 1)
                                ->orderBy('booked', 'DESC')
                                ->take(12)
                                ->get();

        $recentlyTour = Tour::where('is_active', 1)
                            ->orderBy('created_at', 'DESC')
                            ->take(9)
                            ->get();
        
        $discountTours = Tour::where('is_active', 1)
                            ->orderBy('discount', 'DESC')
                            ->take(5)
                            ->get();

        return view("page/landingpage/index", [
                    "outstanding_tour" => $outstandingTour,
                    "recently_tour" => $recentlyTour,
                    "discount_tour" => $discountTours
                    ]);
    }
    
    public function show() {
        return 1;
    }
}
