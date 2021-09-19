<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="css/login.css">
    <title>Đăng ký thành viên</title>
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

            @if (Session::get('success'))
               <div class="alert alert-success">
                   {{ Session::get('success') }}
               </div>
            @endif

            @if (Session::get('fail'))
               <div class="alert alert-danger">
                   {{ Session::get('fail') }}
               </div>
            @endif

            <div id="form-login-cms">
                <h4 id="login-title">Đăng ký thành viên</h4>
                <form action="{{ route('register.store') }}" method="post" id="login-form" class="form-horizontal">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Họ và tên" name="hoten" value="{{ old('hoten') }}">
                        <span style="color:red">@error('hoten'){{ $message }}@enderror</span>
                        <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                        <span style="color:red">@error('email'){{ $message }}@enderror</span>
                        <input type="text" class="form-control" placeholder="Số điện thoại" name="sdt" value="{{ old('sdt') }}">
                        <span style="color:red">@error('sdt'){{ $message }}@enderror</span>
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="matkhau" value="{{ old('matkhau') }}">
                        <span style="color:red">@error('matkhau'){{ $message }}@enderror</span>
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="nlmatkhau" value="{{ old('nlmatkhau') }}">
                        <button type="submit" class="btn btn-primary login-btn">Đăng ký</button>
                     </div>
                </form>
                <div class="sign-now">
                    Bạn đã có tài khoản?
                    <a href="{{ route('login.user') }}">Đăng nhập</a>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('login.facebook') }}">
                            <button class="btn btn-primary mt-10 bg-blue fb-login">
                                <i class="fab fa-facebook-square"> Đăng nhập với Facebook</i>
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

