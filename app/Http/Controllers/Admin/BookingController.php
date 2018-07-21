<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Tour;
use App\Customer;
use Illuminate\Http\Request;

class BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::all();
        return view('admin.booking.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $booking->customer;
        return $booking;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        $cname = 'Booking';
        $fname = 'Edit';
        $tours = Tour::where('is_active',1)->get();
        $customers = Customer::all();
        return view('admin.booking.form', compact('tours', 'customers', 'booking', 'cname', 'fname'));
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
        $validatedData = $request->validate(
            [
                'tour_id' => 'required',
                'customer_id' => 'required',
                'depart_at' => 'required',
                'state' => 'required'
            ],
            [
                'tour_id.required' => 'vui lòng chọn tour được đăt',
                'customer_id.required' => 'Vui lòng chọn khách hàng đặt tour',
                'depart_at.required' => 'Vui lòng chọn ngày đi',
                'state.required' => 'Vui lòng chọn trạng thái booking'
            ]
        );

        $booking->tour_id = $request->tour_id;
        $booking->customer_id = $request->customer_id;
        if ($request->depart_at != null)
            $booking->depart_at = $request->depart_at;
        $booking->state = $request->state;

        if ($booking->save())
            return redirect()->back()->with('success', 'Booking cập nhật thành công');
        return redirect()->back()->with('error', 'Booking cập nhật không thành công! Vui lòng thử lại sau.');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        if ($booking->delete())
            return redirect()->route('bookings.index')->with('success', 'Xóa thành công');
        return redirect()->route('bookings.index')->with('error', 'Xóa không thành công! Vui lòng thử lại sau.');
    }
}
