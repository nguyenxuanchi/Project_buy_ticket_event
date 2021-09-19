<?php

namespace App\Http\Controllers;

use App\Models\SuKien;
use App\Models\User;
use App\Models\Ve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuKienController extends Controller
{
    public function getDanhSach ($id)
    {
        $sukien = DB::table('sukien')
            ->rightJoin('user', 'sukien.USERS_ID', '=', 'user.ID')
            ->select('sukien.ID','sukien.TENSK', 'sukien.ANH', 'sukien.THANHPHO', 'sukien.NGAYBATDAU','sukien.NOIDUNGSK')
            ->where('sukien.USERS_ID', $id)->get();

        $findIdUser  = DB::table('sukien')->where('USERS_ID', $id)->first();

        return view ('page.event_of_me', ['sukien'=>$sukien, 'findIdUser'=> $findIdUser]);
    }

    public function getDetailEvent ($id) {

        $sukien = DB::table('sukien')
            ->leftJoin('ve', 'sukien.ID', '=', 've.ID')
            ->select('sukien.ID','sukien.TENSK', 'sukien.ANH', 'sukien.THANHPHO', DB::raw('DATE_FORMAT(sukien.NGAYBATDAU, "%d-%m-%Y") as NGAYBATDAU'), 'sukien.NOIDUNGSK', 've.GIAVE', 've.TENVE')
            ->where('sukien.ID', $id)->get();

        return view('page.detail_event', ['sukien'=>$sukien]);

    }

    public function getThem ($id)
    {
        $event_organizer_id = array(
            "Hội Thảo" => "Hội Thảo",
            "Khoá Học" => "Khoá Học",
            "Triển Lãm" => "Triển Lãm",
            "Live Show" => "Live Show",
            "Sự Kiện" => "Sự Kiện",
            "Khác" => "Khác"
        );

        $findIdUser  = DB::table('sukien')->where('USERS_ID', $id)->first();

        return view('page.insert_event', ['event_organizer_id'=>$event_organizer_id, 'findIdUser'=> $findIdUser]);
    }

    public function postThem (Request $request, $id)
    {
        $request->validate([
            'tensk'=>['required', 'string', 'max:40'],
            'chude'=>['required', 'string', 'max:30'],
            'nhatochuc'=>['required', 'string', 'max:40'],
            'anh'=>['required'],
            'noidungsk'=>['required'],
            'thanhpho'=>['required', 'string', 'max:40'],
            'diachi'=>['required', 'string', 'max:40'],
            'ngaybatdau'=>['required'],
            'ngayketthuc'=>['required'],
            'tenve'=>['required'],
            'soluong'=>['required'],
            'giave'=>['required'],
            'mota'=>['required'],
        ]);

        $ve = new Ve();
        $sukien = new SuKien();

        if ($request->hasFile('anh')){
        $filename = $request->anh->getClientOriginalName();
        $request->anh->move('images', $filename);

        $sukien->TENSK = $request->tensk;
        $sukien->CHUDE = $request->chude;
        $sukien->NHATOCHUC = $request->nhatochuc;
        $sukien->ANH = $filename;
        $sukien->NOIDUNGSK = $request->noidungsk;
        $sukien->THANHPHO = $request->thanhpho;
        $sukien->DIACHI = $request->diachi;
        $sukien->NGAYBATDAU = $request->ngaybatdau;
        $sukien->NGAYKETTHUC = $request->ngayketthuc;
        $sukien->SEOTIEUDE = $request->seotieude;
        $sukien->SEOMOTA = $request->seomota;
        $sukien->SEOTUKHOA = $request->seotukhoa;
        $sukien->USERS_ID = $id;

        if($sukien->save()){

            $ve->TENVE = $request->tenve;
            $ve->SOLUONG = $request->soluong;
            $ve->GIAVE = $request->giave;
            $ve->MOTA = $request->mota;
            $ve->SUKIEN_ID = $sukien->id;

            $ve->save();
        }

        return redirect('insert_event/'.$id)->with('thongbao', 'Lưu thành công');
        }

        return 'that bai';
    }

    public function getSua ($id)
    {
        $event_organizer_id = array(
            "Hội Thảo" => "Hội Thảo",
            "Khoá Học" => "Khoá Học",
            "Triển Lãm" => "Triển Lãm",
            "Live Show" => "Live Show",
            "Sự Kiện" => "Sự Kiện",
            "Khác" => "Khác"
        );

        $sukien = SuKien::find($id);

        return view('page.update_event', ['sukien'=>$sukien, 'event_organizer_id'=>$event_organizer_id]);
    }

    public function postSua (Request $request, $id)
    {
        $sukien = DB::table('sukien');

        if ($request->hasFile('anh')){
            $filename = $request->anh->getClientOriginalName();
            $request->anh->move('images', $filename);

            $sukien
            ->where('ID', $id)
            ->update( [
            'TENSK' => $request['tensk'],
            'CHUDE' => $request['chude'],
            'NHATOCHUC' => $request['nhatochuc'],
            'NOIDUNGSK' => $request['noidungsk'],
            'ANH' =>  $filename,
            'SEOTIEUDE' => $request['seotieude'],
            'SEOMOTA' => $request['seomota'],
            'SEOTUKHOA' => $request['seotukhoa']
            ]);

            return redirect('edit_event/'.$id)->with('thongbao', 'Lưu thành công');
        }
        else{
            $sukien
            ->where('ID', $id)
            ->update( [
            'TENSK' => $request['tensk'],
            'CHUDE' => $request['chude'],
            'NHATOCHUC' => $request['nhatochuc'],
            'NOIDUNGSK' => $request['noidungsk'],
            'SEOTIEUDE' => $request['seotieude'],
            'SEOMOTA' => $request['seomota'],
            'SEOTUKHOA' => $request['seotukhoa']
            ]);

            return redirect('edit_event/'.$id)->with('thongbao', 'Lưu thành công');
        }

            return redirect('edit_event/'.$id);
    }

    public function schedule($id)
    {
        $get_schedule_event  = SuKien::
        select(DB::raw('DATE_FORMAT(sukien.NGAYBATDAU, "%d-%m-%Y") as NGAYBATDAU'),
        DB::raw('DATE_FORMAT(sukien.NGAYKETTHUC, "%d-%m-%Y") as NGAYKETTHUC'),
        'THANHPHO', 'DIACHI', 'ID', 'NHATOCHUC')
        ->where('ID', $id)->get();

        $findIdEvent  = DB::table('sukien')->where('ID', $id)->first();

        return view('page.schedule', ['schedule_event' => $get_schedule_event, 'findIdEvent'=>$findIdEvent]);
    }

    public function permission()
    {
        return view('page.permission');
    }
}
