<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospital extends Model
{
    protected $table = 'hospital';
    
    protected $fillable = ['hospital_ID ', 'hospital_name ', 'hospital_address ', 'hospital_tell  ', 'hospital_idokeido  '];
    
}
