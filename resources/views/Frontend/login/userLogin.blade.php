@include('Backend.layouts.header')
<body class="hold-transition login-page">

@if(session('fail'))
    <div class="alert alert-danger">
        {{session('fail')}}
    </div>
@endif

<div class="login-box">
    <div class="login-logo">
        <a href="{{url('/')}}"><b>TOP</b>Newspaper</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Sign in User</p>

        <form action="{{url('/signIn/signInAction')}}" method="post">
            {{csrf_field()}}
            <div class="form-group has-feedback">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <input name='rememberMe' type="checkbox">Remember Me
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>

                </div>
                    <div class="col-md-3"><a class="btn btn-default btn-sm" href="{{url('/signUp')}}">Sign UP</a></div>
                <!-- /.col -->
            </div>
        </form>

    </div>
    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

@include('Backend.layouts.footer')