<?php

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //

    protected $fillable = ['FirstName','LastName','email','phone','address','Order_Notes','Total_Price'];

    protected $guarded = ['id'];

}
