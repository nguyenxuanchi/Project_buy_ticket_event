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
                                    <a href="">
                                        <i class="fa fa-pencil fa-lg icon_nav" aria-hidden="true"></i>
                                        <span>Thông tin</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="">
                                        <i class="fa fa-calendar icon_nav"></i>
                                        <span>Lịch</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="">
                                        <i class="fa fa-ticket icon_nav"></i>
                                        <span>Loại vé</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="">
                                        <i class="fa fa-server icon_nav" aria-hidden="true"></i>
                                        <span>Đăng ký</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="">
                                        <i class="fa fa-chart-line icon_nav" aria-hidden="true"></i>
                                        <span>Thống kê</span>
                                    </a>
                                </li>
                                <li class="panel panel-default">
                                    <a href="">
                                        <i class="fa fa-user-plus icon_nav"></i>
                                        <span>Users</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>

                </div>
                <div class="col-sm-10 col-md-10">
                    <div class="navbar-main schedule-list">
                        <div class="navbar-main schedule-list">
                            <div class="wrap-event-user">
                                <div class="role-wrap-heading">
                                    <h1 class="role-heading order-list-heading" style="margin-bottom: 20px">Phân quyền truy cập sự kiện
                                    </h1>
                                    <span class="role-add-new">
                                    </span>
                                </div>
                                <table class="form-group">
                                    <tbody>
                                        <tr>
                                            <td style="width:400px">
                                                <p><b>Quản lý</b> Có đầy đủ các quyền, thêm / bớt </p>
                                                <p><b>Quản lý sự kiện</b> Sửa nội dung sự kiện</p>
                                            </td>
                                            <td>
                                                <p><b>Quản lý Thống kê</b> Xem thống kê</p>
                                                <p><b>Quản lý vé</b> Thêm bớt vé</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <form id="w0" action="/event/permission/create?id=54" method="post">
                                    <div class="row col-md-12">
                                        <div class="col-md-6 form-group field-event-title field-event email-field" style="padding: 0px;">
                                            <input type="text" id="event-title" class="form-control" name="EventUser[Email]"
                                                placeholder="Nhập email của user cần phân quyền" aria-invalid="false">
                                        </div>
                                        <div class="col-md-3 form-group field-eventuser-role_id">
                                            <select id="eventuser-role_id" class="form-control " name="EventUser[Role_ID]">
                                                <option value="">Chọn quyền</option>
                                                <option value="0">Quản lý</option>
                                                <option value="1">Nội dung</option>
                                                <option value="2">Sale</option>
                                                <option value="5">Check in</option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 event-user-btn old">
                                            <button type="submit" class="btn-event-user btn btn-success"><i
                                                    class="fa fa-save"></i> Lưu quyền</button>
                                        </div>
                                    </div>
                                </form>
                                <div id="w0" class="grid-view">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th><a href="/event/permission?id=54&amp;sort=Fullname"
                                                        data-sort="Fullname">Họ tên</a></th>
                                                <th><a href="/event/permission?id=54&amp;sort=Email"
                                                        data-sort="Email">Email</a></th>
                                                <th style="text-align: center; width: 15%;"><a
                                                        href="/event/permission?id=54&amp;sort=Role_ID"
                                                        data-sort="Role_ID">Quyền</a></th>
                                                <th style="text-align: center; width: 15%;">Ngày tạo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr data-key="2825">
                                                <td>1</td>
                                                <td style="vertical-align: inherit;">adminn</td>
                                                <td style="vertical-align: inherit;">admin@gmail.com</td>
                                                <td style="text-align: center; vertical-align: inherit;">Quản lý</td>
                                                <td style="text-align: center; vertical-align: inherit;">19-05-2021 08:26
                                                </td>
                                            </tr>
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
@endsection
