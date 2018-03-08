<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agencies extends Model
{
    protected $fillable = ['name','address','city','countri','phone','email','web'];
}
