<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\Console\Input\Input;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function checkLogin(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            Auth::logoutOtherDevices($password);
            $email = User::find(DB::table('users')->where('email', $email)->value('id'))->toArray();
            session()->put($email);
            if (Auth::user()->status == 0) {
                Auth::logout();
                return redirect(route('login'))->with('alert', 'Tài khoản chưa kích hoạt !');
            } elseif (Auth::user()->status == 2) {
                Auth::logout();
                return redirect(route('login'))->with('alert', 'Tài khoản đã bị khóa !');
            }
            return redirect(route('home'));
        } else {
            return redirect(route('login'))->with('alert', 'Sai Tài Khoản Hoặc Mật Khẩu!');
        }
    }
    public function register()
    {
        return view('register');
    }
    public function checkRegister(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);
        $token = Str::random(20);
        $data = $request->only('name_users', 'email', 'password', 'sex_users', 'created_at_time_users', 'address_users', 'phone_users', 'id_dpms');
        $password_check = bcrypt($request->password);
        $data['password'] = $password_check;
        $data['token'] = $token;
        $user = User::where('email',  $request->input('email'))->count();
        if ($user > 0) {
            return redirect(route('register'))->with('alert', 'Đã tồn tại Email. Vui lòng kiểm tra lại !');
        } else {
            if ($users = User::create($data)) {
                Mail::send('mail.active_account', compact('users'), function ($email) use ($users) {
                    $email->subject('My account - xác nhận tài khoản');
                    $email->to($users->email, $users->name_users);
                });
                return redirect(route('login'))->with('success', 'Đăng ký thành công! Vui lòng kiểm tra gmail');
            }
        }
        return redirect()->back();
    }
    public function actived(Request $request)
    {
        // dd($request->all('id'));
        $token = $request->all('token');
        if ($request->all('token') === $token) {
            User::where('id', $request->all('id'))->update(['status' => 1, 'token' => null]);
            return redirect()->route('login')->with('success', 'Tài khoản đã được kích hoạt! Hãy đăng nhập');
        } else {
            return redirect()->route('login')->with('alert', 'Mã xác thực lỗi! Tài khoản chưa được kích hoạt');
        }
    }
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect(route('login'));
    }
}