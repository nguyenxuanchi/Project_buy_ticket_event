@extends('layouts.main')
    @section('content')
       <div id="main" class="page-full-width sk-flex-display">
           <div class="container-fuilt">
               <div class="row">
                   <div class="col-sm-12 col-md-12">
                       <form id="form_update" action="{{ $ve->ID }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="wrap-ticket-info">
                            <h2 style="text-align: center">
                                 Cập nhật vé
                            </h2>
                            <div class="ticket-info-content">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group field-ticket-name required">
                                            <label class="control-label" for="ticket-name">Tên vé</label>
                                            <input type="text" id="ticket-name" class="form-control" name="tenve"  value="{{ $ve->TENVE }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group field-ticket-limits">
                                            <label class="control-label" for="ticket-limits">Số lượng [?]</label>
                                            <input type="text" id="ticket-limits" class="form-control" name="soluong" value="{{ $ve->SOLUONG }}" >
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group field-ticket-price-origin required">
                                            <label class="control-label" for="ticket-price-origin">Giá vé (vnđ)</label>
                                            <input type="text" id="ticket-price-origin" class="form-control" name="giave" value="{{ $ve->GIAVE }}">
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-6">
                                        <div class="form-group field-ticket-price-origin required">
                                            <label class="control-label" for="ticket-price-origin">Trạng thái vé</label>
                                            <select class="form-control" name="trangthai">
                                                <option value="{{ $ve->TRANGTHAI }}">{{ $ve->TRANGTHAI }}</option>
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
                                    <textarea id="ticket-description" class="form-control" name="mota" rows="2" placeholder="Mô tả cho vé" required="">
                                        {{ $ve->MOTA }}
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-event-submit">
                            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Cập nhật</button></div>
                         </div>
                       </div>
                       </form>
           </div>
       </div>
    @endsection
