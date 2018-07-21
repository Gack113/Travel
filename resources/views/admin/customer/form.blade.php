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
                <form method="POST" action="{{!empty($customer)?route('customers.update',$customer):route('customers.store')}}"  id="myForm">
                    @csrf
                    @if(!empty($customer))
                        {{ method_field('PUT')}}
                    @endif
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tiêu đề</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input type="text" class="form-control" name="email">
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

@section('js')
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>

<script>
    @if (!empty($customer))
        objectForm({!! $customer !!})
    @endif

</script>
@endsection