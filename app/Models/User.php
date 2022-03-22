<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';
    
    protected $dates = ['birthday'];
 
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function Classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'joined_users')->wherePivot('deleted_at', NULL)->wherePivot('approved_at',"<>", NULL);
    }
}
