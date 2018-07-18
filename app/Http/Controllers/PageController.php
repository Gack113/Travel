<?php

namespace App\Http\Controllers;

use App\Tour;
use App\TourDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        $tours = Tour::where('is_active', 1)->orderBy('created_at', 'DESC')->paginate(6);
        return view('page/menu/listTour',compact('tours'));
    }

    public function book($slug){
        $tour = Tour::where('slug', $slug)->first();   
        return view('page.menu.book', ['tour'=> $tour]);
    }

    public function postBook(Request $request, $tour){

        $validatedData = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required'            ],
            [
                'name.required' => 'Vui lòng nhập tên',
                'phone.required' => 'vui lòng nhập số điện thoại'
            ]
        );

        try {
            DB::transaction(function () {
                $customer = new Customer;
                $customer->name = $request->name;
                $customer->phone = $request->phone;
                $customer->email = $request->email;
                $customer->save();

                $booking = new Booking;
                $booking->tour_id = $tour->id;
                $booking->customer = $customer->id;
                $booking->amount = $request->amount;

                $booking->save();


            });
            return redirect()->back()->with('success', ' Đặt Tour thành công');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Đặt tour không thành công! Vui lòng thử lại sau.');
        }
    }

    /**
     * 
     */
    public function changeLocale(Request $request, $locale) {
        $request->session()->put('locale', $locale);
        return redirect()->back();
    }
}
