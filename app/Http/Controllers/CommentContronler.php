<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
class CommentContronler extends Controller
{
    public function create_comment(Request $req,$id){
       
        $user = Auth::user();
        

        //thêm 
        $submit=new Comment;
        $submit->user_id    =   $user->id;
        $submit->posts_id=   $id;
        $submit->content=  $req->content;
        $submit->save();
       

            return redirect()->back();
    }
}
