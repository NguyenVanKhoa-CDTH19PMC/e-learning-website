<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Submit;
use App\Models\SubmitAttachment;
use Carbon\Carbon;
class SubmitController extends Controller
{
    public function create_submit(Request $req,$id){
       
        $user = Auth::user(); 
        

        //thêm 
        $submit=new Submit;
        $submit->user_id    =   $user->id;
        $submit->posts_id=   $id;
        $submit->save();
        
        if($req->hasfile('files'))
        
            {
                foreach($req->file('files') as $key => $file)
            {
                
                
            $ex=$file->extension();
            $file_name=$file->getClientOriginalName();
            $file_path=$file->storeAs('assets/submits/'.$submit->id,$file_name);
            
            $attachment=new SubmitAttachment;
            $attachment->submit_id=$submit->id;
            $attachment->attachment=$file_name;
            $attachment->save();
            }
            
            }

            return redirect()->back();
    }
    public function delete_submit($id){
        
        $submit=Submit::find($id);
              
              $submit->deleted_at=Carbon::now();
              $submit->save();
      
              $alert='Đã hủy bài nộp';
      
              return redirect()->back()->with('alert',$alert);
          }

          public function marking_submit($id, Request $req){
        
            $submit=Submit::find($id);
                  
                  $submit->scores=$req->scores;
                  $submit->save();
          
                  $alert='Đã chấm bài nộp này';
          
                  return redirect()->back()->with('alert',$alert);
              }
}
