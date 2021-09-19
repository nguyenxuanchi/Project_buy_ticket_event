<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\KhachHangVe;
use App\Models\SuKien;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VeController extends Controller
{
    public function getListTicket($id)
    {
        $listTicket = DB::table('ve')->where('SUKIEN_ID', $id)->get();

        $findIdTicket  = DB::table('ve')->where('SUKIEN_ID', $id)->first();

        return view('page.show_ticket', ['ve'=>$listTicket, 'findId'=>$findIdTicket]);
    }

    public function getTicket($id)
    {
        $findIdTicket  = DB::table('ve')->where('SUKIEN_ID', $id)->first();
        return view('page.insert_ticket', ['findId'=>$findIdTicket]);
    }

    public function postTicket(Request $request, $id)
    {


        if ($request->tenve == null || $request->soluong == null || $request->giave == null || $request->trangthai == null || $request->mota == null) {
            return redirect('insert_ticket/'.$id)->with('fail', 'Data have not inserted');
        } else {
            $ve = new Ve();
            $ve->TENVE = $request->tenve;
            $ve->SOLUONG = $request->soluong;
            $ve->GIAVE = $request->giave;
            $ve->TRANGTHAI = $request->trangthai;
            $ve->MOTA = $request->mota;
            $ve->SUKIEN_ID = $id;

            if($ve->save())
            {
             $khve = new KhachHangVe();
             $khve->ID_VE= $ve->id;
             $khve->save();
            }
            return redirect('insert_ticket/'.$id)->with('success', 'Data have successfuly inserted');
        }

    }

    public function getCheckIn(Request $request, $id_khachhang, $id)
    {

        $khachhang_ve = DB::table('khachhang_ve')
            ->where([
                ['ID_KHACHHANG', $id_khachhang],
                ['ID', $id],
                ])
            ->update(['STATUS_CHECKOUT' => 'Đã Checkout']);
        return back();
    }

    public function getUpdateTicket($id)
    {
        $ve = DB::table('ve')->where('SUKIEN_ID', $id)->orWhere('ID', $id)->first();
        return view('page.update_ticket', ['ve'=>$ve]);
    }

    public function postUpdateTicket(Request $request, $id)
    {
        $ve = DB::table('ve')
        ->where('ID', $id)
        ->update( [
            'TENVE' => $request['tenve'],
            'MOTA' => $request['mota'],
            'GIAVE' => $request['giave'],
            'SOLUONG' => $request['soluong'],
            'TRANGTHAI' => $request['trangthai']
            ]);

        return redirect('update_ticket/'.$id);
    }

    public function getListSuKien(Request $request, $id)
    {
        $search_ticket = $request->search_ticket;

        $sukien = SuKien::select(
            'ID', 'TENSK', 'THANHPHO',
            DB::raw('DATE_FORMAT(sukien.NGAYBATDAU, "%d-%m-%Y") as NGAYBATDAU'))->
        where('ID', $id)->first();

        $checkinve = KhachHangVe::leftJoin('ve', 'khachhang_ve.ID_VE', '=', 've.ID')
        ->leftJoin('khachhang', 'khachhang_ve.ID_KHACHHANG', '=', 'khachhang.ID')
        ->select( 'khachhang_ve.ID','khachhang.ID as ID_KHACH'
        ,'khachhang_ve.STATUS_CHECKOUT',
        'khachhang.HOTEN', 'khachhang.SDT', 'khachhang.TONGTIEN',
        've.MAVE', 've.MADON', 've.TENVE')
        ->where('ve.SUKIEN_ID', $id);

        switch ($search_ticket) {
            case '1':
                $ve = $checkinve
                ->where('ve.MAVE',$request->input_search)
                ->get();
                break;
            case '2':
                $ve = $checkinve
                ->where('khachhang.HOTEN',$request->input_search)
                ->get();
                break;
            case '3':
                $ve = $checkinve
                ->where('khachhang.SDT',$request->input_search)
                ->get();
                break;
            case '4':
                $ve =  $checkinve
                ->where('ve.TENVE',$request->input_search)
                ->get();
                break;
            default:
                $ve = $checkinve->get();
                break;
        }

        $tong = DB::table('khachhang_ve')
        ->leftJoin('ve', 'khachhang_ve.ID_VE', '=', 've.ID')
        ->where('ve.SUKIEN_ID',$id)->count();

        return view('page.checkin_event', [
        'sukien'=>$sukien,
        've'=>$ve,
         'tong'=>$tong
        ]);
    }

    public function PaymentStatus(Request $request, $id_khachhang, $id)
    {

        $payment_status = $request->p_status;

        $khachhang_ve = DB::table('khachhang_ve')
            ->where([
                ['ID_KHACHHANG', $id_khachhang],
                ['ID', $id],
                ]);

            switch ($payment_status) {
                case '0':
                    $khachhang_ve
                    ->update(['STATUS' => '0']);
                    break;
                case '1':
                    $khachhang_ve
                    ->update(['STATUS' => '1']);
                    break;
                case '2':
                    $khachhang_ve
                    ->update(['STATUS' => '2']);
                    break;
                case '3':
                    $khachhang_ve
                    ->update(['STATUS' => '3']);
                    break;
                case '4':
                    $khachhang_ve
                    ->update(['STATUS' => '4']);
                    break;
                case '5':
                    $khachhang_ve
                    ->update(['STATUS' => '5']);
                    break;
                case '6':
                    $khachhang_ve
                    ->update(['STATUS' => '6']);
                    break;
                case '7':
                    $khachhang_ve
                    ->update(['STATUS' => '7']);
                    break;
                case '8':
                    $khachhang_ve
                    ->update(['STATUS' => '8']);
                    break;
                case '9':
                    $khachhang_ve
                    ->update(['STATUS' => '9']);
                    break;
                default:
                    $khachhang_ve
                    ->update(['STATUS' => ' ']);
                    break;
            }
        return back();
    }

    public function filterListTicket(Request $request)
    {
        $process_status = array(
            "0" => "Mới",
            "1" => "Đang xử lý",
            "2" => "Đã xác nhận",
            "3" => "Đã tham dự",
            "4" => "Đã hủy",
            "5" => "Đã hoàn tiền",
            "6" => "Đã hoàn đơn",
            "7" => "Đã xóa",
            "8" => "Đã giao vé",
            "9"=> "Chuyển lịch sau"
        );

        $payment_status = array(
            "0" => "Chưa thanh toán",
            "1" => "Đã thanh toán",
            "2" => "Đã đặt cọc",
            "3" => "Miễn phí",
            "4" => "Đã hoàn tiền"
        );

        $search_madon = $request->search_madon;
        $search_hoten = $request->search_hoten;
        $search_mobile = $request->search_mobile;
        $search_ngaybatdau = $request->ngaybatdau;
        $search_ngayketthuc = $request->ngayketthuc;

        if(!$request->masukien) {
            return redirect('/');
        }

        $id = $request->masukien;

        $sukien = DB::table('sukien')
        ->where('ID', $id)
        ->first();

        $events = SuKien::all();

        $checkinve = KhachHangVe::leftJoin('ve', 'khachhang_ve.ID_VE', '=', 've.ID')
        ->leftJoin('khachhang', 'khachhang_ve.ID_KHACHHANG', '=', 'khachhang.ID')
        ->select( 'khachhang_ve.ID','khachhang.ID as ID_KHACH'
        ,'khachhang_ve.STATUS','khachhang_ve.STATUS_PAYMENT',
        'khachhang.HOTEN', 'khachhang.THOIGIAN', 'khachhang.SDT', 'khachhang.TONGTIEN',
        'khachhang.SOLUONG', 've.MADON', 've.TENVE')
        ->where('ve.SUKIEN_ID', $id);

        if($search_madon == null){
           $ve = $checkinve
            ->get();
        } else {
            $ve = $checkinve
            ->where('ve.MADON',$request->search_madon)
            ->get();
        }

        if($search_hoten == null){
            $ve = $checkinve
            ->get();
        } else {
            $ve = $checkinve
            ->where('khachhang.HOTEN', $request->search_hoten)
            ->get();
        }

        if($search_mobile == null){
            $ve = $checkinve
            ->get();
        } else {
            $ve = $checkinve
            ->where('khachhang.SDT', $request->search_mobile)
            ->get();
        }

        if($search_ngaybatdau == null){
            $ve = $checkinve
            ->get();
        } else {
            $ve = $checkinve
            ->where('khachhang.THOIGIAN', $request->ngaybatdau)
            ->get();
        }

        if($search_ngayketthuc == null){
            $ve = $checkinve
            ->get();
        } else {
            $ve = $checkinve
            ->where('khachhang.THOIGIAN', $request->ngayketthuc)
            ->get();
        }

        return view('page.list_event_register', [
            'sukien'=> $sukien,
            've'=>$ve,
            'events'=>$events,
            'process_status'=>$process_status,
            'payment_status'=>$payment_status
            ]);
    }
}
