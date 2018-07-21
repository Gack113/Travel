@extends('admin.dashboard')
@section('content')

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{$cname}}</h4>
                <p class="card-category">{{$fname}}</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('bookings.update',$booking)}}" id="myForm">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tour</label>
                                <select name="tour_id" class="form-control">
                                    @foreach($tours as $item)
                                        @if($item->id == $booking->tour_id)
                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Khách hàng</label>
                                <select name="customer_id" class="form-control">
                                    @foreach($customers as $item)
                                        @if($item->id == $booking->customer_id)
                                            <option value="{{$item->id}}" selected>{{$item->name}}</option>
                                        @else
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label">Ngày đi({{$booking->depart_at}})</label>
                                <br>
                                <input type="datetime-local" class="form-control" name="depart_at" >
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Trạng thái</label>
                                <select name="state" class="form-control">
                                   <option value="1">Đang đợi ngày đi</option>
                                   <option value="2">Đang trong quá trình</option>
                                   <option value="3">Đã xong tour</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Notification</h4>
            </div>
            <div class="card-body">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="material-icons">close</i>
                        </button>
                        <span>
                            {{ $error }}
                        </span> 
                    </div>
                @endforeach
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                        {{session('success')}}
                    </span> 
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                        {{session('error')}}
                    </span> 
                </div>
            @endif

            </div>
        </div>
    </div>
</div>
@endSection