<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link href="{{ URL::asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/detail_event.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/checkout_ticket.css') }}" rel="stylesheet">
    <title>Mạng chia sẻ sự kiện - Sukien.net</title>
</head>

<body>
    <div id="page" class="wrap-main">
        <header class="header sticky-main">
            <div class="header__main display-flex-center mobile-tabe">
                <div class="header__logo col-md-2 col-xs-3 full-xs text-left">
                    <div class="logo-box">
                        <a href="{{ route('trangchu') }}">
                            <img src="{{ URL::asset('images/event-logo.png') }}" alt="Mạng chia sẻ sự kiện Sukien.net">
                        </a>
                    </div>
                </div>
                <div class=" col-md-7 col-xs-7 detail-content__nav hidden-sm hidden-xs affix-top">
                    <ul>
                        <li>
                            <a href="" class="text-uppercase font-size-18 color-dark">
                                <h3 class="font-24" style="color: white">
                                    {{ $sukien->TENSK }}
                                </h3>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
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
        <div class="main-container">
            <div class="container">
                <div class="wrap-site">
                    <form id="form-event-ticket" action="{{ route('checkout_ticket',$sukien->ID) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="site-content-contain booking-page background-f4">
                            <div class="bg-color-light">
                                <div id="step1" class="bg-color-light">
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-pull-6">
                                            <h2 class="fz-20 text-center">THÔNG TIN KHÁCH HÀNG</h2>
                                            <div class="rows">
                                                <label class="control-labels Show" for="order-fullname">Họ tên</label>
                                                <span style="color:red">@error('hoten'){{ $message }}@enderror</span>
                                                <input type="text" id="order-fullname" name="hoten" class="form-control"
                                                    placeholder="Họ tên của bạn *">
                                            </div>
                                            <div class="rows">
                                                <label class="control-labels Show" for="order-fullname">Số điện
                                                    thoại</label>
                                                <span style="color:red">@error('sdt'){{ $message }}@enderror</span>
                                                <input type="text" id="order-fullname" name="sdt" class="form-control"
                                                    placeholder="Số điện thoại *">
                                            </div>
                                            <div class="rows">
                                                <label class="control-labels Show" for="order-fullname">Email nhận vé
                                                    điện tử</label>
                                                <span style="color:red">@error('email'){{ $message }}@enderror</span>
                                                <input type="text" id="order-fullname" class="form-control" name="email"
                                                    placeholder="Email nhận vé điện tử *">
                                            </div>
                                            <div class="rows">
                                                <span class="bold">Đăng ký học tại</span>
                                                <span style="color:red">@error('thoigian'){{ $message }}@enderror</span>
                                                <select name="thoigian" id="mail" class="form-control">
                                                    <option value="">Chọn lịch học</option>
                                                    <option value="{{ $sukien->THANHPHO }} {{ $sukien->NGAYBATDAU }}">{{ $sukien->THANHPHO }}, {{ $sukien->NGAYBATDAU }}</option>
                                                </select>
                                            </div>
                                            <div class="rows">
                                                <button type="submit" id="popup-book-ticket"
                                                    class="h4 btn btn-main btn-medium full-width margin-0 text-uppercase font-weight-bold">ĐẶT
                                                    VÉ NGAY</button>
                                                <div class="mt-10 text-center fz-12">
                                                    (c) <a href="http://127.0.0.1:8000/">Event</a> – Mạng chia sẻ sự
                                                    kiện – Hotline: 0904 840 440
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-sm-pull-6">
                                            <h2 class="fz-20 text-center">VUI LÒNG CHỌN VÉ</h2>
                                            <span style="color:red">@error('soluong'){{ $message }}@enderror</span>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Loại vé</th>
                                                        <th>Số lượng</th>
                                                        <th>Giá vé</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($ve as $value)
                                                    <tr>
                                                        <td data-title="Loại vé" class="ticket-type">
                                                            <h3
                                                                class="font-size-14 font-weight-bold text-left ticket_title">
                                                                {{ $value->TENVE}} </h3>
                                                        </td>
                                                        <!--SỐ LƯỢNG-->
                                                        <td data-title="Số lượng"
                                                            class="ticket-qty font-weight-bold color-dark detail-change-qty change-qty">
                                                            <label for="name"></label>
                                                            <button type="button"
                                                                class="ticket-qty-input change_qty minus cursor_hover"
                                                                name="ticket_number"> - </button>
                                                                <input type="text"
                                                                id="ticket-quantity-not-free-2599"
                                                                class="ticket-qty-input ticket-quantity-not-free  ticket-quantity"
                                                                name="soluong" value="0" readonly=""
                                                                ticket_id="2599" ticket_name="LiveShowHiphop"
                                                                ticket_price="100000" min="0" max="10">
                                                                <button
                                                                type="button" class="add change_qty plus cursor_hover">
                                                                + </button>
                                                        </td>
                                                        <!--GIÁ VÉ-->
                                                        <td id="ticket_2599" data-title="Giá vé"class="ticket-amount font-weight-bold color-dark">
                                                                <input type="text" class="giave" id="gia_ve" name="giave" value="{{ $value->GIAVE }}">
                                                            </td>
                                                    </tr>
                                                    @endforeach

                                                    <!--TỔNG TIỀN-->
                                                    <tr>
                                                        <td colspan="2"
                                                            class="color-dark font-weight-bold total-hide text-uppercase">
                                                            <span style="float: right">Tổng tiền</span>
                                                        </td>
                                                        <td class="font-size-18 primary_color font-weight-bold"
                                                            data-title="Tổng tiền">

                                                            <span class="ticket-price-total"
                                                                id="ticket-price-total-discount">

                                                                <span class="bold" id="total-price-order" data-price="0"
                                                                    data-qty="1">
                                                                    0 VND</span>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        CKEDITOR.replace('editor1');
    </script>
   <script src="{{ URL::asset('js/insert_event.js') }}"></script>
</body>

</html>
