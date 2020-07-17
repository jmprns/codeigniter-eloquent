<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Request extends Eloquent
{

    protected $guarded = [];
    protected $table = "request";
    protected $primaryKey = 'request_id';

    public function citizen()
    {
        return $this->belongsTo('Citizen', 'citizen_id', 'citizen_id');
    }

    public function attachments()
    {
        return $this->hasMany('Attachment', 'request_id', 'request_id');
    }


}