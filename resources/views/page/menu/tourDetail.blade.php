@extends('layout')
@section('content')
<style>
    .block-title {
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        line-height: 1;
        margin-top: 0;
        margin-bottom: 26px;
        border-bottom: 2px solid #e29c04;
    }

        .block-title a, .block-title span, .block-title label {
            line-height: 17px;
            display: inline-block;
            padding: 7px 12px 4px 12px;
            background-color: #e29c04;
            color: #fff;
        }
</style>
<div class="container" style="padding-top:50px">
    <div class="row">
        <div class="col-lg-8 posts-list">
            {{-- <div>
                <div class="td-block-title-wrap">
                    <h4 class="block-title" style="background-color: white;"><span style="margin-right: 0px;">{{$tour->name}}</span></h4>
                </div>
            </div> --}}
            <div class="title text-center">
                <h1 class="mb-10">{{$tour->name}}</h1>              
            </div>
            <div class="row" style="padding: 20px;">
                <div style="margin-bottom:10px">
                    <img class="img-fluid" src="{{$tour->thumbnail}}" alt="" style="width:100;">
                </div>
                <div>
                    {!!$tour->tour_detail->content!!}
                </div>
            </div>
            <div>
                <div class="td-block-title-wrap">
                    <h4 class="block-title" style="background-color: white;"><span style="margin-right: 0px;">Tour liên quan</span></h4>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-sm-30 typo-sec">
                    <div class="" style="padding-bottom: 10px;">
                        <ul class="unordered-list">
                            <li>Fta Keys</li>
                            <li>For Women Only Your Computer Usage</li>                           
                            <li>Dealing With Technical Support 10 Useful Tips</li>
                            <li>Make Myspace Your Best Designed Space</li>
                            <li>Cleaning And Organizing Your Computer</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 sidebar-widgets">
            <div class="widget-wrap">
                <div class="single-sidebar-widget post-category-widget" style="border-bottom:none!important">
                    <h4 class="category-title">Thông tin tour</h4>
                    <ul class="cat-list">
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>Lượt book <span class="fa fa-check-square-o"></span></p>
                                <p>{{$tour->booked}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>Giá tour <span class="fa fa-money"></span></p>
                                <p>{{$tour->fare}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>Thời gian <span class="fa fa-calendar"></span></p>
                                <p>{{$tour->duration}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>Phương tiện <span class="fa fa-car"></span></p>
                                <p>{{$tour->transportation}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>Khách sạn <span class="fa fa-institution"></span></p>
                                <p>{{$tour->hotel}}</p>
                            </a>
                        </li>
                        <div class="text-center" style="padding-top:20px">
                            <a href="{{route('book',$tour->slug)}}" class="genric-btn success circle">Đặt tour</a>
                        </li>
                    </ul>
                </div>
                
                <div class="widget-wrap">
                    <div class="single-sidebar-widget popular-post-widget" style="border-bottom:none!important">
                        <h4 class="popular-title" style="margin-bottom: 30px;">Popular Posts</h4>
                        @foreach($discount_tour as $dc)
                        <div class="single-post-list d-flex flex-row align-items-center">
                            <div class="thumb">
                                <img class="img-fluid" src="{{$dc->thumbnail}}" alt="" style="width:81px;height:48px">
                            </div>
                            <div class="details">
                                <a href="blog-single.html"><h6>{{$dc->name}}</h6></a>
                                <p>{{$dc->fare}} vnd OFF <span style="color:red;font-family: fantasy;">{{$dc->discount}} %</span></p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection