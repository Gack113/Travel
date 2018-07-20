@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card card-profile">
            <div class="card-avatar">
                <img class="img" src="{{$tour->thumbnail}}">
            </div>
            <div class="card-body">
                <h4 class="card-title">{{$tour->name}}</h4>
                <h6 class="card-category text-gray">{{$tour->description}}</h6>

                <hr>
                <p class="card-description">
                    {!! $tour->tour_detail->content !!}
                </p>
                <a href="{{route('tours.index')}}" class="btn btn-primary btn-round">Back</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
                <div class="card-icon">
                    <i class="material-icons">info_outline</i>
                </div>
                <p class="card-category">Booked</p>
                <h3 class="card-title">{{count($tour->bookings)}}</h3>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i>{{$tour->hotel}}
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i>{{$tour->transportation}}
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i>{{$tour->duration}}
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i>{{$tour->fare}} vnđ
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i>{{$tour->schedule}}
                </div>
            </div>
            <div class="card-footer">
                <div class="stats">
                    <i class="material-icons">local_offer</i> <i class="material-icons">arrow_drop_down</i>{{$tour->discount}} %
                </div>
            </div>
        </div>
    </div>
</div>
@endSection