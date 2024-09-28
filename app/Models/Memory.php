<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title', 'description', 'media', 'is_fav'];

    protected $casts = [
        'media' => 'array', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

