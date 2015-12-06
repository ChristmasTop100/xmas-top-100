<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
  /**
   * @var array
   */
  public $fillable = [
    'user_id',
    'song_id',
    'score',
  ];
}
