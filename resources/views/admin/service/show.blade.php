@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-profile">
            <div class="card-body">
                <h4 class="card-title">{{$service->name}}</h4>
                <br><br>
                <p class="card-description">
                    {!! $service->content !!}
                </p>
                <a href="{{route('services.index')}}" class="btn btn-primary btn-round">Back</a>
            </div>
        </div>
    </div>
</div>
@endSection