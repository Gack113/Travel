<div>
    <div class="td-block-title-wrap">
        <h4 class="block-title" style="background-color: white;"><span style="margin-right: 0px;">Tour nổi bật</span></h4>
    </div>
</div>
<div class="row">
    @foreach($recently_tour as $rcl)
    <div class="col-lg-4" style="margin-bottom:10px">
        <div class="single-destination relative">
            <div class="thumb relative">
                <div class="overlay overlay-bg"></div>
                <img class="img-fluid" src="{{$rcl->thumbnail}}" alt="">
            </div>
            <div class="desc">
                <a href="#" class="price-btn">{{$rcl->fare}} vnd</a>
                <h4>{{$rcl->name}}</h4>
            </div>
        </div>
    </div>
    @endforeach
</div>