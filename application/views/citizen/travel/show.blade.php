@extends('citizen.layouts.app')


@section('page-title')
    Travel Details
@endsection

@section('content')



    <div class="row">
        <div class="col-sm-4">
            <div class="card p-3">
                <h3>QR Details</h3>
                <hr>
              <div id="qr-div" class="text-center"></div>

              <hr>

              <dl>

                <dt>Status</dt>
                <dd>{{ citizen_travel_status_helper($travel->status) }}</dd>
                
                <dt>Remarks</dt>
                <dd>{{ $travel->remarks }}</dd>
               
              </dl>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card p-3">
                <input type="hidden" id="did" value="{{ $travel->request_id }}">
                <input type="hidden" id="did2" value="{{ nice_date($travel->created_at, 'mdY') }}">
                <dl class="row">
                    <dt class="col-sm-5">Type of vehicle (Uri ng sasakyan):</dt>
                    <dd class="col-sm-5">{{ $travel->vehicle_type }}</dd>
                </dl>

                <dl class="row">
                  <dt class="col-sm-5">Plate number (Plaka):</dt>
                  <dd class="col-sm-5">{{ $travel->plate_no }}</dd>
                </dl>

                <dl class="row">
                  <dt class="col-sm-5">Purpose of travel (Dahilan ng pagbyahe):</dt>
                  <dd class="col-sm-5">
                      <?php 

                        $purpose = json_decode($travel->purpose);


                        if($purpose->type == 'many'){
                            echo implode(', ', $purpose->data);
                        }else{
                            echo $purpose['data'];
                        }

                      ?>
                  </dd>
                </dl>

                <dl class="row">
                  <dt class="col-sm-5">Destination in Aurora (Lugar na paglalagian sa Aurora):</dt>
                  <dd class="col-sm-5">{{ $travel->destination }}</dd>
                </dl>

                <dl class="row">
                  <dt class="col-sm-5">Port of origin of this journey (Lugar na pinanggalingan):</dt>
                  <dd class="col-sm-5">{{ $travel->port_of_origin }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-5">Details of cities/countries visited within the 14 days (Mga lugar na binisita sa loob ng 14 na araw):</dt>
                    <dd class="col-sm-5">{{ $travel->details_of_city_from }}</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-5">Contact person in Aurora (Taong Kaugnayan sa Aurora):</dt>
                    <dd class="col-sm-5">{{ $travel->contact_person }} ({{ $travel->contact_person_no }})</dd>
                </dl>

                <dl class="row">
                    <dt class="col-sm-5">Illness or symptoms suffered at present or last 14 days (Mga nararamdaman sa kasalukuyan o sa loob ng 14 na araw):</dt>
                    <dd class="col-sm-5">
                        {{ implode(', ', json_decode($travel->symptoms)) }}
                    </dd>
                </dl>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card p-3">
                <div class="card-header">
                    <h3 class="card-title">
                      
                      Attachments
                    </h3>
                    <div class="card-tools">
                       <button class="btn btn-sm bg-gradient-primary" data-toggle="modal" data-target="#modal-attachment"> <i class="fas fa-plus"></i> Add Attachments</button>
                    </div>
                  </div>
                  <!-- /.card-header -->

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Attachment Name</th>
                            <th>Attachment Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($travel->attachments as $i => $attachment)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $attachment->name }}</td>
                            <td>{{ nice_date($attachment->created_at,'F d, Y h:i A') }}</td>
                            <td><a href="{{ base_url() }}uploads/attachments/{{ $attachment->url }}" target="_new" class="btn btn-xs bg-gradient-primary"> <i class="far fa-eye"></i> View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-attachment">

        <div id="modal-at" class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Attachment Forms</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

                <form method="POST" action="{{ base_url() }}citizen/attachment/{{ $travel->request_id }}" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="">Attachment Name</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="">Attachment File</label>
                        <input type="file" name="file" class="form-control" accept="application/pdf, image/png, image/jpeg" required>
                    </div>
                </form>

              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button id="form-submit" type="button" class="btn btn-primary">Save</button>
            </div>

          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
@endsection


@section('css-vendor')
    
@endsection
@section('css-custom')
    
@endsection

@section('js-vendor')
<script src="{{ vendor_url() }}jquery-qrcode/jquery-qrcode.min.js" type="text/javascript"></script>
@endsection

@section('js-custom')
<script src="{{ asset_url() }}js/citizen/travel-show.js"></script>
@endsection