<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    protected $table = "posts";
  protected $fillable = ['description','image','users_id'];

  public $timestamps = false;


}
