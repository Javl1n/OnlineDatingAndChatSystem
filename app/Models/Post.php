<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Post extends Model
{
    use HasFactory;

    protected $with = ['user'] ;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function media(): MorphOne
    {
        return $this->morphOne(Media::class,'mediable');
    }
}