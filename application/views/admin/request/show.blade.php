@extends('admin.layouts.app')


@section('page-title')
    Request Details
@endsection

@section('content')


<div class="row">
    <div class="col-sm-3">
        <!-- PROFILE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">
                <i class="fas fa-user-circle"></i>
                Traveler Profile
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <img class="profile-user-img img-fluid img-circle" src="{{ base_url() }}uploads/citizens/{{ $request->citizen['image'] }}" alt="" width="150px" height="150px">
                        <h3 class="profile-username text-center mt-1">{{ name_helper($request->citizen, 'FMIL') }}</h3>
                        <p class="text-muted text-center">{{ $request->citizen['email'] }}</p>
                    </div>
                    <div class="col-sm-12 mt-3">

                        <table class="table table-sm">
                        
                            <tr>
                                <td><strong>Nationality:</strong></td>
                                <td>{{ $request->citizen['nationality'] }}</td>
                            </tr>
                            <tr>
                                <td><strong>Sex:</strong></td>
                                <td>{{ $request->citizen['sex'] }}</td>
                            </tr>
                            
                            <tr>
                                <td><strong>Birthday:</strong></td>
                                <td>{{ nice_date($request->citizen['birthday'], 'F d, Y') }} ({{ Carbon\Carbon::parse($request->citizen['birthday'])->age }} y/o)</td>
                            </tr>
                            <tr>
                                <td><strong>Address:</strong></td>
                                <td>{{ $request->citizen['address'] }}</td>
                            </tr>
                            <tr>
                                <td><strong>Contact:</strong></td>
                                <td>{{ $request->citizen['contact'] }}</td>
                            </tr>
                        </table>
        
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <div class="col-sm-7">
        <div class="card p-3">
            <input type="hidden" id="did" value="{{ $request->request_id }}">
            <input type="hidden" id="did2" value="{{ nice_date($request->created_at, 'mdY') }}">
            <dl class="row">
                <dt class="col-sm-5">Type of vehicle (Uri ng sasakyan):</dt>
                <dd class="col-sm-5">{{ $request->vehicle_type }}</dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-5">Plate number (Plaka):</dt>
              <dd class="col-sm-5">{{ $request->plate_no }}</dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-5">Purpose of travel (Dahilan ng pagbyahe):</dt>
              <dd class="col-sm-5">
                  <?php 

                    $purpose = json_decode($request->purpose);


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
              <dd class="col-sm-5">{{ $request->destination }}</dd>
            </dl>

            <dl class="row">
              <dt class="col-sm-5">Port of origin of this journey (Lugar na pinanggalingan):</dt>
              <dd class="col-sm-5">{{ $request->port_of_origin }}</dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-5">Details of cities/countries visited within the 14 days (Mga lugar na binisita sa loob ng 14 na araw):</dt>
                <dd class="col-sm-5">{{ $request->details_of_city_from }}</dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-5">Contact person in Aurora (Taong Kaugnayan sa Aurora):</dt>
                <dd class="col-sm-5">{{ $request->contact_person }} ({{ $request->contact_person_no }})</dd>
            </dl>

            <dl class="row">
                <dt class="col-sm-5">Illness or symptoms suffered at present or last 14 days (Mga nararamdaman sa kasalukuyan o sa loob ng 14 na araw):</dt>
                <dd class="col-sm-5">
                    {{ implode(', ', json_decode($request->symptoms)) }}
                </dd>
            </dl>

        </div>
    </div>
    <div class="col-sm-2">
        <div class="card p-3">
            <h3>QR Details</h3>
            <hr>
          <div id="qr-div" class="text-center"></div>

          <hr>

          <dl>

            <dt>Status</dt>
            <dd>{{ citizen_travel_status_helper($request->status) }}</dd>
            
            <dt>Remarks</dt>
            <dd>{{ $request->remarks }}</dd>
           
          </dl>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-8">
        <div class="card p-3">
            <div class="card-header">
                <h3 class="card-title">
                  Attachments
                </h3>
               
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
                    @foreach($request->attachments as $i => $attachment)
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
    <div class="col-sm-4">
        <div class="card p-3">
            <h3>Action</h3>
            <hr>
            <form method="POST" action="{{ current_url() }}">
                <div class="form-group">
                    <label for="">Action</label>
                    <select name="action" required id="" class="form-control">
                        <option value="1">Pending</option>
                        <option value="2">APPROVED</option>
                        <option value="3">DISAPPROVED</option>
                        <option value="4">RETURNED</option>
                        <option value="5">QUARANTINE</option>
                        <option value="6">FINISHED</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Remarks</label>
                    <input type="text" name="remarks" required class="form-control">
                </div>

                <button class="btn bg-gradient-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

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