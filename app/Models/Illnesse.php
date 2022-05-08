<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Illnesse extends Model
{
    use HasFactory;
    protected $fillable = [
        'ill_name',
        'ill_details',
        'username',
    ];

    public $timestamps = false;
}
