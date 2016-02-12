
<!DOCTYPE html>
<html>
@include('layouts.head')

<body class="hold-transition login-page" style="background-color: #283547">

<div class="login-box">
    <div class="login-logo">
        <img style="max-height: 100%; max-width: 100%;" src="{{ url('images/blue-logo.png') }}" alt="Truckjee Logo">
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        @if($message)
            <div class="alert alert-danger alert-dismissible" style="margin-top:2em;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ $message }}
            </div>
        @endif

        <h3 class="login-box-msg">Welcome!</h3>
        <p class="login-box-msg">Sign in to start your session</p>

        <form action="{{ url('/login') }}" method="post">
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                <p>Email</p>
                <input type="email" name="email" class="form-control" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <p>Password</p>
                <input type="password" name="password" class="form-control" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">

                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

    </div>

    <!-- /.login-box-body -->
</div>
<!-- /.login-box -->



<!-- jQuery 2.1.4 -->
<script src="{{ url('js/jQuery-2.1.4.min.js') }}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ url('js/bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ url('js/app.min.js') }}"></script>


</body>
</html>
