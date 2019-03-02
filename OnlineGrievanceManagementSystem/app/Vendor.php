<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    //
    protected $table = "user_vendor";
    protected $primaryKey = 'id';
    protected $fillable = ['user_id','name','profile_picture','phone_no','college_id'];

}
