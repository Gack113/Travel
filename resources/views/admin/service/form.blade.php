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
                <form method="POST" action="{{!empty($service)?route('services.update',$service):route('services.store')}}" id="myForm">
                    @csrf
                    @if(!empty($service))
                        {{ method_field('PUT')}}
                    @endif
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tiêu đề</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nội dung chi tiết</label>
                                    <br><br>
                                    <textarea class="form-control editor" rows="5" name="content"></textarea>
                                </div>
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
    $('.editor').on('click', () => $('.editor').ckeditor({
        language:'en-gb',
        filebrowserBrowseUrl : '{{url("vendor/unisharp/laravel-ckeditor")}}/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '{{url("vendor/unisharp/laravel-ckeditor")}}/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '{{url("vendor/unisharp/laravel-ckeditor")}}/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    }))

    @if (!empty($service))
        objectForm({!! $service !!})
    @endif
</script>
@endsection