<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body class="login-main">
    <div class="div" id="wrap-main">
        <div class="main-container">
            <div class="head-login">
                <div class="info">
                    <div class="logo-login">
                        <a href=""><img src="images/event-logo.png" alt=""></a>
                    </div>
                </div>
            </div>
            <div id="form-login-cms">

                @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}
                </div>
                @endif

                <h4 id="login-title">Đăng nhập</h4>
                <form action="{{ route('login.check') }}" method="post" id="login-form" class="form-horizontal">
                    @csrf
                     <div class="form-group">
                        <input type="text" class="form-control" placeholder="Email" name="email">
                        <span style="color:red">@error('email'){{ $message }}@enderror</span>
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau">
                        <span style="color:red">@error('matkhau'){{ $message }}@enderror</span>
                        <button type="submit" class="btn btn-primary login-btn">Đăng nhập</button>
                     </div>
                </form>
                <div class="line-input mt-30">
                    <p class="login-with">
                        <span>Hoặc đăng nhập với</span>
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('login.facebook') }}"><button class="btn btn-primary mt-10 bg-blue fb-login">FACEBOOK</button></a>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('login.google') }}"><button class="btn btn-danger mt-10 gg-login login-google" id="googleSignIn">GOOGLE</button></a>
                    </div>
                </div>
                <div class="sign-now">
                    Bạn chưa có tài khoản?
                    <a href="{{ route('register.user') }}">Đăng ký ngay</a>
                </div>
                <div class="message">
                    <span><a href="/forgot_password" style="color: #EF3B3A; text-decoration: none;">Quên mật khẩu?</a></span>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

