<div class="col-sm-7">
    <!-- PROFILE -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">
            <i class="fas fa-route"></i>
            Travel Requests
            </h3>

            <div class="card-tools">
                  <a href="{{ base_url() }}citizen/travel/create" class="btn btn-sm bg-gradient-primary"><i class="fas fa-plus"></i> Request Travel</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($travels as $i => $travel)

                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ nice_date($travel->created_at, 'F d, Y h:i A') }}</td>
                        <td><span class="badge badge-warning">PENDING</span></td>
                        <td>
                            <a href="{{ base_url() }}citizen/travel/{{ $travel->request_id }}/show" class="btn btn-xs bg-gradient-primary"><i class="far fa-eye"></i> View</a>
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