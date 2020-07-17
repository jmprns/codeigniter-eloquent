@extends('citizen.layouts.app')


@section('page-title')
    Home Page
@endsection



@section('content')
    <div class="row">
        @include('citizen.profile')
        @include('citizen.travel.list')
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