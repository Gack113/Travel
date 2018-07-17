<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Tour;
use App\TourDetail;

class TourController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        $tours = Tour::all();
        return view('admin.tour.index', compact('tours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cname = 'Tour';
        $fname = 'New';
        return view('admin.tour.new', compact('cname','fname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = Request::validate(
            [
                'name' => 'required',
                'thumbnail' => 'required',
                'hotel' => 'required',
                'transportation' => 'required',
                'duration' => 'required',
                'fare' => 'required|numeric',
                'schedule' => 'required',
                'content' => 'required'
            ],
            [
                'name.required' => 'Tiêu đề không được trống',
                'thumbnail.required' => 'Vui lòng chọn ảnh',
                'hotel' => 'Vui lòng nhập thông tin khách sạn',
                'transportation.required' => 'Vui lòng nhập phương tiện di chuyển',
                'duration.required' => 'Vui lòng nhập thời gian tour kéo dài',
                'fare.required' => 'Vui lòng nhập giá',
                'schedule.required' => 'Vui lòng nhập lịch trình',
                'content.required' => 'Vui lòng viết bài'
            ]
        );

        try {
            DB::transaction(function () {
                $tour = new Tour;
                $tour->name = Request::get('name');
                $tour->thumbnail = Request::file('thumbnail');
                $tour->hotel = Request::get('hotel');
                $tour->transportation = Request::get('transportation');
                $tour->duration = Request::get('duration');
                $tour->fare = Request::get('fare');
                $tour->schedule = Request::get('schedule');
                $tour->slug = str_slug(Request::get('name'));
                $tour->is_active = true;
                $tour->save();

                $tourDetail = new TourDetail;
                $tourDetail->tour_id = $tour->id;    
                $tourDetail->content = Request::get('content');    
                $tourDetail->save();

                $image = Request::file('thumbnail');
                $name = time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('/uploads'), $name);

            });
            return redirect()->route('tours.create')->with('success', 'Tour thêm thành công');
        } catch (\Exception $e) {
            dd($e);
            // return redirect()->route('tours.create')->with('error', 'Tour thêm không thành công! Vui lòng thử lại sau.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tour = Tour::find($id);
        $tourDetail = TourDetail::where('tour_id',$id)->first();
        return [$tour, $tourDetail];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
