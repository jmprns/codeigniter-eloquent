<div class="col-sm-5">
    <!-- PROFILE -->
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">
            <i class="fas fa-user-circle"></i>
            Profile
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ base_url() }}uploads/citizens/{{ $_SESSION['user']['data']['image'] }}" alt="" width="150px" height="150px">
                    <h3 class="profile-username text-center mt-1">{{ name_helper($_SESSION['user']['data'], 'FMIL') }}</h3>
                    <p class="text-muted text-center">{{ $_SESSION['user']['data']['email'] }}</p>
                </div>
                <div class="col-sm-12 mt-3">

                    <table class="table table-sm">
                       
                        <tr>
                            <td><strong>Nationality:</strong></td>
                            <td>{{ $_SESSION['user']['data']['nationality'] }}</td>
                        </tr>
                        <tr>
                            <td><strong>Sex:</strong></td>
                            <td>{{ $_SESSION['user']['data']['sex'] }}</td>
                        </tr>
                        
                        <tr>
                            <td><strong>Birthday:</strong></td>
                            <td>{{ nice_date($_SESSION['user']['data']['birthday'], 'F d, Y') }} ({{ Carbon\Carbon::parse($_SESSION['user']['data']['birthday'])->age }} y/o)</td>
                        </tr>
                        <tr>
                            <td><strong>Address:</strong></td>
                            <td>{{ $_SESSION['user']['data']['address'] }}</td>
                        </tr>
                        <tr>
                            <td><strong>Contact:</strong></td>
                            <td>{{ $_SESSION['user']['data']['contact'] }}</td>
                        </tr>
                    </table>
    
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>