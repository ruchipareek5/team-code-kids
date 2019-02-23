<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrievanceMessage extends Model
{
    protected $table = 'table_message';
    public $timestamps = false;
    protected $primaryKey = 'id';

    protected $fillable = ['grievance_id', 'message', 'sender_id'];
    public function committee_member()
    {
        return $this->belongsTo(Grievance::class);
    }
}
