<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submit extends Model
{
    use HasFactory;
    public function Attachments()
    {
        return $this->hasMany(SubmitAttachment::class);
    }
    public function User()
{
    return $this->belongsTo(User::class);
}
}
