@extends('admin.dashboard')
@section('content')

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Profile</h4>
                <p class="card-category">Complete your profile</p>
            </div>
            <div class="card-body">
                <form action="{{route('users.update', $user)}}" method="POST">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Name</label>
                                <input type="text" class="form-control" name="name" value="{{$user->name}}" id="name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" id="email">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input type="text" class="form-control" name="password" id="password">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right" id="update" disabled>Update Profile</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
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
    <script>
        $('#password').on('change', () => {
            if($('#password').val().length >= 6 && $('#name').val().length > 0){
                $('#update').prop('disabled', false)
            }
            else
                $('#update').prop('disabled', true)
        })
    </script>
@endSection