<?php

namespace App\Http\Controllers;

use App\Tour;
use App\TourDetail;
use App\Booking;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PageController extends Controller
{
    /**
     * 
     */
    public function index() {
        $outstandingTour = DB::select('SELECT tours.id, tours.name, tours.slug, tours.thumbnail, tours.hotel, tours.transportation, tours.duration, tours.fare, tours.schedule, tours.discount, tours.description, count(bookings.tour_id) as booked
                                        from tours left join bookings
                                        on tours.id = bookings.tour_id and tours.is_active = 1
                                        group by tours.id, tours.name, tours.slug, tours.thumbnail, tours.hotel, tours.transportation, tours.duration, tours.fare, tours.schedule, tours.discount, tours.description
                                        order by booked desc
                                        limit 12');

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

            $relateTours = Tour::where('is_active', 1)
                            ->where('duration', $tour['duration'])
                            ->take(5)
                            ->get();

            return view('page/menu/tourDetail', ['tour' => $tour, 'discount_tour' => $discountTours, 'relate_tour' => $relateTours]);
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

    public function postBook(Request $request, $slug){

        $validatedData = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required'            ],
            [
                'name.required' => 'Vui lòng nhập tên',
                'phone.required' => 'vui lòng nhập số điện thoại'
            ]
        );

        $tour = Tour::where('slug', $slug)->first();

        try {
                DB::transaction( function() use ($tour) {
                $customer = new Customer;
                $customer->name = \Request::get('name');
                $customer->phone = \Request::get('phone');
                $customer->email = \Request::get('email');
                $customer->save();

                $booking = new Booking;
                $booking->tour_id = $tour->id;
                $booking->customer_id = $customer->id;
                $booking->amount = \Request::get('amount');
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
