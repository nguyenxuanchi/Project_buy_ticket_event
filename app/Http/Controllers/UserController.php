<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function getDanhSach ()
    {
        $user = User::all();
        return view ('admin.user.danhsach', ['user'=>$user]);
    }

    public function getThem ()
    {
        return view ('admin.user.them');
    }

    public function postThem (Request $request)
    {
        $this->validate($request,
        [
            'hoten' => 'required|min:3|max:100|unique:User,hoten'
        ],
        [
            'hoten.require' => 'Bạn chưa nhập tên thể loại',
            'hoten.min' => 'Tên thể loại có độ dài từ 3 đến 100 ký tự',
            'hoten.max' => 'Tên thể loại có độ dài từ 3 đến 100 ký tự'
        ]);

        $user = new User();
        $user->HOTEN = $request->hoten;
        $user->USERNAME = $request->username;
        $user->EMAIL = $request->email;
        $user->SDT = $request->sdt;
        $user->DIACHI = $request->diachi;
        $user->save();

        return redirect('admin/user/them')->with('thongbao', 'Them thanh cong');
    }

    public function getSua ($id)
    {
        $user = User::find($id);

        return view ('admin.user.sua', ['user'=>$user]);
    }

    public function postSua (Request $request, $id)
    {

        $affected = DB::table('user')
              ->where('ID', $id)
              ->update( [
                'HOTEN' => $request['hoten'],
                'USERNAME' => $request['username'],
                'EMAIL' => $request['email'],
                'SDT' => $request['sdt'],
                'DIACHI' => $request['diachi']
                 ]);

        return redirect('admin/user/sua/'.$id)->with('thongbao', 'Sua thanh cong');
    }

    public function getXoa($id)
    {
        DB::table('user')->where('ID', $id)->delete();

        return redirect('admin/user/danhsach')->with('thongbao', 'Xoa thanh cong');
    }
}
