@extends('layouts.app')
@section('content')
<style type="text/css">.red{color:red} </style>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">

<div class="container">
  <div class="card">
    <div class="card-header">
        <span class="glyphicon glyphicon-th" data-toggle="modal" data-target="#exampleModalCenter"></span>
      <ul class="nav nav-tabs justify-content-center" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
            <i class="now-ui-icons objects_umbrella-13"></i> All <span class="glyphicon glyphicon-home">
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
              <i class="now-ui-icons shopping_cart-simple"></i> Approve <span class="glyphicon glyphicon-remove">
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#messages" role="tab">
                <i class="now-ui-icons shopping_shop"></i> Approved <span class="glyphicon glyphicon-ok">
                </a>
              </li>

              <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings" role="tab">
                  <i class="now-ui-icons ui-2_settings-90"></i> Settings <span class="glyphicon glyphicon-cog">
                  </a>
                </li>
              </ul>

            </div>
            <div class="card-body">
              <div class="tab-content text-center">
                <div class="tab-pane active" id="home" role="tabpanel">
                 @if (session('status'))
                 <div class="alert alert-success" role="alert">
                  {{ session('status') }}
                </div>
                @endif

                <table class="table table-striped">
                  <thead class="thead-dark">
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Photo</th>
                    <th>Status</th>
                    <th>Action</th>
                  </thead>
                  @if (!empty($barbers))
                  @foreach($barbers as $key=>$val)
                  <tr>
                   <td>{{ $val->id }}</td>
                   <td>{{ $val->name }}</td>
                   <td>{{ $val->phone }}</td>
                   <td>{{ $val->email }}</td>
                   <td>{{ $val->address }}</td>
                   <td>
                    @if ($val->photo != "")
                    <img src="http://localhost/laravel-jwt-auth/public/photo/{{ $val->photo }}" style="width: 20%;height: auto;" class="img-thumbnail">
                    @else
                    <img src="http://localhost/laravel-jwt-auth/public/photo/no_img.png" style="width: 20%;height: 50px;" class="img-thumbnail">
                    @endif

                  </td>
                  <td> @if($val->status == 0) <p style="color:red";>Pending...</p> @else <p style="color:green;">Success</p> @endif</td>
                  <td>

                    <a href="{{ asset('barber_edit') }}/{{ $val->id }}">
                      <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                    </a>/

                    <a href="barber_delete/{{ $val->id}}" onclick="return confirm('Are you sure?')">
                      <span class="glyphicon glyphicon-trash"></span> 
                    </a>/

                    @if($val->status == 0)
                    <a href="{{ asset('barber_disapproved')}}/{{ $val->id }}" style="color:green;";>
                      <span class="glyphicon glyphicon-ok"></span> 
                    </a>
                    @else
                    <a href="{{ asset('barber_approved')}}/{{ $val->id }}" style="color:red;">
                      <span class="glyphicon glyphicon-remove"></span>
                    </a>
                    @endif
                  </td>
                </tr>
                @endforeach
                @else
                <td colspan="8">*No Recored Available Please check*</td>                      
                @endif
              </table>
              {!! $barbers->links() !!}
            </div>

            <div class="tab-pane" id="profile" role="tabpanel">


              <table class="table table-striped">
                <thead>
                  <td scope="col">Sno</td>
                  <td scope="col">Name</td>
                  <td scope="col">Phone</td>
                  <td scope="col">Email</td>
                  <td scope="col">Address</td>
                  <td scope="col">Photo</td>
                  <td scope="col">Status</td>
                  <td scope="col">Action</td>
                </thead>
                @if (!empty($approve))
                @foreach($approve as $key=>$val)
                <tr>
                 <td>{{ $val->id }}</td>
                 <td>{{ $val->name }}</td>
                 <td>{{ $val->phone }}</td>
                 <td>{{ $val->email }}</td>
                 <td>{{ $val->address }}</td>
                 <td>
                  @if ($val->photo != "")
                  <img src="http://localhost/laravel-jwt-auth/public/photo/{{ $val->photo }}" style="width: 20%;height: auto;" class="img-thumbnail">
                  @else
                  <img src="http://localhost/laravel-jwt-auth/public/photo/no_img.png" style="width: 20%;height: 50px;" class="img-thumbnail">
                  @endif

                </td>
                <td> @if($val->status == 0) <p style="color:red";>Pending...</p> @else <p style="color:green;">Success</p> @endif</td>
                <td>

                  <a href="{{ asset('barber_edit') }}/{{ $val->id }}">
                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                  </a>/

                  <a href="barber_delete/{{ $val->id}}" onclick="return confirm('Are you sure?')">
                    <span class="glyphicon glyphicon-trash"></span> 
                  </a>/

                  @if($val->status == 0)
                  <a href="{{ asset('barber_disapproved')}}/{{ $val->id }}" style="color:green;";>
                    <span class="glyphicon glyphicon-ok"></span> 
                  </a>
                  @else
                  <a href="{{ asset('barber_approved')}}/{{ $val->id }}" style="color:red;">
                    <span class="glyphicon glyphicon-remove"></span>
                  </a>
                  @endif
                </td>
              </tr>
              @endforeach
              @else
              <td colspan="8">*No Recored Available Please check*</td>                      
              @endif
            </table>
            {!! $approve->links() !!}
          </div>

          <div class="tab-pane" id="messages" role="tabpanel">
           <table class="table table-striped">
            <thead>
              <td scope="col">Sno</td>
              <td scope="col">Name</td>
              <td scope="col">Phone</td>
              <td scope="col">Email</td>
              <td scope="col">Address</td>
              <td scope="col">Photo</td>
              <td scope="col">Status</td>
              <td scope="col">Action</td>
            </thead>
            @if (!empty($approved))
            @foreach($approved as $key=>$val)
            <tr>
             <td>{{ $val->id }}</td>
             <td>{{ $val->name }}</td>
             <td>{{ $val->phone }}</td>
             <td>{{ $val->email }}</td>
             <td>{{ $val->address }}</td>
             <td>
              @if ($val->photo != "")
              <img src="http://localhost/laravel-jwt-auth/public/photo/{{ $val->photo }}" style="width: 20%;height: auto;" class="img-thumbnail">
              @else
              <img src="http://localhost/laravel-jwt-auth/public/photo/no_img.png" style="width: 20%;height: auto;" class="img-thumbnail">
              @endif

            </td>
            <td> @if($val->status == 0) <p style="color:red";>Pending...</p> @else <p style="color:green;">Success</p> @endif</td>
            <td>

              <a href="{{ asset('barber_edit') }}/{{ $val->id }}">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
              </a>/

              <a href="barber_delete/{{ $val->id}}" onclick="return confirm('Are you sure?')">
                <span class="glyphicon glyphicon-trash"></span> 
              </a>/

              @if($val->status == 0)
              <a href="{{ asset('barber_disapproved')}}/{{ $val->id }}" style="color:green;";>
                <span class="glyphicon glyphicon-ok"></span> 
              </a>
              @else
              <a href="{{ asset('barber_approved')}}/{{ $val->id }}" style="color:red;">
                <span class="glyphicon glyphicon-remove"></span>
              </a>
              @endif
            </td>
          </tr>
          @endforeach
          @else
          <td colspan="8">*No Recored Available Please check*</td>                      
          @endif
        </table>
        {!! $approved->links() !!}
      </div>

      <div class="tab-pane" id="settings" role="tabpanel">
        <p>coming soon!</p>
      </div>
    </div>

  </div>
</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{ asset('/add_barbers') }}" enctype="multipart/form-data">

          <div class="jumbotron">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="id" class="form-control" name="id" value=" @if (!empty($edit_barbers)){{ $edit_barbers['id'] }} @endif">
            <div class="form-group">
              <label for="email">Name:</label>
              <input type="text" id="name" class="form-control" name="name" value="@if (!empty($edit_barbers)){{ $edit_barbers['name'] }} @endif" placeholder="Name">
              @error('name')
              <span class="red">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Phone:</label>
              <input type="text" id="phone" class="form-control" name="phone" value="@if (!empty($edit_barbers)){{ $edit_barbers['phone'] }} @endif" placeholder="Phone">
              @error('phone')
              <span class="red">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" id="email" class="form-control" name="email" value="@if (!empty($edit_barbers)){{ $edit_barbers['email'] }} @endif" placeholder="Email">
              @error('email')
              <span class="red">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Address:</label>
              <textarea  id="address" class="form-control"  name="address" value="" placeholder="Address"> @if (!empty($edit_barbers)){{ $edit_barbers['address'] }} @endif</textarea>
              @error('address')
              <span class="red">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-group">
              <label for="email">Photo:</label>
              <input type="file" class="form-control" id="photo" name="photo" value="@if (!empty($edit_barbers)){{ $edit_barbers['photo'] }} @endif" placeholder="Photo">
              @error('photo')
              <span class="red">{{ $message }}</span>
              @enderror
              @if (!empty($edit_barbers))
              <img src="http://localhost/laravel-jwt-auth/public/photo/@if (!empty($edit_barbers)){{ $edit_barbers['photo'] }} @endif" onerror="this.style.display='none'" style="width: 30%;height: 51px;">
              @endif
            </div>

            <input type="submit" name="submit" class="btn btn-primary" id="submit" value="Submit">
            <div class="col-sm-6">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


@endsection

