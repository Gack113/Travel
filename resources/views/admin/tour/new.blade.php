@extends('admin.dashboard')
@section('content')

<style>

    .form-group #selectPic{
        position: absolute;
        bottom: 6px;
    }

    .form-group #selectPic:hover{
        cursor: pointer;
    }
</style>

<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{$cname}}</h4>
                <p class="card-category">{{$fname}}</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('tours.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label class="bmd-label-floating">Tiêu đề</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Khách sạn</label>
                                <input type="text" class="form-control" name="hotel">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Phương tiện di chuyển</label>
                                <input type="text" class="form-control" name="transportation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="bmd-label-floating">Kéo dài</label>
                                <input type="text" class="form-control" name="duration">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="bmd-label-floating">Lịch trình</label>
                                <input type="text" class="form-control" name="schedule">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Giá</label>
                                <input type="text" class="form-control" name="fare">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="bmd-label-floating">Khuyến mãi (%)</label>
                                <input type="text" class="form-control" name="discount">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="img/default.png" width="100" id="prePic">
                                <i class="material-icons" id="selectPic">photo_camera</i>
                                <label class="">Chọn hình ảnh</label>
                                <input type="file" class="form-control" accept="image/*" id="thumbnail" name="thumbnail" hidden>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Thông tin khác</label>
                                    <textarea class="form-control" rows="2" name="description"></textarea>
                                </div>
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
    $('#selectPic').on('click', () => {
        $('#thumbnail').trigger('click')
    })

    $('#thumbnail').on('change', e => {
        if (e.target.files && e.target.files[0]) {
            var fr = new FileReader()
            fr.onload = function (e) {
                $('#prePic').prop('src', e.target.result)
            }
            fr.readAsDataURL(e.target.files[0])
        }
    })

    $('.editor').on('click', () => $('.editor').ckeditor({
        language:'en-gb',
        filebrowserBrowseUrl : '{{url("vendor/unisharp/laravel-ckeditor")}}/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '{{url("vendor/unisharp/laravel-ckeditor")}}/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '{{url("vendor/unisharp/laravel-ckeditor")}}/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    }))

</script>
@endsection