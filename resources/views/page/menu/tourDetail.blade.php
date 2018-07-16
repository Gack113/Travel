@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-8 posts-list">
            <div>
                <div class="td-block-title-wrap">
                    <h4 class="block-title" style="background-color: white;"><span style="margin-right: 0px;"></span></h4>
                </div>
            </div>
            <div class="row">
                <div></div>
            </div>
        </div>
        <div class="col-lg-4 sidebar-widgets">
            <div class="single-sidebar-widget post-category-widget">
                <h4 class="category-title">Post Catgories</h4>
                <ul class="cat-list">
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Technology</p>
                            <p>37</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Lifestyle</p>
                            <p>24</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Fashion</p>
                            <p>59</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Art</p>
                            <p>29</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Food</p>
                            <p>15</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Architecture</p>
                            <p>09</p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <p>Adventure</p>
                            <p>44</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- <div>
                <div class="td-block-title-wrap">
                    <h4 class="block-title" style="background-color: white;"><span style="margin-right: 0px;">Tour giảm giá</span></h4>
                </div>
            </div>
            <div class="widget-wrap">
                <div class="single-sidebar-widget popular-post-widget">
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
            </div> -->
        </div>
    </div>
</div>
@endsection