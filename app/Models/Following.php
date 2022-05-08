<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Following extends Model
{
    use HasFactory;
    protected $fillable = [
        'doctor',
        'user',
    ];

    const CREATED_AT = 'date';
    const UPDATED_AT = null;
    
}
