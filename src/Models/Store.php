<?php

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //
    protected $fillable = ['user_id','description','price','type'];

    protected $guarded = ['id'];

    public function attachementStore(){

        return $this->morphMany(Attachement::class,'attachable');

    }


}
