@extends('Backend.master')
@section('title')
    Add Admin
@endsection

@section('content')

    @if(session('success'))
        <div class="alert alert-success">{{session('success')}}</div>
    @elseif(session('fail'))
        <div class="alert alert-fail">{{session('fail')}}</div>
    @endif

    <br><br>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="post" action="{{url('/@admin@/addAdmin')}}" enctype="multipart/form-data" role="form">
            {{csrf_field()}}
            <div class="box-body">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Enter Username">
                    @if($errors->has('username'))
                        <div>
                            <code>{{$errors->first('username')}}</code>
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                           placeholder="Enter email">
                    @if($errors->has('email'))
                        <code>{{$errors->first('email')}}</code>
                    @endif
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="Password">
                    <p class="help-block">Password should at least have 4 characters.</p>

                    @if($errors->has('password'))
                        <code>{{$errors->first('password')}}</code>
                    @endif
                </div>
                <div class="form-group">
                    <label for="confirm password">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                           placeholder="Confirm Password">
                    @if($errors->has('password_confirmation'))
                        <code>{{$errors->first('password_confirmation')}}</code>
                    @endif

                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" class="form-control" placeholder="Enter Address">
                    @if($errors->has('address'))
                        <code>{{$errors->first('address')}}</code>
                    @endif

                </div>
                <div>
                    <label for="Type">Admin Type</label>
                    <select name="type" class="form-control">
                        <option>Super Admin</option>
                        <option>Admin</option>
                    </select>
                </div>
                <br>

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection