<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';

    protected $fillable = [
        'userid', 'password',
    ];
}
