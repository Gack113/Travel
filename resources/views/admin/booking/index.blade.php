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
                                        {{$item->note}}
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