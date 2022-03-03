<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    //
    protected $table="tasks";
    protected $fillable = ["title","content", "image", "start_date,end_date,user_id"];

    public $timestamps = false;
}
