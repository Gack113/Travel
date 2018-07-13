<div>
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
</div>