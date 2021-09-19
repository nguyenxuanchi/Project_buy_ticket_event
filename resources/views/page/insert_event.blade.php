@extends('layouts.main')
    @section('content')

    @if (session('thongbao'))
    <div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
    @endif

    <div id="main" class="page-full-width sk-flex-display">
        <div class="wrap-schedule-list flex-col-right">
            <div class="navbar-main schedule-list">
                <form id="form-add-event" action="{{ $findIdUser->USERS_ID }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="wrap-add-event">
                        <div class="form-add-event container">
                            <h1 class="add-event-heading">Thêm sự kiện mới</h1>
                            <p class="add-event-heading"></p>
                            <!--PHẦN THÔNG TIN SỰ KIỆN-->
                            <div class="wrap-event-info">
                                <h2 class="event-info-text">
                                    <span class="event-info-order">1</span> Thông tin sự kiện
                                </h2>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group field-event-title">
                                            <label class="control-label" for="event-title">Tên sự kiện</label>
                                            <input type="text" id="event-title" class="form-control" name="tensk">
                                            <span style="color:red">@error('tensk'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group field-event-category_id required">
                                            <label class="control-label" for="event-category_id">Chọn chủ đề</label>
                                            <select id="event-category_id" class="form-control select2-hidden-accessible" name="chude">
                                                <option>Chọn chủ đề</option>
                                                @foreach ( $event_organizer_id as $key=>$value )
                                                <option value="{{ $key }}">{{ $value }}</option>
                                                @endforeach
                                            </select>
                                            <span style="color:red">@error('chude'){{ $message }}@enderror</span>
                                        </div>
                                        <select class="form-control " id="event-organizer_id" name="nhatochuc">
                                            <option value="">Chọn nhà tổ chức</option>
                                            <option value="admin">admin</option>
                                        </select>
                                        <span style="color:red">@error('nhatochuc'){{ $message }}@enderror</span>
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
                                                                <img id="Picture_small_URL"  style="width:100%;height:100%" src="/images/anh">
                                                            <i class="fa fa-image img-icon hide_icon" style="position: absolute;top: 46%;left: 45%;font-size: 40px;"></i>
                                                            </div>
                                                        </label>
                                                            <input type="file" style="display:none" id="event-picture-url-small" class="anh" name="anh" >
                                                       </div>
                                                   </div>
                                                </div>
                                            </div>
                                            <span style="color:red">@error('anh'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="form-group field-event-content required">
                                    <label class="control-label" for="event-content">Nội dung sự kiện</label>
                                    <span style="color:red">@error('noidungsk'){{ $message }}@enderror</span>
                                    <textarea id="event-content" class="form-control" name="noidungsk" rows="8" placeholder="" aria-required="true" style="visibility: hidden; display: none;"></textarea>
                                </div>
                                <div class="wrap-ticket-info">
                                    <h2 class="event-info-text">
                                        <span class="event-info-order">2</span>
                                         Thời gian và địa điểm
                                    </h2>
                                    <div class="ticket-info-content">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group field-schedule-city_id required">
                                                    <label class="control-label" for="schedule-city_id">Chọn tỉnh/thành phố</label>
                                                    <span style="color:red">@error('thanhpho'){{ $message }}@enderror</span>
                                                    <select class="form-control select2-hidden-accessible" id="schedule-city_id" name="thanhpho">
                                                        <option value="">Chọn tỉnh thành phố</option>
                                                        <option value="Hà Nội">Hà Nội</option>
                                                        <option value="Cao Bằng">Cao Bằng</option>
                                                        <option value="Bắc Ninh">Bắc Ninh</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group field-schedule-address required has-error">
                                                    <label class="control-label" for="schedule-address">Địa chỉ diễn ra sự kiện</label>
                                                    <span style="color:red">@error('diachi'){{ $message }}@enderror</span>
                                                    <input type="text" id="schedule-address" class="form-control" name="diachi">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group field-schedule-from_date required has-error">
                                                    <label class="control-label" for="schedule-from_date">Ngày bắt đầu</label>
                                                    <input class="form-control" type="date" name="ngaybatdau" value="" id="example-date-input">
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                <div class="form-group field-schedule-to_date required">
                                                    <label class="control-label" for="schedule-to_date">Ngày kết thúc</label>
                                                    <input class="form-control" type="date" name="ngayketthuc" value="" id="example-date-input">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--PHẦN TẠO VÉ-->
                            <div class="wrap-ticket-info">
                                <h2 class="event-info-text">
                                    <span class="event-info-order">3</span> Tạo vé
                                </h2>
                                <div class="ticket-info-content">
                                    <div class="row">
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group field-ticket-name required">
                                                <label class="control-label" for="ticket-name">Tên vé</label>
                                                <span style="color:red">@error('tenve'){{ $message }}@enderror</span>
                                                <input type="text" id="ticket-name" class="form-control" name="tenve" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group field-ticket-limits">
                                                <label class="control-label" for="ticket-limits">Số lượng [?]</label>
                                                <span style="color:red">@error('soluong'){{ $message }}@enderror</span>
                                                <input type="text" id="ticket-limits" class="form-control" name="soluong" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-sm-3 col-xs-6">
                                            <div class="form-group field-ticket-price-origin required">
                                                <label class="control-label" for="ticket-price-origin">Giá vé (vnđ)</label>
                                                <span style="color:red">@error('giave'){{ $message }}@enderror</span>
                                                <input type="text" id="ticket-price-origin" class="form-control" name="giave" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group field-ticket-description required">
                                        <textarea id="ticket-description" class="form-control" name="mota" rows="2" placeholder="Mô tả cho vé" required=""></textarea>
                                    </div>
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
                                        <input type="text" id="event-seo-title" class="form-control" name="seotieude" maxlength="100">
                                    </div>
                                    <div class="form-group field-event-seo-description">
                                        <label class="control-label" for="event-seo-description">Mô tả</label>
                                        <textarea id="event-seo-description" class="form-control" name="seomota" maxlength="200" placeholder=""></textarea>
                                    </div>
                                    <div class="form-group field-event-seo-title">
                                        <label class="control-label" for="event-seo-title">Từ khóa (các từ cách nhau bởi dấu phẩy ',' )</label>
                                        <input type="text" id="event-seo-title" class="form-control" name="seotukhoa">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-event-submit" style="margin-top: 20px;">
                            <button type="submit" class="btn-event-submit btn btn-success">
                                <i class="fa fa-plus"></i>
                                Thêm sự kiện
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection
