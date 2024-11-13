<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use PhpParser\Node\Stmt\TryCatch;
// use App\Models\User;
// use Hash;

// class UserController extends Controller
// {
//     public function home()
//     {
//         if(Auth::check()){
//             $user = Auth::user();

//             if($user->role_id ===1){
//                 return view('user-home',['user'=>$user]);
//             }else{
//                 return redirect()->route('login')->withErrors(['msg'=>'Unauthorized access']);
//             }
//         }

//         return redirect()->route('login');
//     }

//     public function login(){
//         return view('login');
//     }
//     public function admin_login(){
//         return view('admin-login');
//     }
//     public function user_login(){
//         return view('admin-login');
//     }

//     public function postLogin(Request $request)
// {
//     // Xác thực người dùng
//     if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
//         $user = Auth::user();

//         // Kiểm tra role_id
//         if ($user->role_id == 1) {
//             return redirect()->route('admin-home'); // Chuyển hướng đến admin
//         } elseif ($user->role_id == 2) {
//             return redirect()->route('user-home'); // Chuyển hướng đến user
//         }
//     }

//     return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
// }

//     // băm pass
//     public function register(Request $request){
//         $request-> merge(['password']);
//         try {
//             User::create($request->all());
//         } catch (\Throwable $th){
//             dd($th);
//         }
//         dd($request->all());

//         return redirect()->route('login');
//     }

// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Hash;

class UserController extends Controller
{
    public function home()
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Chuyển hướng người dùng đến trang tương ứng dựa trên role_id
            if ($user->role_id === 1) {
                return view('admin-home', ['user' => $user]);
            } elseif ($user->role_id === 2) {
                return view('user-home', ['user' => $user]);
            } else {
                return redirect()->route('login')->withErrors(['msg' => 'Unauthorized access']);
            }
        }

        return redirect()->route('login');
    }

    public function login()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Đăng xuất người dùng

        // Chuyển hướng đến trang home
        return redirect('home');
    }

    public function postLogin(Request $request)
    {
        // Xác thực người dùng
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Kiểm tra role_id
            if ($user->role_id == 1) {
                return redirect()->route('admin-home'); // Chuyển hướng đến admin
            } elseif ($user->role_id == 2) {
                return redirect()->route('user-home'); // Chuyển hướng đến user
            }
        }

        return redirect()->back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
    }

    // Băm mật khẩu và lưu người dùng
    public function register(Request $request)
    {
        // Băm mật khẩu trước khi lưu
        $request->merge(['password']); 

        try {
            User::create($request->all());
        } catch (\Throwable $th) {
            dd($th);
        }

        return redirect()->route('login');
    }
}