@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
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
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            @foreach($bookings as $item)
                                <tr>
                                    <td>
                                        {{$item->id}}
                                    </td>
                                    <td>
                                        {{$item->tour->name}}
                                    </td>
                                    <td>
                                        {{$item->customer->name}}
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
                                        {{$item->state}}
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit Task">
                                            <i class="material-icons">edit</i>
                                        <div class="ripple-container"></div></button>
                                        <button type="button" rel="tooltip" title="" class="btn btn-danger btn-link btn-sm" data-original-title="Remove">
                                            <i class="material-icons">close</i>
                                        <div class="ripple-container"></div></button>
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