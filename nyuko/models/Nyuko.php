<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nyuko extends Model
{
	use HasFactory;
	protected $fillable = [ "wakuchin_ID", 
							"syringe_ID", 
							"nyuko_date", 
							"made", 
							"amouont", 
							"staff_ID" ];

}
