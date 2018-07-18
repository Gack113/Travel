<?php

namespace App\Http\Controllers\Admin;

use Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Tour;
use App\TourDetail;

class TourController extends BaseController
{

    public function index(){
        $tours = Tour::all();
        return view('admin.tour.index', compact('tours'));
    }


    public function create()
    {
        $cname = 'Tour';
        $fname = 'New';
        return view('admin.tour.form', compact('cname','fname'));
    }

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
                $tour->thumbnail = Request::file('thumbnail')->getClientOriginalExtension();
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
            return redirect()->route('tours.create')->with('error', 'Tour thêm không thành công! Vui lòng thử lại sau.');
        }

    }

    public function show(Tour $tour)
    {
        $tour->tour_detail;
        return $tour;
    }


    public function edit(Tour $tour)
    {
        $cname = 'Tour';
        $fname = 'Edit';
        $tour->content = $tour->tour_detail->content;
        return view('admin.tour.form', compact('cname','fname','tour'));
    }


    public function update(Request $request, Booking $booking)
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
                $tour->name = Request::get('name');
                $tour->thumbnail = Request::file('thumbnail')->getClientOriginalExtension();
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
            return redirect()->route('tours.create')->with('error', 'Tour thêm không thành công! Vui lòng thử lại sau.');
        }
    }


    public function destroy(Tour $tour)
    {
        if ($tour->delete())
            return redirect()->route('tours')->with('success', 'Xóa thành công');
        return redirect()->route('tours')->with('error', 'Xóa không thành công! Vui lòng thử lại sau.');
    }
}
