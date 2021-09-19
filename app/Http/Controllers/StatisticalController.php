<?php

namespace App\Http\Controllers;

use App\Models\KhachHangVe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalController extends Controller
{
    public function statistical($id)
    {
        $total_order = KhachHangVe::leftJoin('ve', 'khachhang_ve.ID_VE', '=', 've.ID')
        ->leftJoin('khachhang', 'khachhang_ve.ID_KHACHHANG', '=', 'khachhang.ID')
        ->where('ve.SUKIEN_ID', $id)
        ->count('khachhang_ve.ID_KHACHHANG');

        $total_checkout = KhachHangVe::leftJoin('ve', 'khachhang_ve.ID_VE', '=', 've.ID')
        ->leftJoin('khachhang', 'khachhang_ve.ID_KHACHHANG', '=', 'khachhang.ID')
        ->where('ve.SUKIEN_ID', $id)
        ->where('khachhang_ve.STATUS_CHECKOUT', 'Đã Checkout')
        ->count('khachhang_ve.STATUS_CHECKOUT');

        $total_confirmed = KhachHangVe::leftJoin('ve', 'khachhang_ve.ID_VE', '=', 've.ID')
        ->leftJoin('khachhang', 'khachhang_ve.ID_KHACHHANG', '=', 'khachhang.ID')
        ->where('ve.SUKIEN_ID', $id)
        ->where('khachhang_ve.STATUS', '2')
        ->count('khachhang_ve.STATUS');

        $total_pay = KhachHangVe::leftJoin('ve', 'khachhang_ve.ID_VE', '=', 've.ID')
        ->leftJoin('khachhang', 'khachhang_ve.ID_KHACHHANG', '=', 'khachhang.ID')
        ->where('ve.SUKIEN_ID', $id)
        ->where('khachhang_ve.STATUS_PAYMENT', 'Đã Thanh Toán')
        ->count('khachhang_ve.STATUS_PAYMENT');

        $findIdEvent  = DB::table('ve')->where('SUKIEN_ID', $id)->first();

        return view('page.statistical', [
            'total_order'=>$total_order,
            'total_checkout'=>$total_checkout,
            'total_confirmed'=>$total_confirmed,
            'total_pay'=>$total_pay,
            'findIdEvent'=>$findIdEvent
            ]);
    }
}
