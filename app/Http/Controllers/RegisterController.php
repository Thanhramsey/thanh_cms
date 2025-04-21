<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    /**
     * Hiển thị form đăng ký.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Xử lý yêu cầu đăng ký của người dùng.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Debug Step 1: Kiểm tra dữ liệu request


        // Xác thực dữ liệu đầu vào
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Thêm rule cho name
            'email' => 'required|email|unique:users',
            'password' => ['required', 'confirmed', Password::min(4)],
            'terms' => 'required|accepted',
        ]);

        // Debug Step 2: Kiểm tra kết quả xác thực
        if ($validator->fails()) {
            dd($validator->errors()); // Xem các lỗi xác thực
            return back()->withErrors($validator)->withInput();
        }

        // Tạo người dùng mới
        $user = User::create([
            'name' => $request->name, // Thêm name
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Debug Step 3: Kiểm tra người dùng vừa tạo
        // dd($user);

        // Đăng nhập người dùng sau khi đăng ký (tùy chọn)
        Auth::login($user);

        // Debug Step 4: Kiểm tra trạng thái đăng nhập sau khi gọi Auth::login()
        dump(Auth::check()); // Hiển thị true nếu đã đăng nhập
        dump(Auth::user());  // Hiển thị thông tin người dùng đã đăng nhập
        // dump(session()->all()); // Xem toàn bộ session (có thể chứa thông tin user)

        // Chuyển hướng người dùng sau khi đăng ký thành công
        return redirect('/dashboard');
    }
}