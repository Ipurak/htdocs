<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    //Table Name
    protected $table = 'books';
    //Primary Key
    public $primaryKey = 'id';
    //Timestamps
    public $Timestamps = true;

}
