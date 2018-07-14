<section class="recent-blog-area section-gap">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-60 col-lg-9">
                <div class="title text-center">
                    <h1 class="mb-10">Tour nổi bật</h1>
                    <p>Những tour được quan tâm nhất,và thịnh hành nhất hiện nay</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="active-recent-blog-carusel">
                @foreach($outstanding_tour as $otd)
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{$otd->thumbnail}}" alt="">
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
                            <a href="#"><h4 class="title">{{$otd->name}}</h4></a>
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