<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    protected $table = 'admin';

    protected $fillable = [
        'admin_ID', 'admin_password ',
    ];
}
