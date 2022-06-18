<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Doctor extends Authenticatable
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
