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
                                    <a href="/edit_event/{{ $findId->SUKIEN_ID }}">
                                        <i class="fa fa-pencil fa-lg icon_nav" aria-hidden="true"></i>
                                        <span>Thông tin</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/schedule/{{ $findId->SUKIEN_ID }}">
                                        <i class="fa fa-calendar icon_nav"></i>
                                        <span>Lịch</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/show_ticket/{{ $findId->SUKIEN_ID }}">
                                        <i class="fa fa-ticket icon_nav"></i>
                                        <span>Loại vé</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/list_event_register?masukien={{ $findId->SUKIEN_ID }}">
                                        <i class="fa fa-server icon_nav" aria-hidden="true"></i>
                                        <span>Đăng ký</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="/statistical/{{ $findId->SUKIEN_ID }}">
                                        <i class="fa fa-chart-line icon_nav" aria-hidden="true"></i>
                                        <span>Thống kê</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                   </div>
                   <div class="col-sm-10 col-md-10">
                        <div class="wrap-schedule-list flex-col-right">
                            <div class="navbar-main schedule-list">
                                <div>
                                    <div class="schedule-list-event row">
                                        <div class="col-md-10 col-sm-10 col-xs-8">
                                           <h3>Loại vé</h3>
                                        </div>
                                        <div class="col-md-2 col-sm-2 col-xs-4 right-align mt-20">
                                         <a href="{{ route('insert_ticket', $findId->SUKIEN_ID)}}" class="btn btn-success"><i class="fa fa-plus"></i> Thêm vé</a></div>
                                    </div>
                                    <div id="w0" class="grid-view">
                                        <table class="table table-striped table-bordered">
                                         <thead>
                                             <tr>
                                                 <th>ID</th>
                                                 <th>Tên vé</th>
                                                 <th>Mô tả</th>
                                                 <th>Giá bán</th>
                                                 <th style="text-align: center;">Số lượng</th>
                                                 <th style="text-align: center;">Trạng thái</th>
                                                 <th style="text-align: center;">&nbsp;</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             @foreach ( $ve as $value )
                                             <tr data-key="2579">
                                                 <td>{{ $value->ID }}</td>
                                                 <td>{{ $value->TENVE }}</td>
                                                 <td>{{ $value->MOTA }}</td>
                                                 <td>
                                                     <p>
                                                         <span class="bold" id="gia_ban">{{ $value->GIAVE }}</span>
                                                     </p>
                                                 </td>
                                                 <td style="text-align: center;">{{ $value->SOLUONG }}</td>
                                                 <td style="text-align: center;">{{ $value->TRANGTHAI }}</td>
                                                 <td style="text-align: center;">
                                                     <a href="{{ route('show_update_ticket', $value->ID)}}" title="Sửa vé">
                                                         <span class="fa fa-edit"></span>
                                                      </a>
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
    @endsection

    @section('script')
    <script>
        var gia_ban = document.querySelectorAll('span.bold');

        for(let i = 0; i < gia_ban.length; i++) {
            gia_ban[i].innerHTML = formatter.format(gia_ban[i].textContent);
        };
    </script>
    @endsection
