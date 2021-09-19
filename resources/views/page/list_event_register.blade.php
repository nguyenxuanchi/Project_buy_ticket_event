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
                                    <a href="/edit_event/{{ $sukien->ID }}">
                                        <i class="fa fa-pencil fa-lg icon_nav" aria-hidden="true"></i>
                                        <span>Thông tin</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/schedule/{{ $sukien->ID }}">
                                        <i class="fa fa-calendar icon_nav"></i>
                                        <span>Lịch</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/show_ticket/{{ $sukien->ID }}">
                                        <i class="fa fa-ticket icon_nav"></i>
                                        <span>Loại vé</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/list_event_register?masukien={{ $sukien->ID }}">
                                        <i class="fa fa-server icon_nav" aria-hidden="true"></i>
                                        <span>Đăng ký</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/statistical/{{ $sukien->ID }}">
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
                        <form id="w0" action="{{ route('list_event_register') }}" method="GET"
                            enctype="multipart/form-data">
                            <div class=" wrap-order-list mt-20">
                                <h1 class="order-list-heading center-align">Danh sách đăng ký</h1>
                                <div class="order-list-search">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="checkin-name-event">
                                                <label>Chọn mạng</label>
                                                <select name="masukien" id="ajax-search-method"
                                                    class="form-control select2-hidden-accessible">
                                                    @foreach ($events as $value)
                                                        <option value="{{ $value->ID }}">{{ $value->TENSK }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group field-order-order_created_begin">
                                                        <label class="control-label" for="order-order_created_begin">Từ
                                                            ngày</label>
                                                        <div id="order-order_created_begin-kvdate" class="input-group date">
                                                            <input class="form-control" type="date" name="ngaybatdau"
                                                                value="" id="example-date-input">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group field-order-order_created_end">
                                                        <label class="control-label" for="order-order_created_end">Đến
                                                            ngày</label>
                                                        <div id="order-order_created_end-kvdate" class="input-group date">
                                                            <input class="form-control" type="date" name="ngayketthuc"
                                                                value="" id="example-date-input">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="wrap-btn-search-order">
                                    <button type="submit" class="btn-order-search btn btn-success"
                                        name="filter_register_ticket"><i class="fa fa-search"></i> Lọc dữ liệu</button>
                                </p>
                                <div class="row row-wrap-order-filter">
                                    <div class="col-md-7 col-sm-8 col-xs-12"></div>
                                    <div class="col-md-5 col-sm-4 col-xs-12 align-right">
                                        <a class="btn-add-manual btn btn-info"
                                            href="{{ route('getcheckout_ticket', $sukien->ID) }}"><i
                                                class="fa fa-plus"></i> Thêm đăng ký</a>
                                        <a class="btn-add-manual btn btn-success" href="statistical/{{ $sukien->ID }}"
                                            target="_blank"><i class="fa fa-plus"></i> Thống kê</a>
                                    </div>
                                    <div id="w5" class="grid-view hide-resize">
                                        <div class="w5-container" class="table-responsive kv-grid-container">
                                            <table class="kv-grid-table table table-bordered table-striped kv-table-wrap">
                                                <thead>
                                                    <tr>
                                                        <th style="width: 2.54%;">#</th>
                                                        <th style="text-align: center; width: 6.39%;" data-col-seq="1">
                                                            <a href="">Mã đơn</a>
                                                        </th>
                                                        <th>
                                                            <a href="">Họ tên</a>
                                                        </th>
                                                        <th>
                                                            <a href="">Mobile</a>
                                                        </th>
                                                        <th>
                                                            <a href="">Vé</a>
                                                        </th>
                                                        <th style="">
                                                            <a href="">Thu KH</a>
                                                        </th>
                                                        <th>
                                                            <a href="">Trạng thái</a>
                                                        </th>
                                                        <th>
                                                            <a href="">Thanh toán</a>
                                                        </th>
                                                    </tr>
                                                    <tr id="w5-filters" class="filters skip-export">
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <input type="text" class="form-control" name="search_madon">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="search_hoten">
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="search_mobile">
                                                        </td>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <select class="form-control" name="Order[Process_status]">
                                                                <option value=""></option>
                                                                @foreach ($process_status as $key => $value)
                                                                    <option value="{{ $key }}">{{ $value }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="Order[Payment_status]">
                                                                <option value=""></option>
                                                                @foreach ($payment_status as $key => $value)
                                                                    <option value="{{ $key }}">{{ $value }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($ve as $value)
                                                        <tr data-key="143">
                                                            <td style="text-align: center; vertical-align: middle;">
                                                                {{ $value->ID }}</td>
                                                            <td style="text-align: center; vertical-align: inherit;"
                                                                data-col-seq="1">{{ $value->MADON }}</td>
                                                            <td style="vertical-align: inherit;" data-col-seq="2">
                                                                {{ $value->HOTEN }}</td>
                                                            <td style="vertical-align: inherit;" data-col-seq="3">
                                                                {{ $value->SDT }}</td>
                                                            <td style="vertical-align: inherit; text-align: center; class: order-ticket;"
                                                                data-col-seq="5">{{ $value->SOLUONG }}</td>
                                                            <td style="vertical-align: inherit; text-align: center;"
                                                                data-col-seq="6">
                                                                <span class="bold" id="thu_kh">{{ $value->TONGTIEN }}</span>
                                                            </td>
                                                            <td style="text-align: center; vertical-align: inherit;"
                                                                data-col-seq="7">
                                                                <select id="w9"
                                                                    class="ajax-process-status form-control select2-hidden-accessible w9"
                                                                    name="p_status">
                                                                    <option value="" selected="">Đổi trạng thái ...</option>
                                                                    <option value="0" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Mới
                                                                    </option>
                                                                    <option value="1" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Đang xử lý
                                                                    </option>
                                                                    <option value="2" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Đã xác nhận
                                                                    </option>
                                                                    <option value="5" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Đã tham dự
                                                                    </option>
                                                                    <option value="4" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Đã hủy
                                                                    </option>
                                                                    <option value="6" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Đã hoàn tiền
                                                                    </option>
                                                                    <option value="7" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Đã hoàn đơn
                                                                    </option>
                                                                    <option value="8" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Đã xóa
                                                                    </option>
                                                                    <option value="3" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Đã giao vé
                                                                    </option>
                                                                    <option value="9" data-idkhach="{{ $value->ID_KHACH }}" data-id="{{ $value->ID }}">
                                                                            Chuyển lịch sau
                                                                    </option>
                                                                </select>
                                                            </td>
                                                            <td style="text-align: center; vertical-align: inherit;">
                                                                {{ $value->STATUS_PAYMENT }}</td>
                                                        </tr>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    $('.w9').on('change', function(e) {
        val = $(this).val();
        idkhach = $(this).find(':selected').data('idkhach')
        id = $(this).find(':selected').data('id')

        let link_status = '/payment_status/' + idkhach + '/' + id + '/?p_status=' + val;
        window.open(link_status, "_self");
    })

    var thu_kh = document.querySelectorAll('span.bold');

    for(let i = 0; i < thu_kh.length; i++) {
        thu_kh[i].innerHTML = formatter.format(thu_kh[i].textContent);
    };
</script>
@endsection
