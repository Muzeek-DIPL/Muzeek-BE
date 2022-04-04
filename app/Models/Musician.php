<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'instrument',
        'likes',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function liked_by()
    {
        return $this->hasMany(UserLikedMusician::class, 'musician_id');
    }
}