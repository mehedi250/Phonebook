<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    protected $fillable = [
        'user_id', 'name', 'address',
    ];

    public function getphones()
   {
    return $this->hasMany('App\PhoneNumber','ContactInformation_id','id');
   }
}
