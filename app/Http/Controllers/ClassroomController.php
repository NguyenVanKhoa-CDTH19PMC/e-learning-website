<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Classroom;
use App\Models\User;
use App\Models\JoinedUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClassroomController extends Controller
{

    public function upload_grade_file(Request $req,$id) {
   
        $classroom = Classroom::find($id);
        if($req->hasfile('grade_file')){
        $file=$req->file('grade_file');
     
        $ex=$file->extension();
        $file_name=$classroom->id.'.'.$ex;
        $file_path=$file->storeAs('assets/grade_files/',$file_name);
        
        $classroom->grade_file=$file_name;
        $classroom->save();
       
        $alert='Đăng bảng điểm thành công';
        return redirect()->back()->with('alert',$alert);
        }
        $alert='Đăng bảng điểm thất bại';
        return redirect()->back()->with('alert',$alert);
 
    }
    public function delete_grade_file(Request $req,$id) {
   
        $classroom = Classroom::find($id);
        
        
        $classroom->grade_file=null;
        $classroom->save();
       
        $alert='Đã hủy bài nộp';

        return redirect()->back()->with('alert',$alert);
 
    }
    
    
    public function get_classroom($id) {
   
        $user = Auth::user();
        $classroom = Classroom::find($id);
       
        return view('user.classroom_detail',compact('user','classroom'));
 
    }
    public function delete_classroom($id) {
   
        $classroom = Classroom::find($id);
        $classroom->deleted_at=Carbon::now();
        $classroom->save();
        $joined_users= JoinedUsers::where('classroom_id',$id)->get();
        foreach($joined_users as $joined_user)
        {
            $joined_user->deleted_at=Carbon::now();
            $joined_user->save();
        }
        $posts=$classroom->Posts;
        foreach($posts as $post)
        {
            $post->deleted_at=Carbon::now();
            $post->save();
        }
        $alert='Đã xóa lớp này';

        return redirect()->route('home')->with('alert',$alert);
 
    }
    public function change_classroom_infor(Request $req,$id) {
   
        $classroom = Classroom::find($id);
        $classroom->name=$req->name;
        $classroom->subject=$req->subject;
        $classroom->save();
       
        $alert='Cập nhật thành công';

        return redirect()->back()->with('alert',$alert);
 
    }
    public function update_cover(Request $req,$id) {
   
        $classroom = Classroom::find($id);
        $image=$req->file('cover');
     
        $ex=$image->extension(); 
        $image_name=$classroom->id.'.'.$ex;
        $image_path=$image->storeAs('assets/images/covers',$image_name);
        
        $classroom->cover=$image_name;
        $classroom->save();
       
        $alert='Cập nhật thành công';

        return redirect()->back()->with('alert',$alert);
 
    }
    public function create_classroom(Request $req){
        $user = Auth::user();
        //thêm lớp


        
        $classroom=new Classroom;

        $classroom->name    =   $req->name;
        $classroom->subject=   $req->subject;
        $classroom->cover=   'cover_default.jpg';
        $classroom->code=substr(md5(mt_rand()), 0, 5);
        $classroom->save();
//tham gia vào lớp vs tư cách giáo viên
        $joinedUsers= new JoinedUsers;
        $joinedUsers->approved_at=Carbon::now();
        $joinedUsers->user_id =$user->id;
        $joinedUsers->classroom_id=$classroom->id;
        $joinedUsers->save();
      
        return redirect()->route('classroom',['id'=>$classroom->id]);
    } 
    
    public function join_classroom(Request $req){
        $user = Auth::user();
        $classroom=Classroom::where('code','=',Str::lower($req->code))->first();
       
      
//tham gia vào lớp vs tư cách hoc sinh
if($classroom == null)
{
    $alert='Không có lớp này';

    return redirect()->back()->with('alert',$alert);
}elseif($user->Classrooms->where('code',Str::lower($req->code))->first()!=null)
{

    $alert='Lớp đã tham gia rồi!';

    return redirect()->back()->with('alert',$alert);
}
else
{
$classroom_id=$classroom->id;
        $joinedUsers= new JoinedUsers;
        $joinedUsers->user_id =$user->id;
        $joinedUsers->classroom_id=$classroom_id;
        $joinedUsers->save();
      
        $alert='Đã gửi yêu cầu, đợi duyệt!';

    return redirect()->back()->with('alert',$alert);
    } 
}
function approve_join($c_id,$u_id){
    $joinedUser= JoinedUsers::where('user_id','=',$u_id)->where('classroom_id','=',$c_id)->first();
  
    $joinedUser->approved_at=Carbon::now();

    $joinedUser->save();
    $alert='Đã duyệt !';

    return redirect()->back()->with('alert',$alert);
}
function approve_join_all($c_id){
    $joinedUsers= JoinedUsers::where('classroom_id','=',$c_id)->where('approved_at','=',NULL)->get();
  foreach($joinedUsers as $joinedUser)
  {
    $joinedUser->approved_at=Carbon::now();
    $joinedUser->save();
  }
    

    
    $alert='Đã duyệt tất cả !';

    return redirect()->back()->with('alert',$alert);
}
function invite_join(Request $req,$id){
   $user=User::where('email','=',$req->email)->first();
   if($user==null)
   {
       
    $alert='Không có tài khoản nào dùng email đó ';

    return redirect()->back()->with('alert',$alert);
   }
  
   elseif(Classroom::find($id)->Students->where('email','=',$req->email)->first()!=null)
   {
       
    $alert='Tài khoản đã tham gia lớp rồi';

    return redirect()->back()->with('alert',$alert);
   }
   else
   {
    $joinedUsers= new JoinedUsers;
    $joinedUsers->classroom_id=$id;
    $joinedUsers->user_id=$user->id;
    $joinedUsers->approved_at=Carbon::now();
    $joinedUsers->save();
    $alert='Đã mời vào';
    return redirect()->back()->with('alert',$alert);
   }
} 


function exit_classroom($c_id,$u_id){
    
   //xóa thành viên khỏi lớp
    $joinedUser= JoinedUsers::where('user_id','=',$u_id)->where('classroom_id','=',$c_id)->first();
    $joinedUser->deleted_at=Carbon::now();
//xóa những bài post của thành viên trong lớp đó
    $posts=Classroom::find($c_id)->Posts->where('user_id','=',$u_id);
    foreach( $posts as $post)
    {
        
        $post->deleted_at=Carbon::now();
        $post->save();
    }
    //xóa những bài nop của thành viên trong lớp đó


    
    $joinedUser->save();

    return redirect()->route('home');
} 
}
