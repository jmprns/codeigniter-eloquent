<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use Illuminate\Database\Eloquent\Model as Eloquent;
// use Illuminate\Database\Eloquent\SoftDeletes;


class Admin extends Eloquent
{

    protected $guarded = [];
    protected $table = "admin";
    protected $primaryKey = 'admin_id';


}