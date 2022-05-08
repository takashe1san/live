<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    use HasFactory;
    protected $fillable = [
        'lic_num',
        'lic_typ',
        'lic_ini_date',
        'lic_exp_date',
        'lic_issuing_place',
    ];

    public $timestamps = false;
}
