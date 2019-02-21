<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrievanceMessage extends Model
{
    protected $table = 'table_message';
    public function committee_member()
    {
        return $this->belongsTo(Grievance::class);
    }
}
