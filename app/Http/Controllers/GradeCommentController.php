<?php

namespace App\Http\Controllers;
use App\Models\GradeComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class GradeCommentController extends Controller
{
    public function create_grade_comment(Request $req,$id){
       
        $user = Auth::user();
        

        //thêm 
        $comment=new GradeComment;
        $comment->user_id    =   $user->id;
        $comment->classroom_id=   $id;
        $comment->content=  $req->content;
        $comment->save();
       

            return redirect()->back();
    }
}
