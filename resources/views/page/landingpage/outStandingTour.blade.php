<div class="container" style="margin-top: 12px; margin-bottom: 12px;"> 
    <div>
        <div class="td-block-title-wrap">
            <h4 class="block-title" style="background-color: white;">
                <span style="margin-right: 0px;">{{ __('index.recentlyTour') }}</span>
            </h4>
        </div>
    </div>
    <div class="row">
        <div class="active-recent-blog-carusel">
            @foreach($outstanding_tour as $otd)
                <div class="single-recent-blog-post item">
                    <div class="thumb">
                        <a href="{{route('show',$otd->slug)}}"><img class="img-fluid" src="{{$otd->thumbnail}}" alt=""></a>
                    </div>
                    <div class="details">
                        <a href="{{route('show',$otd->slug)}}"><h4 class="title">{{$otd->name}}</h4></a>
                        <h6 class="date">{{$otd->fare}} vnd</h6>
                    </div>
                </div>
            @endforeach  
        </div>
    </div>
</div>