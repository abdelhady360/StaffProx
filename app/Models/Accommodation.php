<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    use HasFactory;
    protected $fillable = [
        'companie_id',
        'name',
        'passport_number',
        'unified_no',
        'passpor_start',
        'passpor_end',
        'id_number',
        'dob',
        'nationality',
        'sex',
        'accommodation_start',
        'accommodation_end',
        'PermitWork_start',
        'PermitWork_end',
        'slug',

    ];


    public function companie()
    {
        return $this->belongsTo('App\Models\companie', 'companie_id');
    }
}
