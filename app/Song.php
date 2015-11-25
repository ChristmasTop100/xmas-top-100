<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @package App
 */
class Song extends Model
{
    
    /**
     * @var array
     */
	public $fillable = [
		'name',
		'url',
		'image',
	];

}
