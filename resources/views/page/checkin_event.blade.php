@extends('layouts.main')
    @section('content')

    <div id="main" class="page-full-width sk-flex-display">
        <div class="wrap-schedule-list flex-col-right">
            <div class="navbar-main schedule-list">
                <div class="wrap-checkin container">
                    <form id="search-ticket" action="{{ route('checkin_event', $sukien->ID) }}" method="GET" enctype="multipart/form-data">
                        <h1 class="order-list-heading center-align bold  mt-20">CHECK-IN</h1>
                        <div id="ajax-box-search" class="checkin-search-ticket">
                            <p id="ajax-show-event-schedule">
                                <i class="fa fa-info-circle"></i>
                                {{ $sukien->TENSK }}<br>
                                <i class="fa fa-map-marker"></i>
                                {{ $sukien->THANHPHO }}, {{ $sukien->NGAYBATDAU }}
                                </p>

                            <div class="row">
                                <div class="search-aff-select col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group field-ajax-search-method required">
                                        <select id="ajax-search-method" class="form-control select2-hidden-accessible" name="search_ticket">
                                            <option value="1">Tim theo mã vé</option>
                                            <option value="2">Tim theo họ tên</option>
                                            <option value="3">Tim theo mobile</option>
                                            <option value="4">Tim theo loại vé</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="search-ticket-box col-md-5 col-sm-5">
                                    <div class="form-group field-ticket-search-keyword required">
                                        <input type="text" id="ticket-search-keyword" class="form-control" name="input_search" placeholder="Nhập thông tin tương ứng">
                                    </div>
                                </div>
                                <div class="search-ticket-text col-md-3 col-sm-3 right-align">
                                    <button type="submit" class="btn-search-ticket btn btn-success"><i class="fa fa-search"></i> Tìm vé</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="ajax-show-order-ticket">
                        <div class="wrap-search-ticket">
                            <p>Tìm thấy tổng số <strong>{{ $tong }}</strong> dữ liệu</p>
                            <div id="w0-pjax">
                                <div id="w0" class="grid-view hide-resize">
                                    <div id="w0-container" class="table-responsive kv-grid-container">
                                        <table class="kv-grid-table table table-bordered table-striped kv-table-wrap">
                                            <thead>
                                                <tr>
                                                    <th style="width: 2.89%;">#</th>
                                                    <th style="width: 5.7%; text-align: center;" data-col-seq="1"><a href="#">Mã vé</a></th>
                                                    <th style="width: 5.61%; text-align: center;" data-col-seq="2">Mã đơn</th>
                                                    <th style="width: 16.4%; text-align: center;" data-col-seq="3">Họ tên</th>
                                                    <th style="width: 11.84%; text-align: center;" data-col-seq="4">Mobile</th>
                                                    <th style="width: 15.79%; text-align: center;" data-col-seq="5">Loại vé</th>
                                                    <th style="width: 8.68%; text-align: center;" data-col-seq="6">Tổng tiền</th>
                                                    <th style="width: 10.79%; text-align: center;" data-col-seq="8"><a class="asc" href="#" data-sort="-CheckedIN">Check-in</a></th>
                                                    <th style="width: 10.88%; text-align: center;" data-col-seq="9">Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ve as $value)
                                                <tr>
                                                    <td style="vertical-align: inherit; width: 2%;">{{ $value->ID }}</td>
                                                    <td style="vertical-align: inherit; text-align: center;" data-col-seq="1">{{ $value->MAVE }}</td>
                                                    <td style="vertical-align: inherit; text-align: center;" data-col-seq="2"><a class="checin-order" href="/order/143">{{ $value->MADON }}</a></td>
                                                    <td style="vertical-align: inherit;" data-col-seq="3">{{ $value->HOTEN }}</td>
                                                    <td style="vertical-align: inherit;" data-col-seq="4">{{ $value->SDT }}</td>
                                                    <td style="vertical-align: inherit;" data-col-seq="5">{{ $value->TENVE }}</td>
                                                    <td style="s-align: inherit; text-align: center;" data-col-seq="6">
                                                        <span class="bold" id="tong_tien">{{ $value->TONGTIEN }}</span></td>
                                                    <td style="vertical-align: inherit;" data-col-seq="8">
                                                        <span id="check-in-no-168"><i class="fas fa-circle" style="padding-right: 5px;"></i>{{ $value->STATUS_CHECKOUT }}</span>
                                                    </td>
                                                    <td style="vertical-align: inherit; text-align: center;" data-col-seq="9">
                                                        <a id="checkin_ticket" href="{{ '/checkin/'.$value->ID_KHACH.'/'.$value->ID }}" title="Click để xác nhận checkin">Check-in</a>
                                                    </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
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

    @section('script')
    <script>
        var tongtien = document.querySelectorAll('span.bold');

        for(let i = 0; i < tongtien.length; i++) {
            tongtien[i].innerHTML = formatter.format(tongtien[i].textContent);
        };
    </script>
    @endsection
