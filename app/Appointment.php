<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['civilite','nom','prenom','email','telephone','service','message','date','time'];
}
