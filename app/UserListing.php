<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserListing extends Model
{
    //
    protected $table="user_listing";
    protected $guarded=["id"];
    public $timestamps = false;



}
