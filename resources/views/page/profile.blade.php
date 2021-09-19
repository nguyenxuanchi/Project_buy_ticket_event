@extends('layouts.main')
    @section('content')

    @if (session('thongbao'))
    <div class="alert alert-success">
        {{ session('thongbao') }}
    </div>
    @endif
            <div class="wrap-site">
                <form action="{{ $user->ID }}" method="POST" id="form-profile" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="wrap-add-event">
                        <div class="container">
                            <h3 class="add-event-heading">Cập nhật hồ sơ</h3>
                            <div class="row form_profile">
                                <div class="col-md-12 col-md-offset-3">
                                    <div class="form-group">
                                        <div class="form-input">
                                            <div class="avater-cs text-center">
                                                <div class="preview">
                                                    <div class="form-group field-user-avatar">
                                                        <label class="control-label" for="user-avatar">Ảnh đại diện (max 2Mb)</label>
                                                        <div class="file-input">
                                                            <img id="Picture_small_URL" src="/images/{{ $user->PICTURE }}" style="width: 150px;" alt="">
                                                        </div>
                                                        <div class="file-input">
                                                            <input type="file" id="myfile" name="picture" value="{{ $user->PICTURE }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <strong>ID: {{ $user->ID }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group field-user-fullname required">
                                            <label for="user-fullname" class="control-label">Họ tên</label>
                                            <input type="text" id="user-fullname" class="form-control" name="hoten"
                                            placeholder="Nhập họ tên của bạn" value="{{ $user->HOTEN }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group field-user-fullname required">
                                            <label for="user-fullname" class="control-label">Username</label>
                                            <input type="text" id="user-fullname" class="form-control" name="username"
                                            placeholder="Username của bạn" value="{{ $user->USERNAME }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group field-user-fullname required">
                                            <label for="user-fullname" class="control-label">Email</label>
                                            <input type="text" id="user-fullname" class="form-control" name="email"
                                            placeholder="Email đăng nhập" value="{{ $user->EMAIL }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group field-user-fullname required">
                                            <label for="user-fullname" class="control-label">Điện thoại</label>
                                            <input type="text" id="user-fullname" class="form-control" name="sdt"
                                            placeholder="Số điện thoại sử dụng trên hệ thống" value="{{ $user->SDT }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group field-user-fullname required">
                                            <label for="user-fullname" class="control-label">Địa chỉ</label>
                                            <input type="text" id="user-fullname" class="form-control" name="diachi"
                                            placeholder="Địa chỉ của bạn" value="{{ $user->DIACHI }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary" style="padding: 6px 10px;">
                                            <i class="far fa-save"></i>
                                            Lưu
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
               </form>
            </div>
    @endsection
