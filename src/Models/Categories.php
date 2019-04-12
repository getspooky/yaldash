<?php

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    //

    protected $fillable = ['categories','post_id'];

    protected $guarded = ['id'];

}
