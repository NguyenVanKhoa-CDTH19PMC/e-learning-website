<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Session;
use App\Models\User;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::check()) 
        return redirect()->route('home');
        if ($request->getMethod() == 'GET') {
            return view('auth.login');
        }
        // Kiểm tra dữ liệu nhập vào
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            ],[
                'email.required' => 'Chưa nhập tên email',
                'email.email' => 'Chỉ nhập email',
                'password.required' => 'Chưa nhập mật khẩu',
            ]);

            $credentials = $request->only('email', 'password');
           if(User::whereNull('deleted_at')->where('email',$request->email)->first()==null)
           {
            
            $alert='Tài khoản đã bị khóa vì lý do vi phạm';

            return redirect()->back()->with('alert',$alert);
            
           }
        // Kiểm tra đúng email và mật khẩu sẽ chuyển trang
        if (Auth::attempt($credentials)) {
           
            
            return redirect()->route('home');
      

        } else {
                        
                $alert='Sai mật khẩu hoặc email!';

                return redirect()->back()->withInput()->with('alert',$alert);

        }
    }






    
    
}