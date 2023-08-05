<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class companie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'license_start', 'license_end','icp_start','icp_end','no_facility','insurance_end','phone_number','email','address','slug','emirate','license_number'
    ];

    public function established_accounts(){
        return $this->hasMany('App\Models\established_accounts','companie_id');
    }

    public function visa(){
        return $this->hasMany('App\Models\visa','companie_id');
    }

    public function accommodation(){
        return $this->hasMany('App\Models\Accommodation','companie_id');
    }
}
