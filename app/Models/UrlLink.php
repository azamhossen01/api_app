<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'short_url',
        'long_url',
        'user_id',
        'view_count'
    ];
}
