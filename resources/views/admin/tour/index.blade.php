@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
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
            <div class="card-header card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <h4 class="card-title ">Tours Management</h4>
                        <p class="card-category">{{count($tours)}} tours available</p>
                        <ul class="nav nav-tabs" data-tabs="tabs">
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('tours.create')}}">
                                    <i class="material-icons">playlist_add</i> New
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Name
                            </th>
                            <th>
                                Hotel
                            </th>
                            <th>
                                Tranportation
                            </th>
                            <th>
                                Duration
                            </th>
                            <th>
                                Fare
                            </th>
                            <th class="text-right">
                                Actions
                            </th>
                        </thead>
                        <tbody>
                            @foreach($tours as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->hotel}}
                                    </td>
                                    <td>
                                        {{$item->transportation}}
                                    </td>
                                    <td>
                                        {{$item->duration}}
                                    </td>
                                    <td class="text-primary">
                                        ${{$item->fare}}
                                    </td>
                                    <td class="td-actions text-right">
                                        <form action="{{route('tours.destroy', $item)}}" method="POST">
                                            <a href="{{route('tours.show', $item)}}">
                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Show Task">
                                                    <i class="material-icons">visibility</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </a>
                                            <a href="{{route('tours.edit', $item)}}">
                                                <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </a>
                                            @csrf
                                            {{ method_field('DELETE')}}
                                            <button type="submit" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                                <i class="material-icons">close</i>
                                                <div class="ripple-container"></div>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
@endSection