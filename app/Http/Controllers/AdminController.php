<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail; 
class AdminController extends Controller
{
     // public function index()
    // {
    //     $user = Auth::guard('admin')->user();
    //     echo 'Xin chào Admin, '. $user->name;
    // }

    public function index()
    {
        // //chưa đăng nhập
        // if (!Auth::check()) 
        // return redirect()->route('login');
$users=User::orderBy("id","DESC")->get();     
        $classrooms=Classroom::orderBy("id","DESC")->get();
        $posts=Posts::orderBy("id","DESC")->get();
        return view('admin.index',compact('users','classrooms','posts'));
    }
    public function get_classroom($id) {
   
        $user = Auth::user();
        $classroom = Classroom::find($id);
       
        return view('admin.classroom_detail',compact('user','classroom'));
 
    }
    
    public function send_mail_to_user($id)
    {$user=User::find($id);
        
        $email=$user->email;
        
          Mail::send('auth.report_user',['name'=>$user->name], function($message) use($email){
           
              $message->to($email);
              $message->subject('Thông báo vi phạm!');
          });
          $alert='Đã gửi cảnh báo';

          return redirect()->back()->with('alert',$alert);
    }
    public function send_mail_to_classroom($id)
    {$classroom=Classroom::find($id);
      $user=  $classroom->Teachers->first();
        $email=$user->email;
        
          Mail::send('auth.report_classroom',['name'=>$user->name,'classroom'=>$classroom->name], function($message) use($email){
           
              $message->to($email);
              $message->subject('Thông báo vi phạm!');
          });
          $alert='Đã gửi cảnh báo';

          return redirect()->back()->with('alert',$alert);
    }
    public function send_mail_to_post($id)
    {
        $post=Posts::find($id);
        $classroom=Classroom::find($post->classroom_id);
      $user=  $post->User;
        $email=$user->email;
        
          Mail::send('auth.report_post',['name'=>$user->name,'classroom'=>$classroom->name,'post'=>$post->title], function($message) use($email){
           
              $message->to($email);
              $message->subject('Thông báo vi phạm!');
          });
          $alert='Đã gửi cảnh báo';

          return redirect()->back()->with('alert',$alert);
    }
    public function send_mail_to_grade($id)
    {
        
      $classroom=Classroom::find($id);
      $user=  $classroom->Teachers->first();
        $email=$user->email;
        
          Mail::send('auth.report_grade',['name'=>$user->name,'classroom'=>$classroom->name], function($message) use($email){
           
              $message->to($email);
              $message->subject('Thông báo vi phạm!');
          });
          $alert='Đã gửi cảnh báo';

          return redirect()->back()->with('alert',$alert);
    }
}
