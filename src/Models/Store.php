<?php

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //

    protected $fillable = ['user_id','description','price','type'];

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */

    public function attachementStore(){

        return $this->morphMany(Attachement::class,'attachable');

    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function buy(){

        return $this->hasMany(Buy::class);

    }


}
