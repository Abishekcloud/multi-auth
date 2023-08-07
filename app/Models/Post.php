<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'profession_id',
        'email',
        'file',
        'duration',
    ];

    protected $nullable = [
        'publication',
    ];
}
