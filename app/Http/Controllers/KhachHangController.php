<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\KhachHangVe;
use App\Models\SuKien;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhachHangController extends Controller
{
    public function getThem($id)
    {
        $sukien = SuKien::select(DB::raw('DATE_FORMAT(sukien.NGAYBATDAU, "%d-%m-%Y") as NGAYBATDAU'), 'THANHPHO', 'TENSK','ID')->
        where('sukien.ID',$id)->first();
        $ve = Ve::where('SUKIEN_ID', $id)->get();
        return view('page.checkout_ticket', [
            'sukien'=>$sukien,
            've'=>$ve
            ]);
    }

    public function postThem(Request $request, $id)
    {
        $request->validate([
            'hoten'=>['required', 'string'],
            'sdt'=>['required'],
            'email'=>['required', 'string', 'email', 'max:255'],
            'thoigian'=>['required', 'string'],
            'soluong'=>['required', 'int', 'min:1'],
        ]);

        $ve = Ve::where('SUKIEN_ID', $id)->first();

        $khachhang = new KhachHang();

        $tongtien = $request->giave * $request->soluong;

        if(isset($khachhang)) {
        $khachhang->HOTEN = $request->hoten;
        $khachhang->SDT = $request->sdt;
        $khachhang->EMAIL = $request->email;
        $khachhang->THOIGIAN = $request->thoigian;
        $khachhang->SOLUONG = $request->soluong;
        $khachhang->TONGTIEN = $tongtien;

        if($khachhang->save())
        {
            $khve = new KhachHangVe();
            $khve->ID_KHACHHANG = $khachhang->id;
            $khve->ID_VE = $ve->ID;
            $khve->STATUS_CHECKOUT = 'Chưa Checkin';
            $khve->STATUS_PAYMENT = 'Chưa Thanh toán';
            $khve->save();
        }
        return back()->with('success', 'Data have successfuly inserted');
      } else {
        return back()->with('fail', 'Something went wrong');
      }
    }
}
