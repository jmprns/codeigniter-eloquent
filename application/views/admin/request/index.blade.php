@extends('admin.layouts.app')


@section('page-title')
    Travel Requests
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12">
        <!-- PROFILE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                
                    {{ $type }}
                </h3>
    
                <div class="card-tools">

                    <div class="form-group">
                        <select class="form-control" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                            <option value="" selected hidden></option>
                            <option value="{{ base_url() }}super/request/all">All</option>
                            <option value="{{ base_url() }}super/request/pending">Pending</option>
                            <option value="{{ base_url() }}super/request/approved">Approved</option>
                            <option value="{{ base_url() }}super/request/disapproved">Disapproved</option>
                            <option value="{{ base_url() }}super/request/quarantine">Quarantine</option>
                            <option value="{{ base_url() }}super/request/finished">Finished</option>
                            
                        </select>
                    </div>
                
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>#</th>
                      <th>Date</th>
                      <th>QR ID</th>
                      <th>Requester</th>
                      <th>Port of Origin</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($requests as $i => $request)

                        <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ nice_date($request->created_at, 'F d, Y h:i A') }}</td>
                        <td>{{ nice_date($request->created_at, 'mdY') }}{{ $request->request_id }}</td>
                        <td>{{ name_helper($request->citizen, 'FMIL') }}</td>
                        <td>{{ $request->port_of_origin }}</td>
                        <td>{{ citizen_travel_status_helper($request->status) }}</td>
                        <td>
                            <a href="{{ base_url() }}super/request/{{ $request->request_id }}/show" class="btn btn-xs bg-gradient-primary"><i class="far fa-eye"></i> View</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
@endsection


@section('css-vendor')
    <!-- DataTables -->
<link rel="stylesheet" href="{{ vendor_url() }}datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ vendor_url() }}datatables-responsive/css/responsive.bootstrap4.min.css">
@endsection
@section('css-custom')
    
@endsection

@section('js-vendor')
<!-- DataTables -->
<script src="{{ vendor_url() }}datatables/jquery.dataTables.min.js"></script>
<script src="{{ vendor_url() }}datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ vendor_url() }}datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ vendor_url() }}datatables-responsive/js/responsive.bootstrap4.min.js"></script>
@endsection

@section('js-custom')
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
    });
  </script>
@endsection