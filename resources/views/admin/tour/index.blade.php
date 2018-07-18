@extends('admin.dashboard')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title ">Tours Management</h4>
                <p class="card-category">{{count($tours)}} tours available</p>
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
                            <th>
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