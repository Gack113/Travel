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
                <h4 class="card-title ">Services Management</h4>
                <p class="card-category">{{count($services)}} services available</p>
                <ul class="nav nav-tabs" data-tabs="tabs">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('services.create')}}">
                            <i class="material-icons">playlist_add</i> New
                            <div class="ripple-container"></div>
                        </a>
                    </li>
                </ul>
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
                                body
                            </th>
                            <th>
                                Actions
                            </th>
                        </thead>
                        <tbody>
                            @foreach($services as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{str_limit($item->content, 100, '...')}}
                                    </td>
                                    <td class="td-actions text-right">
                                        <form action="{{route('services.destroy', $item)}}" method="POST">
                                            <a href="{{route('services.show', $item)}}">
                                                <button type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Show Task">
                                                    <i class="material-icons">visibility</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </a>
                                            <a href="{{route('services.edit', $item)}}">
                                                <button type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </a>
                                            @csrf
                                            {{ method_field('DELETE')}}
                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-link btn-sm" data-original-title="Delete Task">
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