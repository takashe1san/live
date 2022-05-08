<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'ans_id',
        'ans_content',
        'consultation',
        'doctor',
    ];

    const CREATED_AT="ans_date";
    const UPDATED_AT="ans_update";
}
