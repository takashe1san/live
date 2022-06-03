<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
        'user',
        'doctor',
        'reported_usr',
        'reported_doc',
        'reported_con',
        'reported_comm',
        'reported_ans',
    ];

    const CREATED_AT = 'rep_date';
    const UPDATED_AT = null;
}
