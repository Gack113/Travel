<?php

namespace App\Http\Controllers\Admin;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cname = 'Service';
        $fname = 'New';
        return view('admin.service.form', compact('cname', 'fname'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'content' => 'required'
            ],
            [
                'name.required' => 'Tiêu đề không được trống',
                'content.required' => 'Bài viết mô tả không được trống'
            ]
        );
        $service = new Service;
        $service->name = $request->name;
        $service->content = $request->content;

        if ($service->save())
            return redirect()->back()->with('success', 'Service thêm thành công');
        return redirect()->back()->with('error', 'Service thêm không thành công! Vui lòng thử lại sau.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('admin.service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $cname = 'Service';
        $fname = 'Edit';
        return view('admin.service.form', compact('service', 'cname', 'fname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'content' => 'required'
            ],
            [
                'name.required' => 'Tiêu đề không được trống',
                'content.required' => 'Bài viết mô tả không được trống'
            ]
        );

        $service->name = $request->name;
        $service->content = $request->content;

        if ($service->save())
            return redirect()->back()->with('success', 'Service cập nhật thành công');
        return redirect()->back()->with('error', 'Service cập nhật không thành công! Vui lòng thử lại sau.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        if ($service->delete())
            return redirect()->route('services.index')->with('success', 'Xóa thành công');
        return redirect()->route('services.index')->with('error', 'Xóa không thành công! Vui lòng thử lại sau.');
    }
}
