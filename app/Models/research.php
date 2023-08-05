<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class research extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'emirate',
        'url',
        'info',
        'sinfo',
        'doc',
        'slug',
    ];
}
