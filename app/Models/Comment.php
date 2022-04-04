<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'commenter_id',
        'musician_id',
        'text',
    ];

    public function commenters()
    {
        return $this->belongsTo(User::class, 'commenter_id');
    }
}