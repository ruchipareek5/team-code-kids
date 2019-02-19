<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    protected $table = 'table_grievance';
    public $primaryKey = 'id';
    public $timestamps = true;

}
