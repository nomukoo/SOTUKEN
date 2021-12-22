<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hospital_kari extends Model
{
    protected $table = 'hospital_kari';
    
    protected $fillable = ['hospital_ID ', 'hospital_name ', 'hospital_address ', 'hospital_tell  ', 'hospital_idokeido  '];
}
