<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/login.css">
    <title>Quên mật khẩu</title>
</head>
<body class="login-main">

    @if (Session::get('message'))
    <div class="alert alert-danger">
        {{ Session::get('message') }}
    </div>
    @endif

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
                <h4 id="login-title">Đăng nhập</h4>
                <p>Nhập địa chỉ email bạn đã đăng ký, chúng tôi sẽ giúp bạn lấy lại mật khẩu</p>
                <form action="{{ route('forgot_password') }}" method="POST" id="login-form" class="form-horizontal">
                    @csrf
                     <div class="form-group">
                        <span style="color:red">@error('email'){{ $message }}@enderror</span>
                        <input type="text" class="form-control" placeholder="Nhập email của bạn" name="email">
                        <button type="submit" class="btn btn-primary login-btn">Gửi mật khẩu</button>
                     </div>
                </form>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

