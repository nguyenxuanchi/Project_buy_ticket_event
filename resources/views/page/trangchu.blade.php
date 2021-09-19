@extends('layouts.main')
@section('content')
    <section class="background-e pdt-80" style="background: #cccccc; padding-bottom: 32px;">
        <div class="container">
            <div class="row mb-10">
                <div class="col-md-8 mt-10">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item item_carou slider_show active">
                                <a class="color-dark" href="/detail_event/{{ $event->ID }}" target="_blank"
                                    title="Zoom: INTERNET BUSINESS 2021">
                                    <img class="event-avatar-img" style="height: 380px; border-radius: 10px;"
                                        src="/images/{{ $event->ANH }}"
                                        alt="Zoom: INTERNET BUSINESS 2021" title="Zoom: INTERNET BUSINESS 2021">
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4 mt-10">
                    <div class="ev_right">
                        <div class="item__heads item_vl2 text-center head_title bn_first">
                            @foreach ($event1 as $value)
                            <a class="color-dark" href="/detail_event/{{ $value->ID }}" target="_blank"
                                title="Zoom: Bán Hàng Trên Shopee: 200-300 Đơn/Ngày">
                                <img class="event-avatar-img img_size" style="height: 185px; border-radius: 10px; margin-bottom: 10px"
                                    src="/images/{{ $value->ANH }}"
                                    alt="Zoom: Bán Hàng Trên TikTok 100+ Đơn/Ngày"
                                    title="Zoom: Bán Hàng Trên TikTok 100+ Đơn/Ngày">
                            </a>
                            @endforeach
                        </div>

                        <div class="item__heads item_vl2 text-center head_title ">
                            @foreach ($event2 as $value)
                            <a class="color-dark" href="/detail_event/{{ $value->ID }}" target="_blank"
                                title="Zoom: Bán Hàng Trên TikTok 100+ Đơn/Ngày">
                                <img class="event-avatar-img img_size" style="height: 185px; border-radius: 10px;"
                                    src="/images/{{ $value->ANH }}"
                                    alt="Zoom: Bán Hàng Trên TikTok 100+ Đơn/Ngày"
                                    title="Zoom: Bán Hàng Trên TikTok 100+ Đơn/Ngày">
                            </a>
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="background-e pdt-20">
        <div class="Event_list container">
            <div class="title_s text-center">
                <ul>
                    <li class="active_li">
                        <a href="" class="color-dark">Sắp diễn ra</a>
                    </li>
                    <li>|</li>
                    <li class="active_li">
                        <a href="" class="color-dark">Đang diễn ra</a>
                    </li>
                    <li>|</li>
                    <li class="active_li">
                        <a href="" class="color-dark">Mới đăng</a>
                    </li>
                </ul>
            </div>
            <div class="menu_event_cat text-center">
                <ul>
                    <li class="active_li">
                        <a class="color-dark" href="">Tất cả</a>
                    </li>
                    <li class="active_li">
                        <a class="color-dark" href="">Hội thảo</a>
                    </li>
                    <li class="active_li">
                        <a class="color-dark" href="">Khóa học</a>
                    </li>
                    <li class="active_li">
                        <a class="color-dark" href="">Triển lãm</a>
                    </li>
                    <li class="active_li">
                        <a class="color-dark" href="">Âm nhạc</a>
                    </li>
                    <li class="active_li">
                        <a class="color-dark" href="">Ăn uống</a>
                    </li>
                    <li class="active_li">
                        <a class="color-dark" href="">Miễn phí</a>
                    </li>
                    <li class="active_li">
                        <a class="color-dark" href="">Tuần này</a>
                    </li>
                </ul>
            </div>
            <div class="list_Event">
                <div class="row list_e">
                    @foreach ($sukien as $value)
                        <div class="col-md-3">
                            <div class="swiper-slide event-feature__item event__item bg-color-light">
                                <div class="wrap">
                                    <div class="item__heads text-center">
                                        <a href="/detail_event/{{ $value->ID }}" class="color-dark">
                                            <img id="img_event" src="/images/{{ $value->ANH }}">
                                        </a>
                                    </div>
                                    <div class="item__main color-dark main_ev">
                                        <label class="font-weight-bold text-uppercase margin-0">
                                            <a class="color-dark title_name"
                                                href="/detail_event/{{ $value->ID }}">{{ $value->TENSK }}</a>
                                        </label>
                                        <div class="event__date-time mt-10">
                                            <div class="row row_ctm">
                                                <div
                                                    class="mobile-schedule-city col-md-7 col-sm-7  col-xs-7 col-sm-7 font-size-14">
                                                    <div class="event__date-wrap">
                                                        <i class="far fa-calendar-check"></i>
                                                        <span>
                                                            {{ $value->NGAYBATDAU }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div
                                                    class=" pdr-0 mobile-schedule-city col-md-5 col-sm-5 col-xs-5 col-sm-7 font-size-14 pdr-0 text-right">
                                                    <span class="schedule-name name_sce text-center">
                                                        {{ $value->THANHPHO }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row row_ctm" style="padding-left: 10px; padding-right: 10px">
                                            <div
                                                class="mobile-schedule-city col-md-6 col-sm-6  col-xs-6 col-sm-6 font-size-12">
                                                <i class="far fa-clock"></i>
                                                18:00 -
                                                21:00
                                            </div>
                                            <div
                                                class="mobile-schedule-city col-md-6 col-sm-6  col-xs-6 col-sm-6 font-size-14 pdr-0 text-right">
                                                <span class="text-only-index">Từ: </span><span
                                                    class="price-events font-size-13 font-weight-bold"
                                                    id="price_ticket">{{ $value->GIAVE }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="order_step container">
            <div class="row step_section">
                <div class="col-md-4 d-flex item_st">
                    <div class="icon_item">
                        <img class="im1" src="https://sukien.net/media/images/tick.png">
                    </div>
                    <div class="text-span">
                        <span class="s1">Chọn sự kiện và loại vé</span><br>
                        <span class="font-size-12">Chỉ trong vài click</span>
                    </div>
                    <div class="arrows">
                        <img src="https://sukien.net/uploads/images/event-startup-cvc-right-arow-1590392436.png">
                    </div>
                </div>
                <div class="col-md-4 d-flex item_st">
                    <div class="icon_item">
                        <img class="im2" src="https://sukien.net/media/images/dolla.png">
                    </div>
                    <div class="text-span">
                        <span class="s1">Đặt vé và thanh toán</span><br>
                        <span class="font-size-12">Thanh toán online hoặc khi nhận vé</span>
                    </div>
                    <div class="arrows">
                        <img src="https://sukien.net/uploads//images/event-startup-cvc-right-arow-1590392436.png">
                    </div>
                </div>
                <div class="col-md-4 d-flex item_st">
                    <div class="icon_item">
                        <img class="im3" src="https://sukien.net/media/images/ticket.png">
                    </div>
                    <div class="text-span">
                        <span class="s1">Nhận vé</span><br>
                        <span class="font-size-12">Qua email hoặc trực tiếp tại nhà</span>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
