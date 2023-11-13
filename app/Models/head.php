<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class head extends Model
{
    use HasFactory;

    protected $table = 'head';
    protected $fillable = [
        'head',
        'image',
    ];
}
