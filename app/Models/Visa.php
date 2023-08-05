<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $fillable = [
        'companie_id',
        'name',
        'passport_number',
        'passpor_start',
        'passpor_end',
        'dob',
        'nationality',
        'sex',
        'visa_start',
        'visa_end',
        'slug',

    ];

    public function companie(){
        return $this->belongsTo('App\Models\companie','companie_id');
    }
}
