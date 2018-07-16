@extends('admin.dashboard')
@section('content')

<style>
    .form-group i:hover{
        cursor: pointer;
    }
</style>

<div class="row">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">{{$cname}}</h4>
                <p class="card-category">{{$fname}}</p>
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('tours.store')}}">
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
                                <img src="https://lorempixel.com/640/480/?42087" width="50" id="prePic">
                                <i class="material-icons" id="selectPic">photo_camera</i>
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
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#selectPic').on('click', () => {
        $('#thumbnail').trigger('click')
    })

    $('#thumbnail').on('change', e => {
        var file = e.target.files[0]
        var fr = new FileReader()
        fr.readAsDataURL(file)
    })
</script>

@endSection