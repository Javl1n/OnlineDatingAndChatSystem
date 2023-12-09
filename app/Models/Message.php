<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Message extends Model
{
    use HasFactory;

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class,'mediable');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function report()
    {
        return $this->hasOne(Report::class);
    }
}
