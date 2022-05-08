<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'con_section',
        'con_content',
        'username',
    ];

    const CREATED_AT = 'con_date';
    const UPDATED_AT = null;
    
}
