<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class established_accounts extends Model
{
    use HasFactory;
    protected $fillable = [
        'companie_id','name', 'user', 'password'
    ];

    public function companie(){
        return $this->belongsTo('App\Models\companie','companie_id');
    }

}
