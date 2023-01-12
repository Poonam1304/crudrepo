@extends('Admin.main-layout')
@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Add Admin User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
@endsection

@section('body')

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Add  Admin User</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if(session('success'))
            <div class="alert alert-danger">{{session('success')}}</div>
            @endif
            <form action="{{route('storeuser')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter name">
                        @if($errors->has('name'))
                        <div class="error" style="color: red;">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Enter name">
                        @if($errors->has('phone_number'))
                        <div class="error" style="color: red;">{{ $errors->first('phone_number') }}</div>
                        @endif
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Education</label>
                        <input type="text" name="education" class="form-control" placeholder="Enter name">
                      
                    </div>
                    <div class="form-group">
                                <label><strong>Category :</strong></label><br>
                                <label><input type="checkbox" name="achievment[]" value="Red"> Red</label>
                                <label><input type="checkbox" name="achievment[]" value="Blue"> Blue</label>
                                <label><input type="checkbox" name="achievment[]" value="Green"> Green</label>
                                <label><input type="checkbox" name="achievment[]" value="Yellow"> Yellow</label>
                            </div>  
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">status</label>
                        <input type="text" name="status" class="form-control" placeholder="Enter name">
                      
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">experience</label>
                        <input type="text" name="experience" class="form-control" placeholder="Enter name">
                      
                    </div>
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">address</label>
                        <input type="text" name="address" class="form-control" placeholder="Enter name">
                      
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        @if($errors->has('email'))
                        <div class="error" style="color: red;">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                 
                    <div class="form-group col-md-6">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @if($errors->has('password'))
                        <div class="error" style="color: red;">{{ $errors->first('password') }}</div>
                        @endif
                    </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection