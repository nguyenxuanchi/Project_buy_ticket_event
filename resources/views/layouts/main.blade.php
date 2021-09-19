<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ URL::asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/trangchu.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/even_of_me.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/insert_event.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/insert_ticket.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/checkin_event.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/list_event_register.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/statistical.css') }}" rel="stylesheet">
    <title>Mạng chia sẻ sự kiện - Sukien.net</title>
</head>
<body>
    <div id="page" class="wrap-main">
        <div class="main-container">
            <header class="header sticky-main">
                <div class="header__main display-flex-center mobile-tabe">
                    <div class="header__logo col-md-2 col-xs-3 full-xs text-left">
                        <div class="logo-box">
                            <a href="{{ route('trangchu') }}">
                                <img src="{{ URL::asset('images/event-logo.png') }}"alt="Mạng chia sẻ sự kiện Sukien.net">
                            </a>
                        </div>
                    </div>
                    <div class="header__search col-lg-6 col-md-6 col-xs-9 full-xs display-flex-center">
                        <div class="search-box">
                            <form action="/timkiem" method="GET" class="display-flex-center mobile-table">
                                <div class="search__keyword">
                                    <span class="icon"><i class="fa fa-search"></i></span>
                                    <input type="text" id="search" name="search" class="form-control" placeholder="Nhập tên sự kiện..." style="font-family:Arial, FontAwesome">
                                </div>
                                <div class="seatch__place secondary_color_text">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Chọn địa điểm
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="#">Hà Nội</a>
                                          <a class="dropdown-item" href="#">TP HCM</a>
                                          <a class="dropdown-item" href="#">Khác</a>
                                        </div>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          Chọn thể loại
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                          <a class="dropdown-item" href="#">Hội thảo</a>
                                          <a class="dropdown-item" href="#">Khóa học</a>
                                          <a class="dropdown-item" href="#">Triển Lãm</a>
                                          <a class="dropdown-item" href="#">Live Show</a>
                                          <a class="dropdown-item" href="#">Sự kiện</a>
                                          <a class="dropdown-item" href="#">Khác</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="ml-10"></div>
                            </form>
                        </div>
                    </div>
                    <div class="header__account col-lg-4 col-md-4 col-xs-12 display-flex-center content-end">
                        <div class="account">
                            @if (isset($id))
                                <a class="btn-event" href="/event_of_me/{{ $id }}">Sự kiện của tôi</a>
                                <a class="newBtn" href="/insert_event/{{ $id }}" title="Tạo sự kiện">
                                   <i class="fa fa-plus"></i>
                                </a>
                                <div class="dropdown">
                                    <button style="height: 40px;
                                    width: 42px;
                                    border-radius: 30px;
                                    color: white;" id="dropdownMenuButton" data-toggle="dropdown">
                                        {{ $hoten }}
                                    </button>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="margin-left: -93px;">
                                      <a class="dropdown-item" href="/profile/{{ $id }}">Hồ sơ</a>
                                      <a class="dropdown-item" href="{{ route('logout') }}">Thoát</a>
                                    </div>
                                </div>
                            @else
                              <div class="account__not_login">
                                <a style="color: white" href="{{ route('login.user') }}">Đăng nhập</a>
                                <span> | </span>
                                <a style="color: white" href="{{ route('register.user') }}">Đăng ký</a>
                                <a class="btn btn_new_ev ml-10 create_event" href="/insert_event/{id}">
                                    <i class="fa fa-plus-circle" aria-hidden="true"></i> TẠO SỰ KIỆN
                                </a>
                              </div>
                            @endif
                        </div>
                    </div>
                </div>
            </header>

            @yield('content')

            <div id="foodter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-3 col-xs-12">
                            <div class="g-cell text--info-footer">
                                <img src="{{ URL::asset('images/event-logo.png') }}" alt="Mạng chia sẻ sự kiện" style="width: 250px">
                                <h4>MẠNG CHIA SẺ SỰ KIỆN</h4>
                                <p>247 Cầu Giấy, Hà Nội</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        CKEDITOR.replace( 'noidungsk' );
    </script>
    <script src="{{ URL::asset('js/insert_event.js') }}"></script>
    @yield('script')
</body>
</html>
