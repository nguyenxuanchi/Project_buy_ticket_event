<?php

namespace App\Http\Controllers;

use App\Models\SuKien;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;

class HomeController extends Controller
{

    public function trangchu(Request $request) {

        $event2 = DB::select("SELECT ID, ANH FROM sukien GROUP BY id ORDER BY id desc LIMIT 2,1");

        $event1 = DB::select("SELECT ID, ANH FROM sukien GROUP BY id ORDER BY id desc LIMIT 1,1");

        $event = DB::table('sukien')->select('sukien.ID', 'sukien.ANH')
        ->orderByDesc('sukien.ID')
        ->limit(1)->first();

        $sukien = DB::table('sukien')
        ->select('sukien.ID', 'sukien.TENSK', 'sukien.ANH',
                DB::raw('DATE_FORMAT(sukien.NGAYBATDAU, "%d-%m-%Y") as NGAYBATDAU'),
                'sukien.THANHPHO', DB::raw('MIN(ve.GIAVE) as GIAVE'))
        ->leftJoin('ve', 'sukien.ID', '=', 've.SUKIEN_ID')
        ->groupBy('sukien.ID')
        ->get();

        $id = $request->session()->get('user_id');
        $hoten = $request->session()->get('user_hoten');

        return view('page.trangchu', [
            'sukien'=> $sukien,
            'id'    => $id,
            'hoten' => $hoten,
            'event' => $event,
            'event1'=> $event1,
            'event2'=> $event2
        ]);
    }

    public function login() {
        return view('page.login');
    }

    public function logout(Request $request) {
        $request->session()->forget('user_id');
        $request->session()->forget('user_hoten');

        return redirect('/');
    }

    public function register() {
        return view('page.register');
    }

    public function store(Request $request) {

        $request->validate([
            'hoten'=>['required', 'string', 'max:50'],
            'email'=>['required', 'string', 'email', 'max:255', 'unique:user,email'],
            'sdt'=>['required', 'string', 'min:10', 'unique:user,sdt'],
            'matkhau'=>['required', 'string' ,'same:nlmatkhau'],
            'nlmatkhau'=>['required','string','same:matkhau'],
        ]);

        $result = DB::table('user')->insert([
            'hoten'=>$request->input('hoten'),
            'email'=>$request->input('email'),
            'sdt'=>$request->input('sdt'),
            'matkhau'=>$request->input('matkhau')
        ]);

        if($result) {
            return back()->with('success', 'Data have successfuly inserted');
        }else{
            return back()->with('fail', 'Something went wrong');
        }
    }

    public function check(Request $request)
    {
        $request->validate([
            'email'=>['required', 'string', 'email', 'max:255'],
            'matkhau'=>['required', 'string'],
        ]);

        $email = $request->input('email');
        $matkhau = $request->input('matkhau');

        $result = DB::table('user')
        ->where('email',$email)
        ->where('matkhau',$matkhau)
        ->first();

        if(isset($result)) {
            $request->session()->put('user_id', $result->ID);
            $request->session()->put('user_hoten', $result->HOTEN);

            return redirect()->route('trangchu');
        } else {

            return back()->with('fail', 'Something went wrong');
        }
    }

    public function getEmail()
    {
        return view('page.forgot_password');
    }

    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        //   DB::table('user')->insert(
        //       ['email' => $request->email]
        //   );

          Mail::send('customauth.verify', function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password Notification');
          });

          return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('page.profile', ['user'=> $user]);
    }

    public function update(Request $request, $id)
    {
        $user = DB::table('user');

        if ($request->hasFile('picture')){
            $filename = $request->picture->getClientOriginalName();
            $request->picture->move('images', $filename);

            $user
            ->where('ID', $id)
            ->update( [
            'HOTEN' => $request['hoten'],
            'USERNAME' => $request['username'],
            'EMAIL' => $request['email'],
            'SDT' => $request['sdt'],
            'DIACHI' => $request['diachi'],
            'PICTURE' =>  $filename
            ]);

           return redirect('profile/'.$id)->with('thongbao', 'Lưu thành công');
        } else if(isset($user)) {
            $user
            ->where('ID', $id)
            ->update( [
            'HOTEN' => $request['hoten'],
            'USERNAME' => $request['username'],
            'EMAIL' => $request['email'],
            'SDT' => $request['sdt'],
            'DIACHI' => $request['diachi']
            ]);
            return redirect('profile/'.$id)->with('thongbao', 'Lưu thành công');
        }
        else
        {
            return redirect('profile/'.$id)->with('thongbao', 'Không thể lưu profile');
        }
    }

    public function nav () {
        return view('layouts.nav');
    }

    //Google
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user_email = Socialite::driver('google')->user();

        $user = new User();
        $user->HOTEN = $user_email->name;
        $user->EMAIL = $user_email->email;
        $user->PROVIDER_ID = $user_email->id;
        $user->SDT = "123";
        $user->MATKHAU = "123";
        $user->save();

        return redirect('/');
    }

     //Facebook
     public function redirectToFacebook()
     {
         return Socialite::driver('facebook')->redirect();
     }

     public function handleFacebookCallback()
     {
        $user_facebook = Socialite::driver('facebook')->user();

        $user = new User();
        $user->HOTEN = $user_facebook->name;
        $user->EMAIL = $user_facebook->email;
        $user->PROVIDER_ID = $user_facebook->id;
        $user->SDT = "123";
        $user->MATKHAU = "123";
        $user->save();

        return redirect('/');
     }

}
