<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    public function Teachers()
    {
        return $this->belongsToMany(User::class, 'joined_users')->where('level','gv')->wherePivot('deleted_at', NULL)->orderBy("id","DESC");
    }
    public function Students()
    {
        return $this->belongsToMany(User::class, 'joined_users')->where('level','sv')->wherePivot('deleted_at', NULL)->wherePivot('approved_at',"<>", NULL)->orderBy("id","DESC");
    }
    public function Wait_Students()
    {
        return $this->belongsToMany(User::class, 'joined_users')->where('level','sv')->wherePivot('deleted_at', NULL)->wherePivot('approved_at', NULL)->orderBy("id","DESC");
    }
    public function Posts()
    {
        return $this->hasMany(Posts::class)->orderBy("id","DESC");
    }
    
    public function GradeComments()
    {
        return $this->hasMany(GradeComment::class)->orderBy("id","DESC");
    }
    public function Notifications()
    {
        return $this->hasMany(Posts::class)->where('type','thong bao')->orderBy("id","DESC");
    }

    public function All_Assignments()
    {
        return $this->hasMany(Posts::class)->where('type','<>','tài liệu')->where('type','<>','thông báo')->orderBy("id","DESC");
    }


    public function Assignments()
    {
        return $this->hasMany(Posts::class)->where('type','bài tập')->orderBy("id","DESC");
    }
    public function Documents()
    {
        return $this->hasMany(Posts::class)->where('type','tài liệu')->orderBy("id","DESC");
    }
    public function Tests()
    {
        return $this->hasMany(Posts::class)->where('type','bài kiểm tra')->orderBy("id","DESC");
    }
    public function Exams()
    {
        return $this->hasMany(Posts::class)->where('type','bài thi')->orderBy("id","DESC");
    }
}
