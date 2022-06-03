<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    
    protected $table = 'media';
    
    public $timestamps = false;

    protected $fillable = [
        'name',
        'ext',
        'mediaDir',
        'admin',
        'user',
        'doctor',
        'cons',
        'comment',
        'answer',
    ];
}
