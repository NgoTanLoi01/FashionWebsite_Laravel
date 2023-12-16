<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mockery\Matcher\HasKey;
use Illuminate\Support\Facades\Hash;
use App\Models\User as ModelsUser;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // public function login(){
    //     return view('login');
    // }
    public function login()
    {
        return view('login');
    }
    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        // Kiểm tra xác nhận mật khẩu
        if ($request->password !== $request->password_confirmation) {
            // Mật khẩu và xác nhận mật khẩu không khớp, bạn có thể xử lý lỗi ở đây
            return redirect()->back()->with('password', 'Xác nhận mật khẩu không trùng khớp!');
        }

        // Kiểm tra xem địa chỉ email đã tồn tại trong cơ sở dữ liệu hay chưa
        if (ModelsUser::where('email', $request->email)->exists()) {
            // Địa chỉ email đã tồn tại, xử lý lỗi và thông báo người dùng
            return redirect()->back()->with('email', 'Địa chỉ email đã tồn tại!');
        }

        // Mã hóa mật khẩu và cập nhật giá trị trong request
        $request->merge(['password' => Hash::make($request->password)]);

        try {
            // Sử dụng ModelsUser để tạo một bản ghi mới
            ModelsUser::create($request->all());
        } catch (\Throwable $th) {
            dd($th);
        }

        // Đăng ký thành công, chuyển hướng đến trang đăng nhập
        return redirect()->route('login');
    }

    // public function postLogin(Request $request)
    // {
    //     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    //         return redirect()->route('home');
    //     } else {
    //         return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu sai cmnr');
    //     }
    // }
    public function postLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home.index');
        } else {
            return redirect()->back()->with('error', 'Tên đăng nhập hoặc mật khẩu không đúng!');
        }
    }
    public function logout(Request $request)
    {   
        Auth::logout();
        return redirect()->back();
    }
}
