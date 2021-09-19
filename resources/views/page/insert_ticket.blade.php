@extends('layouts.main')
    @section('content')

       <div id="main" class="page-full-width sk-flex-display">
           <div class="container-fuilt">
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
               <div class="row">
                <div class="col-sm-2 col-md-2">
                    <nav class="navbar navbar-default border-radius-none">
                        <div class="side-menu-container">
                            <ul class="nav navbar-nav menu_new">
                                <li class="panel panel-default">
                                    <a href="{{ route('edit_event', $findId->SUKIEN_ID) }}">
                                        <i class="fa fa-pencil fa-lg icon_nav" aria-hidden="true"></i>
                                        <span>Thông tin</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/schedule/{{$findId->SUKIEN_ID}}">
                                        <i class="fa fa-calendar icon_nav"></i>
                                        <span>Lịch</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/show_ticket/{{$findId->SUKIEN_ID}}">
                                        <i class="fa fa-ticket icon_nav"></i>
                                        <span>Loại vé</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/list_event_register?masukien={{$findId->SUKIEN_ID}}">
                                        <i class="fa fa-server icon_nav" aria-hidden="true"></i>
                                        <span>Đăng ký</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/statistical/{{$findId->SUKIEN_ID}}">
                                        <i class="fa fa-chart-line icon_nav" aria-hidden="true"></i>
                                        <span>Thống kê</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>

                   <div class="col-sm-10 col-md-10">
                        <form action="{{$findId->SUKIEN_ID}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="wrap-ticket-info">
                            <h2 style="text-align: center">
                                 Thêm vé
                            </h2>
                            <div class="ticket-info-content">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group field-ticket-name required">
                                            <label class="control-label" for="ticket-name">Tên vé</label>
                                            <input type="text" id="ticket-name" class="form-control" name="tenve" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group field-ticket-limits">
                                            <label class="control-label" for="ticket-limits">Số lượng [?]</label>
                                            <input type="text" id="ticket-limits" class="form-control" name="soluong" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group field-ticket-price-origin required">
                                            <label class="control-label" for="ticket-price-origin">Giá vé (vnđ)</label>
                                            <input type="text" id="ticket-price-origin" class="form-control" name="giave" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group field-ticket-price-origin required">
                                            <label class="control-label" for="ticket-price-origin">Trạng thái vé</label>
                                            <select class="form-control" name="trangthai">
                                                <option value="Mở bán online">Mở bán online</option>
                                                <option value="Ngưng bán online">Ngưng bán online</option>
                                                <option value="Vé chưa mở bán">Vé chưa mở bán</option>
                                                <option value="Hết vé">Hết vé</option>
                                                <option value="Liên hệ nhà tổ chức">Liên hệ nhà tổ chức</option>
                                                <option value="Ẩn trên Web">Ẩn trên Web</option>
                                              </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group field-ticket-description required">

                                    <textarea id="ticket-description" class="form-control" name="mota" rows="2" placeholder="Mô tả cho vé" required=""></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-event-submit">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Lưu lại</button>        </div>
                         </div>
                        </form>
                    </div>

           </div>
       </div>
    @endsection
