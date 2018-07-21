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
            <div class="col-lg-12 banner-right">                        
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
                        @if ($errors->any())
                        <div class="alert alert-warning text-center">
                            @foreach($errors->all() as $error)
                                {{$error}} |
                            @endforeach
                        </div>
                        @endif
                        @if (session('success'))
                            <div class="alert alert-success">
                                <span>
                                    {{session('success')}}
                                </span> 
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                <span>
                                    {{session('error')}}
                                </span> 
                            </div>
                        @endif
                        <form class="form-wrap" action="{{route('postBook', $tour->slug)}}" method="POST">
                            @csrf
                            <input type="text" class="form-control" name="name" placeholder="{{ __('index.fullname') }}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Họ tên'">									
                            <input type="text" class="form-control" name="phone" placeholder="{{ __('index.numberPhone') }} " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số điện thoại'">
                            <input type="email" class="form-control date-picker hasDatepicker" name="email" placeholder="{{ __('index.email') }} " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'">
                            <input type="number" class="form-control date-picker hasDatepicker" name="amount" placeholder="{{ __('index.numberOfPeople') }} " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Số người'">							
                            <input type="submit" class="primary-btn text-uppercase" value="{{ __('index.book') }}r">									
                        </form>						  	
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 sidebar-widgets">
            <div class="widget-wrap">
            <div class="single-sidebar-widget post-category-widget">
                    <h4 class="category-title">{{ __('index.tourInformation') }}</h4>
                    <ul class="cat-list">
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>{{ __('index.booked') }} <span class="fa fa-check-square-o"></span></p>
                                <p>{{count($tour->bookings)}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>{{ __('index.fare') }} <span class="fa fa-money"></span></p>
                                <p>{{$tour->fare}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>{{ __('index.time') }} <span class="fa fa-calendar"></span></p>
                                <p>{{$tour->duration}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>{{ __('index.transportation') }} <span class="fa fa-car"></span></p>
                                <p>{{$tour->transportation}}</p>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="d-flex justify-content-between">
                                <p>{{ __('index.hotel') }} <span class="fa fa-institution"></span></p>
                                <p>{{$tour->hotel}}</p>
                            </a>
                        </li>
                    </ul>
                </div>                      
            </div>
        </div>
    </div>
</div>
@endsection