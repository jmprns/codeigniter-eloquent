<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Attachment extends Eloquent
{

    protected $guarded = [];
    protected $table = "attachment";
    protected $primaryKey = 'attachment_id';


}