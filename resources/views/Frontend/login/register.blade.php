@include('Backend.layouts.header')
<body class="hold-transition login-page">
<div style="width: 500px;" class="container">
<div class="register-logo">
    <a href="../../index2.html"><b>Top</b>Newspaper</a>
</div>
<div class="register-box-body">
    <p class="login-box-msg">Register to Subscriber</p>

    <form action="../../index.html" method="post">
        <div class="form-group has-feedback">
            <input type="text" name="username" class="form-control" placeholder="Full name">
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
            <input type="password" name="password_confirmation" class="form-control" placeholder="Retype password">
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
        </div>
        <div class="form-group has-feedback">
        <input type="text" class="form-control" name="address" placeholder="Address">
        <span class="glyphicon glyphicon-tree-conifer form-control-feedback"></span>
</div>
        <div class="row">
            <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                        <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> I agree to the <a href="#">terms</a>
                    </label>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>
            <!-- /.col -->
        </div>
    </form>
    <a href="{{url('/signIn')}}" class="text-center">I already have a membership</a>
</div></div>

@include('Backend.layouts.footer')

