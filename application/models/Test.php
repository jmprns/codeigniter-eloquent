<?php

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\SoftDeletes;


class Test extends Eloquent
{
    use SoftDeletes;

    protected $guarded = [];
    protected $table = "document";

    public $timestamps = false;

}