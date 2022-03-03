<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    protected $table = "users";

    protected $fillable = ["name","email", "password"];

     public $timestamps = false;
}
