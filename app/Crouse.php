<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crouse extends Model
{
    //Table name
    protected $table = "crouses";
    //Primary Key
    public $primaryKey = 'subject_id';
    //Timestamps
    public $timeStamps = false;
    //
}
