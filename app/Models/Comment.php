<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'com_content',
        'username',
        'doctor',
        'consultation',
        'answer',
    ];

    const CREATED_AT = 'com_date';
    const UPDATED_AT = null;
}
