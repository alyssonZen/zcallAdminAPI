<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $dates = ['deleted_at'];
    protected $guarded = [];
}
