<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Citizen extends Eloquent
{

    protected $guarded = [];
    protected $table = "citizen";
    protected $primaryKey = 'citizen_id';


}