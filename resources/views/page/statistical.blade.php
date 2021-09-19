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
                                    <a href="/edit_event/{{ $findIdEvent->SUKIEN_ID }}">
                                        <i class="fa fa-pencil fa-lg icon_nav" aria-hidden="true"></i>
                                        <span>Thông tin</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/schedule/{{ $findIdEvent->SUKIEN_ID }}">
                                        <i class="fa fa-calendar icon_nav"></i>
                                        <span>Lịch</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/show_ticket/{{ $findIdEvent->SUKIEN_ID }}">
                                        <i class="fa fa-ticket icon_nav"></i>
                                        <span>Loại vé</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/list_event_register?masukien={{ $findIdEvent->SUKIEN_ID }}">
                                        <i class="fa fa-server icon_nav" aria-hidden="true"></i>
                                        <span>Đăng ký</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/statistical/{{ $findIdEvent->SUKIEN_ID }}">
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
                           <div class="wrap-statistical mt-10">
                               <form action="" id="w0">
                                   <div class="staistical-schedule">
                                    <select id="w1" class="statistic-select-schedule form-control select2-hidden-accessible " style="margin-bottom: 10px">
                                        <option value="">Chọn lịch cần thống kê...</option>
                                        <option value="3463">Hà Nội, 20/05/2021</option>
                                    </select>
                                    <p class="center-align">
                                        <button type="submit" class="btn-statistic-schedule btn btn-success">
                                            <i class="fa fa-lisr"></i>
                                            Thống kê theo lịch
                                        </button>
                                    </p>
                                   </div>
                               </form>
                               <div id="orders_chart" style="min-width: 310px; height: 400px; margin: 0px auto; overflow: hidden;">
                                <div id="highcharts-s4mpy8d-0" class="highcharts-container " style="position: relative; overflow: hidden; width: 1132px; height: 400px; text-align: left; line-height: normal; z-index: 0; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); user-select: none; touch-action: manipulation; outline: none;">
                                    <svg class="highcharts-root" style="font-family:&quot;Lucida Grande&quot;, &quot;Lucida Sans Unicode&quot;, Arial, Helvetica, sans-serif;font-size:12px;" xmlns="http://www.w3.org/2000/svg" width="1132" height="400" viewBox="0 0 1132 400">
                                        <desc>Created with Highcharts 9.1.0</desc>
                                        <defs>
                                            <clipPath id="highcharts-s4mpy8d-1-">
                                                <rect x="0" y="0" width="1083" height="290" fill="none"></rect>
                                            </clipPath>
                                        </defs>
                                        <rect fill="#ffffff" class="highcharts-background" x="0" y="0" width="1132" height="400" rx="0" ry="0"></rect>
                                        <rect fill="none" class="highcharts-plot-background" x="39" y="53" width="1083" height="290"></rect>
                                        <g class="highcharts-grid highcharts-xaxis-grid" data-z-index="1"></g>
                                        <g class="highcharts-grid highcharts-yaxis-grid" data-z-index="1"></g>
                                        <rect fill="none" class="highcharts-plot-border" data-z-index="1" x="39" y="53" width="1083" height="290"></rect>
                                        <g class="highcharts-axis highcharts-xaxis">
                                            <path fill="none" class="highcharts-axis-line" stroke="#ccd6eb" stroke-width="1" data-z-index="7" d="M 39 343.5 L 1122 343.5"></path>
                                        </g>
                                        <g class="highcharts-axis highcharts-yaxis">
                                            <text x="26.5" data-z-index="7" text-anchor="middle" transform="translate(0,0) rotate(270 26.5 198)" class="highcharts-axis-title" style="color:#666666;fill:#666666;" y="198">Số lượng</text>
                                            <path fill="none" class="highcharts-axis-line" data-z-index="7" d="M 39 53 L 39 343"></path>
                                        </g>
                                        <g class="highcharts-series-group" data-z-index="3">
                                            <g class="highcharts-series highcharts-series-0 highcharts-line-series highcharts-color-0"></g>
                                            <g class="highcharts-markers highcharts-series-0 highcharts-line-series highcharts-color-0" data-z-index="0.1" opacity="1" transform="translate(39,53) scale(1 1)"></g></g>
                                            <g class="highcharts-exporting-group" data-z-index="3"><g class="highcharts-button highcharts-contextbutton" stroke-linecap="round" style="cursor:pointer;" transform="translate(1098,10)">
                                                <title>Chart context menu</title>
                                                <rect fill="#ffffff" class="highcharts-button-box" x="0.5" y="0.5" width="24" height="22" rx="2" ry="2" stroke="none" stroke-width="1"></rect>
                                                <path fill="#666666" d="M 6 6.5 L 20 6.5 M 6 11.5 L 20 11.5 M 6 16.5 L 20 16.5" class="highcharts-button-symbol" data-z-index="1" stroke="#666666" stroke-width="3"></path>
                                                <text x="0" data-z-index="1" y="12" style="color:#333333;font-weight:normal;fill:#333333;"></text>
                                            </g></g>
                                            <text x="566" text-anchor="middle" class="highcharts-title" data-z-index="4" style="color:#333333;font-size:18px;fill:#333333;" y="24">Thống kê đơn hàng</text>
                                            <text x="566" text-anchor="middle" class="highcharts-subtitle" data-z-index="4" style="color:#666666;fill:#666666;" y="52"></text>
                                            <text x="10" text-anchor="start" class="highcharts-caption" data-z-index="4" style="color:#666666;fill:#666666;" y="397"></text><g class="highcharts-data-labels highcharts-series-0 highcharts-line-series highcharts-color-0" data-z-index="6" opacity="1" transform="translate(39,53) scale(1 1)"></g>
                                            <g class="highcharts-legend" data-z-index="7" transform="translate(518,355)"><rect fill="none" class="highcharts-legend-box" rx="0" ry="0" x="0" y="0" width="95" height="30" visibility="visible"></rect>
                                                <g data-z-index="1"><g>
                                                    <g class="highcharts-legend-item highcharts-line-series highcharts-color-0 highcharts-series-0" data-z-index="1" transform="translate(8,3)"><path fill="none" d="M 0 11 L 16 11" class="highcharts-graph" stroke="#7cb5ec" stroke-width="2"></path>
                                                        <path fill="#7cb5ec" d="M 8 15 A 4 4 0 1 1 8.003999999333336 14.999998000000167 Z" class="highcharts-point" opacity="1"></path><text x="21" style="color:#333333;cursor:pointer;font-size:12px;font-weight:bold;fill:#333333;" text-anchor="start" data-z-index="2" y="15">Đơn hàng</text>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                        <g class="highcharts-axis-labels highcharts-xaxis-labels" data-z-index="7"></g>
                                        <g class="highcharts-axis-labels highcharts-yaxis-labels" data-z-index="7"></g>
                                        <text x="1122" class="highcharts-credits" text-anchor="end" data-z-index="8" style="cursor:pointer;color:#999999;font-size:9px;fill:#999999;" y="395">Highcharts.com</text>
                                    </svg>
                                </div>
                            </div>
                            <div class="statistic-event row">
                                <div class="statistic-event-box col-md-3 col-sm-3 col-xs-12">
                                    <div class="statictic-one statistic-event-icon">
                                        <span class="bold"> {{ $total_order }}</span>
                                        <div class="statistic-text"> Tổng đơn</div>
                                    </div>
                                </div>
                                <div class="statistic-event-box col-md-3 col-sm-3 col-xs-12">
                                    <div class="statictic-two statistic-event-icon">
                                         <span class="bold"> {{ $total_pay }} </span>
                                        <div class="statistic-text">
                                            Đơn thanh toán
                                        </div>
                                    </div>
                                </div>
                                <div class="statistic-event-box col-md-3 col-sm-3 col-xs-12">
                                    <div class="statictic-one statistic-event-icon">
                                        <span class="bold"> {{ $total_confirmed }} </span>
                                        <div class="statistic-text">
                                            Đã xác nhận
                                        </div>
                                    </div>
                                </div>
                                <div class="statistic-event-box col-md-3 col-sm-3 col-xs-12">
                                    <div class="statictic-one statistic-event-icon">
                                         <span class="bold"> {{ $total_checkout }} </span>
                                        <div class="statistic-text">
                                            Vé đã checkin
                                        </div>
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
