<?php

namespace App\Http\Controllers;

use App\Tour;
use App\TourDetail;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * 
     */
    public function index() {
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
    
    /**
     * 
     */
    public function show($slug) {
        $tour = Tour::where('slug', $slug)->first();
        
        if ($tour) {
            $discountTours = Tour::where('is_active', 1)
                            ->orderBy('discount', 'DESC')
                            ->take(5)
                            ->get();
            return view('page/menu/tourDetail', ['tour' => $tour, 'discount_tour' => $discountTours]);
        } 
        
        return redirect()->route('home');
    }

    public function listTours() {
        
    }

    /**
     * 
     */
    public function changeLocale(Request $request, $locale) {
        $request->session()->put('locale', $locale);
        return redirect()->back();
    }
}
