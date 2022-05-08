<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergic extends Model
{
    use HasFactory;
    protected $fillable = [
        'aller_typ',
        'aller_details',
        'username',
    ];
}
