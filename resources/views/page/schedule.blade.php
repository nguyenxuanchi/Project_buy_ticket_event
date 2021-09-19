@extends('layouts.main')
@section('content')
    <div id="main" class="page-full-width sk-flex-display">
        <div class="container-fuilt">
            <div class="row">
                <div class="col-sm-2 col-md-2">
                    <nav class="navbar navbar-default border-radius-none">
                        <div class="side-menu-container">
                            <ul class="nav navbar-nav menu_new">
                                <li class="panel panel-default">
                                    <a href="/edit_event/{{ $findIdEvent->ID }}">
                                        <i class="fa fa-pencil fa-lg icon_nav" aria-hidden="true"></i>
                                        <span>Thông tin</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/schedule/{{ $findIdEvent->ID }}">
                                        <i class="fa fa-calendar icon_nav"></i>
                                        <span>Lịch</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/show_ticket/{{ $findIdEvent->ID }}">
                                        <i class="fa fa-ticket icon_nav"></i>
                                        <span>Loại vé</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/list_event_register?masukien={{ $findIdEvent->ID }}">
                                        <i class="fa fa-server icon_nav" aria-hidden="true"></i>
                                        <span>Đăng ký</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/statistical/{{ $findIdEvent->ID }}">
                                        <i class="fa fa-chart-line icon_nav" aria-hidden="true"></i>
                                        <span>Thống kê</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-sm-10 col-md-10">
                    <div class="navbar-main schedule-list">
                        <div class="navbar-main schedule-list">
                            <div class="schedule-list-event row">
                                <div class="col-md-10 col-sm-10 col-xs-8">
                                    <h3>Danh sách lịch</h3>
                                    <div id="w0" class="grid-view">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Thành phố</th>
                                                    <th>Địa chỉ</th>
                                                    <th style="text-align: center;">Nhà Tổ Chức</th>
                                                    <th style="text-align: center;">Từ ngày</th>
                                                    <th>Đến ngày</th>
                                                </tr>
                                            </thead>
                                          @foreach ($schedule_event as $value)
                                            <tbody>
                                                <tr data-key="3463">
                                                    <td>{{ $value->ID }}</td>
                                                    <td>{{ $value->THANHPHO }}</td>
                                                    <td>{{ $value->DIACHI }}</td>
                                                    <td style="text-align: center;">{{ $value->NHATOCHUC}}</td>
                                                    <td style="text-align: center;">{{ $value->NGAYBATDAU }}</td>
                                                    <td>{{ $value->NGAYKETTHUC }}</td>
                                                </tr>
                                            </tbody>
                                           @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
