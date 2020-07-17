@extends('citizen.layouts.app')


@section('page-title')
    
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 offset-md-3">
      <div id="div-form" class="card py-3 px-5">
          <h3>Passenger Locator Form</h3>
          <hr>
          <form id="pl-form" action="#" method="POST">
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Vehicle Type (Uri ng Sasakyan)</label>
                          <input type="text" name="vehicle-type" required class="form-control">
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Plate Number (Plaka)</label>
                          <input type="text" name="plate-number" required class="form-control">
                      </div>
                  </div>
              </div>

              <div class="row">
                  <div class="col-md-5">
                      <div class="form-group clearfix">
                        <label for="">Purpose of Travel</label>
                        <br>

                       <fieldset id="purposeCheck">
                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxVacation" name="purpose[]" value="vacation"> 
                                <label for="checkboxVacation">Vacation</label>
                            </div>

                            <br>

                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxBusiness" name="purpose[]" value="business">
                                <label for="checkboxBusiness">Business</label>
                            </div>

                            <br>

                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxHometown" name="purpose[]" value="hometown">
                                <label for="checkboxHometown">Hometown</label>
                            </div>

                            <br>

                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxOccation" name="purpose[]" value="occation">
                                <label for="checkboxOccation">Occation</label>
                            </div>

                            <br>

                            <div class="icheck-primary d-inline">
                                <input type="checkbox" id="checkboxOthers" name="purpose[]" value="others">
                                <label for="checkboxOthers">Others</label>
                            </div>
                       </fieldset>

                      </div>
                  </div>
                  <div class="col-md-7">
                      <div class="form-group" id="otherTextarea" style="display: none">
                          <label for="">Please Specify:</label>
                          <textarea name="purpose-other" id="" cols="30" rows="3" class="form-control"></textarea>
                      </div>
                  </div>
              </div>

              <div class="form-group">
                  <label for="">Destination In Aurora (Lugar Na Paglalagian sa Aurora)</label>
                  <input type="text" name="destination" required class="form-control">
              </div>

            <div class="form-group">
                <label for="">Port of Origin of This Journey (Lugar na Pinanggalingan)</label>
                <input type="text" name="port-origin" required class="form-control">
            </div>

            <div class="form-group">
                <label for="">Details of Cities / Countries visited within the last 14 days (Mga lugar na binisita sa loob ng 14 na araw)</label>
                <input type="text" name="details-city-from" required class="form-control">
            </div>

            <label for="">Contact Person In Aurora (Taong Kaugnayan sa Aurora)</label>

              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" name="contact_person" required class="form-control">
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Contact Number</label>
                        <input type="number" name="contact_person_no" required class="form-control">
                    </div>
                  </div>
              </div>

              <div class="row">
                <div class="col-md-12">
                    <div class="form-group clearfix">
                      <label for="">Illness or symptoms suffered at present or last 14 days (Mga nararamdamam sa kasalukuyan o sa loob ng 14 na araw)</label>
                      <br>

                     <fieldset>
                          <div class="icheck-primary d-inline">
                              <input type="checkbox" id="checkboxFever" name="illness[]" value="fever">
                              <label for="checkboxFever">Fever (Lagnat)</label>
                          </div>

                          <br>

                          <div class="icheck-primary d-inline">
                              <input type="checkbox" id="checkboxCough" name="illness[]" value="cough">
                              <label for="checkboxCough">Cough (Ubo)</label>
                          </div>

                          <br>

                          <div class="icheck-primary d-inline">
                              <input type="checkbox" id="checkboxColds" name="illness[]" value="colds">
                              <label for="checkboxColds">Colds (Sipon)</label>
                          </div>

                          <br>

                          <div class="icheck-primary d-inline">
                              <input type="checkbox" id="checkboxSore" name="illness[]" value="sore">
                              <label for="checkboxSore">Sore Throat (Pananakit ng Lalamunan)</label>
                          </div>

                          <br>

                          <div class="icheck-primary d-inline">
                              <input type="checkbox" id="checkboxDifficulty" name="illness[]" value="breathing">
                              <label for="checkboxDifficulty">Difficulty in Breathing (Hirap Sa Paghinga)</label>
                          </div>
                     </fieldset>

                    </div>
                </div>
                
            </div>


              <div class="form-group">
                  <label for="">Date of Expected Arrival in checkpoint (Petsa ng Inaasahang Pagdating sa checkpoint)</label>
                  <input type="date" name="date-expect" required class="form-control">
              </div>

             
              <hr>


              <button type="submit" class="btn btn-block bg-gradient-primary">Submit</button>

          </form>
        </div>
    </div>
</div>
@endsection


@section('css-vendor')
    <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ vendor_url() }}icheck-bootstrap/icheck-bootstrap.min.css">
@endsection
@section('css-custom')
    <style>
        label{
            font-weight: 500 !important;
        }
    </style>
@endsection

@section('js-vendor')
    
@endsection

@section('js-custom')
    <script src="{{ asset_url() }}js/citizen/travel-create.js"></script>
@endsection