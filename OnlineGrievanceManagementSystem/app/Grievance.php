<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grievance extends Model
{
    //
    protected $table = 'table_grievance';
    protected $primaryKey = 'id';

    protected $fillable = ['type','description','documents','student_id','department_id'];

    public function committee_member()
    {
        return $this->hasOne(GrievanceMessage::class,'grievance_id');
    }
}
