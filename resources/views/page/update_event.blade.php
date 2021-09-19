@extends('layouts.main')
    @section('content')

    @if (session('thongbao'))
    <div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
    @endif

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
        <div class="wrap-schedule-list flex-col-right">
            <div class="navbar-main schedule-list">
                <form id="form-add-event" action="{{ $sukien->ID }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="wrap-add-event">
                        <div class="form-add-event container">
                            <h1 class="add-event-heading">Cập nhật sự kiện</h1>
                            <p class="add-event-heading">Khóa học Marketing Online</p>
                            <!--PHẦN THÔNG TIN SỰ KIỆN-->
                            <div class="wrap-event-info">
                                <h2 class="event-info-text">
                                    <span class="event-info-order">1</span> Thông tin sự kiện
                                </h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group field-event-title">
                                            <label class="control-label" for="event-title">Tên sự kiện</label>
                                            <input type="text" id="event-title" class="form-control" name="tensk" value="{{ $sukien->TENSK }}" placeholder="">

                                            <div class="help-block"></div>
                                        </div>
                                        <div class="form-group field-event-category_id required">
                                            <label class="control-label" for="event-category_id">Chọn chủ đề</label>
                                            <select id="event-category_id" class="form-control select2-hidden-accessible" name="chude">
                                                <option value="{{ $sukien->CHUDE }}">{{ $sukien->CHUDE }}</option>
                                                @foreach ( $event_organizer_id as $key=>$value )
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>

                                            <div class="help-block"></div>
                                        </div>
                                        <select class="form-control " id="event-organizer_id" name="nhatochuc">
                                            <option value="{{ $sukien->NHATOCHUC }}">Chọn nhà tổ chức</option>
                                            <option value="admin">admin</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group field-event-picture-url-small has-success">
                                            <label class="control-label" for="event-picture-url-small">Ảnh đại diện (800x400)</label>
                                            <div class="file-input file-input-new">
                                                <div class="input-group file-caption-main">
                                                   <div class="file-caption-name" title=""></div>
                                                    </div>
                                                   <div class="">
                                                       <div>
                                                       <label for="event-picture-url-small" style="width:100%">
                                                            <div class="preview" style="width:100%;height:200px; border:1px solid #d6d5d5;position: relative;cursor:pointer">
                                                                <img id="Picture_small_URL"  style="width:100%;height:100%" src="/images/{{ $sukien->ANH }}">
                                                            <i class="fa fa-image img-icon hide_icon" style="position: absolute;top: 48%;left: 50%;font-size: 40px;"></i>
                                                            </div>
                                                        </label>
                                                            <input type="file" style="display:none" id="event-picture-url-small" class="" name="anh" accept="image/*" data-krajee-fileinput="fileinput_56816031" aria-invalid="false">
                                                       </div>
                                                   </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="form-group field-event-content required">
                                    <label class="control-label" for="event-content">Nội dung sự kiện</label>
                                    <textarea id="event-content" class="form-control" name="noidungsk" rows="8" placeholder="" aria-required="true" style="visibility: hidden; display: none;">{{ $sukien->NOIDUNGSK }}</textarea>
                                </div>
                            </div>
                            <!--PHẦN MÔ TẢ SEO-->
                            <div class="wrap-event-seo">
                                <h2 class="event-info-text">
                                    <span class="event-info-order">4</span> Cài đặt SEO
                                </h2>
                                <div class="event-seo-content">
                                    <div class="form-group field-event-seo-title">
                                        <label class="control-label" for="event-seo-title">Tiêu đề</label>
                                        <input type="text" id="event-seo-title" class="form-control" name="seotieude" value="{{ $sukien->SEOTIEUDE }}" maxlength="100" placeholder="Mặc định tạo ra từ tên sự kiện nếu không nhập">
                                    </div>
                                    <div class="form-group field-event-seo-description">
                                        <label class="control-label" for="event-seo-description">Mô tả</label>
                                        <textarea id="event-seo-description" class="form-control" name="seomota" maxlength="200" placeholder="">{{ $sukien->SEOMOTA }}</textarea>
                                    </div>
                                    <div class="form-group field-event-seo-title">
                                        <label class="control-label" for="event-seo-title">Từ khóa (các từ cách nhau bởi dấu phẩy ',' )</label>
                                        <input type="text" id="event-seo-title" class="form-control" name="seotukhoa" value="{{  $sukien->SEOTUKHOA  }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-event-submit" style="margin-top: 20px;">
                            <button type="submit" class="btn-event-submit btn btn-success">
                                <i class="fa fa-save"></i>
                                Cập nhật
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
    @endsection
