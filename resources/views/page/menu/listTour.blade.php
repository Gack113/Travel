@extends('layout')
@section('content')
<!-- Start destinations Area -->
<section class="destinations-area section-gap">
    <div class="container">             
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-40 col-lg-8">
                <div class="title text-center">
                    <h1 class="mb-10">{{ __('index.listTour') }}</h1>
                </div>
            </div>
        </div>						
        <div class="row">
            @foreach($tours as $tour)
            <div class="col-lg-4" onclick="">
                <div class="single-destinations">
                    <div class="thumb">
                        <a href="{{route('show',$tour->slug)}}"><img src="{{$tour->thumbnail}}" alt=""></a>
                    </div>
                    <div class="details">
                        <h4 class="d-flex justify-content-between">
                        <a href="{{route('show',$tour->slug)}}"><span>{{$tour->name}}</span></a>                            	                               
                        </h4>                            
                        <ul class="package-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>{{ __('index.hotel') }}</span>
                            <span>{{$tour->hotel}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>{{ __('index.tranportation') }}</span>
                            <span>{{$tour->transportation}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>{{ __('index.time') }}</span>
                                <span>{{$tour->duration}}</span>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>{{ __('index.booked') }}</span>
                                <span>{{count($tour->bookings)}}</span>
                            </li>                              								
                            <li class="d-flex justify-content-between align-items-center">
                                <span>{{ __('index.fare') }}</span>
                            <a href="#" class="price-btn">{{$tour->fare}} vnd</a>
                            </li>													
                        </ul>
                    </div>
                </div>
            </div>
            <br> <hr>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                        <div class="clearfix">
                                {{$tours->links('page.menu.customPagination')}}
                        </div>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>	
</section>
<!-- End destinations Area -->
@endsection