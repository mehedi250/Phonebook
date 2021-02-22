<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInformation extends Model
{
    public function getphones()
   {
    return $this->hasMany('App\PhoneNumber','ContactInformation_id','id');
   }
}
