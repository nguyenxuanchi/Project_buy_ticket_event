<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="{{ URL::asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('css/detail_event.css') }}" rel="stylesheet">
    <title>Mạng chia sẻ sự kiện - Sukien.net</title>
</head>
<body>
    <div id="page" class="wrap-main">
        <div class="main-container">

            @foreach ($sukien as $value)
            <header class="header sticky-main">
                <div class="header__main display-flex-center mobile-tabe">
                    <div class="header__logo col-md-2 col-xs-3 full-xs text-left">
                        <div class="logo-box">
                            <a href="{{ route('trangchu') }}">
                                <img src="{{ URL::asset('images/event-logo.png') }}"alt="Mạng chia sẻ sự kiện Sukien.net">
                            </a>
                        </div>
                    </div>
                    <div class=" col-md-7 col-xs-7 detail-content__nav hidden-sm hidden-xs affix-top">
                        <ul>
                            <li>
                                <a href="" class="text-uppercase font-size-18 color-dark">
                                    <h3 class="font-24">
                                        {{ $value->TENSK }}
                                    </h3>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="header__logo col-md-3 col-xs-3 full-xs text-left">
                        <div class="account">
                                <a class="btn btn_new_ev ml-10 create_event" href="/checkout_ticket/{{ $value->ID }}">
                                    <i class="far fa-hand-point-right"></i> ĐẶT VÉ NGAY
                                </a>
                        </div>
                    </div>
                </div>
            </header>

            <div class="wrap-site">
                <section class="banner-page">
                    <img src="/images/{{ $value->ANH }}" alt="">
                </section>
                <section class="section_content">
                    <div class="main_content">
                        <div class="img_banner">
                            <img src="/images/{{ $value->ANH }}" alt="">
                            <div class="like_share">
                                <div class="like">
                                    <i class="fa fa-heart item_ls" aria-hidden="true"></i>
                                    <div class="background_layer"></div>
                                </div>
                                <div class="share">
                                    <i class="fa fa-share-alt item_ls" aria-hidden="true"></i>
                                    <div class="background_layer"></div>
                                </div>
                            </div>
                        </div>
                        <div class="content__header">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="bold ml-10 font-24"> {{ $value->TENSK }}</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ml-10 mb-10">
                                    <i class="fa fa-clock-o"></i>
                                    <span>Từ ngày: </span><span>{{ $value->NGAYBATDAU }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 ml-10 mb-10">
                                    <i class="far fa-calendar-check"></i>
                                    <span><b>{{ $value->THANHPHO }}</b></span>
                                </div>
                            </div>
                        </div>
                        <div id="gioithieu">
                          <p>{!! $value->NOIDUNGSK !!}</p>
                        </div>
                        <div id="thongtinve" class="display-flex mobile-table bg-color-light border-main detail-content__all mt-10 height_rezise">
                            <div class="form-action">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <a href="/checkout_ticket/{{ $value->ID }}">
                                        <button type="submit" id="btn-click-ticket" class="h4 btn btn-main btn-medium full-width margin-0 text-uppercase font-weight-bold " readonly="">Đặt Vé ngay</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @endforeach

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
        CKEDITOR.replace( 'editor1' );
    </script>
    <script src="{{ URL::asset('js/insert_event.js') }}"></script>
</body>
</html>
