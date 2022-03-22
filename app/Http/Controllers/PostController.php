<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\User\Classroom\ClassroomController;
use Illuminate\Support\Facades\Auth;
use App\Models\Classroom;
use App\Models\JoinedUsers;
use App\Models\Posts;
use App\Models\Comments;
use App\Models\Attachments;
use Carbon\Carbon;
class PostController extends Controller
{
    public function create_post(Request $req,$id){
       
        $user = Auth::user();
        

        //thêm 
        $post=new Posts;
        $post->title    =   $req->title;
        $post->description=   $req->description;
        $post->type=$req->type??'thông báo';
        $post->deadline= $req->deadline??null;
        $post->classroom_id=$id;
        $post->user_id= $user->id;
        $post->save();
        
        if($req->hasfile('files'))
        
            {
                foreach($req->file('files') as $key => $file)
            {
                
                
            $ex=$file->extension();
            $file_name=$file->getClientOriginalName();
            $file_path=$file->storeAs('assets/attachments/'.$post->id,$file_name);
            
            $attachment=new Attachments;
            $attachment->posts_id=$post->id;
            $attachment->attachment=$file_name;
            $attachment->save();
            }
            
            }

      if($post->type=='thông báo')
      return redirect()->back();

        return redirect()->route('post_detail',['id'=>$post->id]);
    }
    
    public function update_post(Request $req,$id){
       
        $user = Auth::user();
        

        
        $post=Posts::find($id);
        $post->title    =   $req->title;
        $post->description=   $req->description;
        $post->type=$req->type??'thông báo';
        $post->deadline= $req->deadline??null;
        $post->save();
        
        


        return redirect()->route('post_detail',['id'=>$post->id]);
    }
    public function post_detail($id){
       
    
        $post= Posts::find($id);
        
      
        return view('user.post-detail',compact('post'));
    }
    public function post($id){
       
    
        $post= Posts::find($id);
        
      
        return view('admin.post_detail',compact('post'));
    }
    public function delete_post($id){
        
  $post=Posts::find($id);
        
        $post->deleted_at=Carbon::now();
        $post->save();

        $alert='Đã xóa bài';

        return redirect()->route('home')->with('alert',$alert);
    }
    public function clone_post(Request $req,$id){
        
        $post_old=Posts::find($id);
              //thêm 
        $post=new Posts;
        $post->title    =   $post_old->title;
        $post->description=   $post_old->description;
        $post->type=$post_old->type;
        $post->deadline= $post_old->deadline??null;
        $post->classroom_id= $req->class_id;
        $post->user_id= $post_old->user_id;
        $post->save();
        $attachments=Attachments::where('posts_id',$post_old->id)->get();
        if($attachments!=null)
        
            {
             
                foreach($attachments as $at)
            {  
                copy('assets/attachments/'.$at->posts_id.'/'.$at->attachment,'assets/attachments/'.$post->id);
           
            
            $attachment=new Attachments;
            $attachment->posts_id=$post->id;
            $attachment->attachment=$at->attachment;
            $attachment->save();
            }
            
            }

            $alert='Đã chuyển tiếp';

            

        return redirect()->route('post_detail',['id'=>$post->id])->with('alert',$alert);

        }



}
