<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class CustomerController extends BaseController
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
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
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $cname = 'Customer';
        $fname = 'Edit';
        return view('admin.customer.form', compact('customer', 'cname', 'fname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'phone' => 'required'
            ],
            [
                'name.required' => 'Tên không được trống',
                'phone.required' => 'Số điện thoại không được trống'
            ]
        );

        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        if ($customer->save())
            return redirect()->back()->with('success', 'Customer cập nhật thành công');
        return redirect()->back()->with('error', 'Customer cập nhật không thành công! Vui lòng thử lại sau.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        if ($customer->delete())
            return redirect()->route('customers.index')->with('success', 'Xóa thành công');
        return redirect()->route('customers.index')->with('error', 'Xóa không thành công! Vui lòng thử lại sau.');
    }
}
