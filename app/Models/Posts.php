<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;
    protected $dates = ['deadline'];
    public function Attachments()
    {
        return $this->hasMany(Attachments::class);
    }
    public function Submits()
    {
        return $this->hasMany(Submit::class)->orderBy("id","DESC");
    }
    public function Classroom()
{
    return $this->belongsTo(Classroom::class);
}
public function User()
{
    return $this->belongsTo(User::class);
}
public function Comments()
    {
        return $this->hasMany(Comment::class)->orderBy("id","DESC");
    }
}
