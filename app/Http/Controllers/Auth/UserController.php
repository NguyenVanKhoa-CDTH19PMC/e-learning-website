<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Illuminate\Support\Facades\DB; 
 
use Illuminate\Support\Facades\Mail; 

use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
class UserController extends Controller
{
    public function change_password(Request $request)
    {
        
        $request->validate([
            'password_retype' => 'required|min:8',
            'password_new' => 'required|min:8',
            'password_old' => 'required|min:8',
            ],[]);
        $user = Auth::user();
        $credentials =['email'=>$user->email, 'password'=>$request->password_old];
        if (!Auth::attempt($credentials)) 
        
        {
            $alert='Mật khẩu cũ không đúng';

    return redirect()->back()->with('alert',$alert);
        }
        elseif($request->password_new!=$request->password_retype)
        {
            $alert='Mật khẩu nhập lại không đúng';

            return redirect()->back()->with('alert',$alert);
        }
        else
        {
            $user->password=bcrypt($request->password_new);
            $user->save();
            $alert='Đã đổi mật khẩu';

            return redirect()->back()->with('alert',$alert);
        }
        
    }
    public function change_profile(Request $request)
    {
        
        // $request->validate([
        //     'password' => 'required|min:8'
        //     ]);
        $user = Auth::user();
        
        if(User::all()->where('email','<>',$user->email)->where('email','=',$request->email)->first()!=null)
        {
            $alert='Email đã có người dùng';

    return redirect()->back()->with('alert',$alert);
        }
        else
        {
            if($request->file('avatar')!=null)
            {
            $image=$request->file('avatar');
            $ex=$image->extension();
            $image_name=$user->id.'.'.$ex;
            $image_path=$image->storeAs('assets/images/avatars',$image_name);
            $user->avatar=$image_name;
            }
            $user->name=$request->name;
            $user->birthday=$request->birthday;
            $user->sex=$request->sex;
            $user->email=$request->email;
            $user->save();
            $alert='Đã đổi thông tin';

            return redirect()->back()->with('alert',$alert);
        }
        
    }

    public function create_user(Request $request)
    {
        // Kiểm tra dữ liệu nhập vào
		$request->validate([
            'email' => 'required|email',
            
            ]);
           
   if(User::all()->where('email',$request->email)->first()!=null)
   {
	   $a='Email đã có tài khoản!';

	   return redirect()->back()->with('alert',$a);
   }
   else{
$user=new User;

$user->name    =   $request->name;
$user->email=   $request->email;
$user->password= bcrypt("11111111");
$user->avatar="avatar_default.png";
$user->sex=$request->sex;
$user->birthday=$request->birthday;
$user->level=$request->level;
$user->save();
$a='Đăng ký thành công!';

    return redirect()->back()->with('alert',$a);
   }
    }


    public function delete_user($id){
        
        $user=User::find($id);
              
              $user->deleted_at=Carbon::now();
              $user->save();
      
              $alert='Đã xóa người dùng này!';
      
              return redirect()->back()->with('alert',$alert);
          }
          public function backup_user($id){
        
            $user=User::find($id);
                  
                  $user->deleted_at=null;
                  $user->save();
          
                  $alert='Đã khôi phục người dùng này!';
          
                  return redirect()->back()->with('alert',$alert);
              }

              public function user($id){
        
                $user=User::find($id);
                      
                      
              
                return view('admin.user_detail',compact('user'));
                  }


                  public function update_user(Request $request,$id){
                    if ($request->getMethod() == 'GET') {
                        $user=User::find($id);
                        return view('admin.user.update_infor',compact('user'));
                    }
                    $user=User::find($id);
                    if(User::all()->where('email','<>',$user->email)->where('email','=',$request->email)->first()!=null)
                    {
                        $alert='Email đã có người dùng';
            
                return redirect()->back()->with('alert',$alert);
                    }
                    else
                    {
                        
                        $user->name=$request->name;
                        $user->birthday=$request->birthday;
                        $user->sex=$request->sex;
                        $user->email=$request->email;
                        $user->save();
                        $alert='Đã đổi thông tin';
            
                        return redirect()->back()->with('alert',$alert);
                    }
                      }

                      public function reset_password($id){
        
                        $user=User::find($id);
                              
                              $user->password=bcrypt("11111111");
                              $user->save();
                      
                              $alert='Đã đặt lại mật khẩu của người dùng này!';
                      
                              return redirect()->back()->with('alert',$alert);
                          }
                          


                          
                  /////////////////
                  public function showForgetPasswordForm()
      {if (Auth::check()) 
        return redirect()->route('home');
         return view('auth.forgetPassword');
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {if (Auth::check()) 
        return redirect()->route('home');
          $request->validate([
              'email' => 'required|email|exists:users',
          ],[
            'exists' => 'Email này chưa đăng kí tài khoản',
          
        ]);
         
            
          $token = Str::random(64);
  
          DB::table('password_resets')->insert([
              'email' => $request->email, 
              'token' => $token, 
              'created_at' => Carbon::now()
            ]);
          Mail::send('auth.forgotPassword', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });
  
          return back()->with('message', 'Yêu câu đã được gửi đến mail này!');
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { if (Auth::check()) 
        return redirect()->route('home');
         return view('auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {if (Auth::check()) 
        return redirect()->route('home');
          $request->validate([
              'password' => 'required|min:8',
              'password_retype' => 'required|min:8'
          ]);
          if($request->password_retype!= $request->password)
          {
              $alert='Mật khẩu nhập lại không khớp';
  
      return redirect()->back()->withInput()->with('alert',$alert);
          }
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'Token không hợp lệ!');
          }
  
          $user = User::where('email', $updatePassword->email)
                      ->update(['password' => Hash::make($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $updatePassword->email])->delete();
  
          return redirect('/login')->with('alert', 'Mật khẩu của bạn đã được thay đổi!');
      }
}
