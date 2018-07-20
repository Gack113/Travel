<section class="recent-blog-area section-gap">
    <div class="container">
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
                            <!-- <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Chi tiết</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div> -->
                            <a href="{{route('show',$otd->slug)}}"><h4 class="title">{{$otd->name}}</h4></a>
                            <!-- <p>
                                Acres of Diamonds… you’ve read the famous story, or at least had it related to you. A farmer.
                            </p> -->
                            <h6 class="date">{{$otd->fare}} vnd</h6>
                        </div>
                    </div>
                @endforeach  
            </div>
        </div>
    </div>
</section>