<style>
    .midright_content {
    position: relative;
    width: 80%;
    text-align: justify;
}
.item-procol {
    position: relative;
    display: block;
    font-family: Arial;
    width: 100%;
    height: 70px;
    padding-top: 8px;
    padding-bottom: 8px;
    border-top: 1px solid #d6d6d6;
    clear: both;
}.item-procol .Frames {
    position: relative;
    width: 28%;
    height: 100%;
    margin-right: 10px;
    float: left;
    overflow: hidden;
}
.item-procol .Frames img {
    width: 100%;
    min-height: 100%;
    -moz-transition: all 0.3s ease;
    -webkit-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}
.item-procol .pro_time {
    position: absolute;
    bottom: 10px;
    right: 6px;
    font-size: 15px;
    color: #0075d0;
}
.item-procol a {
    font-size: 14px;
    color: #505050;
    font-weight: bold;
    text-decoration: none;
}

.item-procol a:hover {
    color: #006fa2;
}

.item-procol p {
    font-size: 18px;
    padding-top: 10px;
    line-height: 16px;
}
.spct {
    color: #e70000;
}
</style>
<section class="popular-destination-area section-gap">
<div class="td-block-title-wrap">
                <h4 class="block-title" style="background-color: white;"><span style="margin-right: 0px;">Tour mới nhất</span></h4>
            </div>
<div class="mid_right">
    <div class="midright_content">
        @foreach($recently_tour as $rcl)
            <div class="item-procol">
                <div class="Frames">
                    <a href="/tour/du-lich-co-to-3-ngay-2-dem-160.html" title="DU LỊCH CÔ TÔ 3 NGÀY 2 ĐÊM">
                        <img src="{{$rcl->thumbnail}}" alt="DU LỊCH CÔ TÔ 3 NGÀY 2 ĐÊM">
                    </a>
                </div>
                <a href="/tour/du-lich-co-to-3-ngay-2-dem-160.html">
                        {{$rcl->name}}
                </a>
                <p>
                    <span class="spct">{{$rcl->fare}} vnd </span>
                </p>
                <span class="pro_time">
                        {{$rcl->duration}} 
                </span>
            </div>
        @endforeach                      
    </div>
</div>
</section>
