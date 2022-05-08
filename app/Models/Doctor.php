<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use HasFactory, SoftDeletes;

    protected $keyType    = 'string';
    protected $primaryKey = 'username';

    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'birth',
        'bio',
        'section',
    ];
}
