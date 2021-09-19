@extends('layouts.main')
    @section('content')
        <div id="main" class="page-full-width sk-flex-display">
            <div class="wrap-schedule-list flex-col-right">
                <div class="navbar-main schedule-list">
                    <div class="wrap-schedule-list">
                        <h1 class="ticket-uppercase center-align">Sự kiện của tôi</h1>
                    </div>
                </div>
                <div class="form-group container event_new">
                    <div class="row">
                        <div class="col-md-3 pad-10">
                            <a href="/insert_event/{{ $findIdUser->USERS_ID }}">
                                <div class="item first">
                                    <i class="fa fa-plus-circle"></i>
                                    <p class="add_event_text">Tạo sự kiện</p>
                                </div>
                            </a>
                        </div>
                        @foreach ($sukien as $value)
                        <div class="col-md-3 pad-10">
                            <div class="item">
                                    <div class="img_event">
                                    <a href="/detail_event/{{ $value->ID }}">
                                        <img id="img_event" src="/images/{{ $value->ANH }}">
                                    </a>
                                    </div>
                                    <div class="info_event">
                                        <div class="box_event">
                                            <div class="name_ev">
                                            <a href="/detail_event/{{ $value->ID }}">
                                                <p class="event_name">{{ $value->TENSK }}</p>
                                            </a>
                                            </div>
                                        </div>
                                        <p style="">
                                            <a href="/edit_event/{{ $value->ID }}" title="Chỉnh sửa" class="item_ev"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="/list_event_register?masukien={{ $value->ID }}" title="Danh sách đăng ký" class="item_ev"><i class="fa fa-server" aria-hidden="true"></i></a>
                                            <a href="{{ route('schedule', $value->ID) }}" title="Lịch" class="item_ev"><i class="fa fa-calendar"></i> </a>
                                            <a href="{{ route('show_ticket', $value->ID) }}" title="Loại vé" class="item_ev"><i class="fa fa-ticket"></i></a>
                                            <a href="{{ route('statistical', $value->ID) }}" title="Thống kê" class="item_ev"><i class="fa fa-chart-line"></i></a>
                                        </p>
                                        <p style="display: flex;justify-content: center;">
                                            <a href="/checkin_event/{{ $value->ID }}" title="Check in" class="btn btn-default" style="width: 94%;"><i class="fa fa-qrcode"></i> CHECK-IN</a>
                                        </p>
                                    </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endsection
