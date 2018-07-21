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
                <h4 class="card-title ">Notifications Management</h4>
                <p class="card-category">{{count($notifications)}} notifications available</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                title
                            </th>
                            <th>
                                Date Notify
                            </th>
                            <td>
                                Trạng thái
                            </td>
                            <th class="th-actions text-right">
                                Actions
                            </th>
                        </thead>
                        <tbody>
                            @foreach($notifications as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->title}}
                                    </td>
                                    <td>
                                        {{$item->created_at}}
                                    </td>
                                    <td>
                                        @if($item->state == 0)
                                            Chưa xem
                                        @else
                                            Đã xem
                                        @endif
                                    </td>
                                    <td class="td-actions text-right">
                                        <form action="{{route('notifications.destroy', $item)}}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE')}}
                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-link btn-sm" data-original-title="Delete">
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