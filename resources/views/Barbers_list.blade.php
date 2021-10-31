<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Barbers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">.red{color:red}</style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-8">
               <div class="jumbotron">
                <table border="1" class="table">
                    <thead class="btn-primary">
                        <td>Sno</td>
                        <td>Name</td>
                        <td>Phone</td>
                        <td>Email</td>
                        <td>Address</td>
                        <td>Photo</td>
                        <td>Status</td>
                        <td>Action</td>
                    </thead>
                    @if (!empty($barbers))
                    @foreach($barbers as $val)
                    <tr>
                       <td>{{ $val->id }}</td>
                       <td>{{ $val->name }}</td>
                       <td>{{ $val->phone }}</td>
                       <td>{{ $val->email }}</td>
                       <td>{{ $val->address }}</td>
                       <td>
                        @if ($val->photo != "")
                        <img src="http://localhost/laravel-jwt-auth/public/photo/{{ $val->photo }}" style="width: 100%;height: 51px;">
                        @else
                        <img src="http://localhost/laravel-jwt-auth/public/photo/no_img.png" style="width: 100%;height: 50px;">
                        @endif

                    </td>
                    <td> @if($val->status == 0) <p style="color:red";>Pending...</p> @else <p style="color:green;">Success</p> @endif</td>
                    <td>
                        <a href="{{ asset('barber_edit') }}/{{ $val->id }}">Edit</a>/<a href="barber_delete/{{ $val->id}}">Delete</a>/

                        @if($val->status == 0)
                        <a href="{{ asset('barber_disapproved')}}/{{ $val->id }}" style="color:red";>
                        Approve </a>
                        @else
                        <a href="{{ asset('barber_approved')}}/{{ $val->id }}" style="color:green;">Approved </a>
                        @endif
                    </td>
                </tr>
                @endforeach
                @else
                <td colspan="8">*No Recored Available Please check*</td>                      
                @endif
            </table>
        </div>
        {!! $barbers->links() !!}
    </div>
        <!-- <div class="col-sm-1">
        </div> -->
        <div class="col-sm-4">
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
</body>
</html>
