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
                <h4 class="card-title ">Bookings Management</h4>
                <p class="card-category">{{count($bookings)}} bookings available</p>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover" id="myTable">
                        <thead class=" text-primary">
                            <th>
                                ID
                            </th>
                            <th>
                                Tour
                            </th>
                            <th>
                                Customer
                            </th>
                            <th>
                                Amount
                            </th>
                            <th>
                                Note
                            </th>
                            <th>
                                Start day
                            </th>
                            <th>
                                State
                            </th>
                            <th>
                                Actions
                            </th>
                        </thead>
                        <tbody>
                            @foreach($bookings as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        <a href="{{route('tours.show', $item->tour)}}">
                                            <button rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" >
                                                {{$item->tour->name}}
                                                <div class="ripple-container"></div>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('customers.edit', $item->customer)}}">
                                            <button rel="tooltip" title="" class="btn btn-primary btn-link btn-sm">
                                                {{$item->customer->name}}
                                                <div class="ripple-container"></div>
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        {{$item->amount}}
                                    </td>
                                    <td>
                                        {{str_limit($item->note, 50, '...')}}
                                    </td>
                                    <td>
                                        {{$item->depart_at}}
                                    </td>
                                    <td>
                                        @if($item->state == 1)
                                            Đang đợi ngày đi
                                        @elseif($item->state == 2)
                                            Đang trong quá trình
                                        @else
                                            Đã kết thúc tour
                                    </td>
                                    <td class="td-actions text-right">
                                        <form action="{{route('bookings.destroy', $item)}}" method="POST">
                                            <a href="{{route('bookings.edit', $item)}}">
                                                <button type="button" rel="tooltip" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </button>
                                            </a>
                                            @csrf
                                            {{ method_field('DELETE')}}
                                            <button type="submit" rel="tooltip" class="btn btn-danger btn-link btn-sm">
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