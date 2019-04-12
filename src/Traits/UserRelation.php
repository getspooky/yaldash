<?php


namespace Yasser\LaravelDashboard\Traits;

use Yasser\LaravelDashboard\Models\Attachement;
use Yasser\LaravelDashboard\Models\Checkout;
use Yasser\LaravelDashboard\Models\Devices;
use Yasser\LaravelDashboard\Models\Followers;
use Yasser\LaravelDashboard\Models\Post;
use Yasser\LaravelDashboard\Models\Store;
use Yasser\LaravelDashboard\Models\UserInformation;

trait UserRelation
{

    /**
     * Get the post for the User.
     *
     * Relationships:One To Many
     */

    public function posts(){

        return $this->hasMany(Post::class);

    }


    /**
     * Get the information of the user
     *
     */

    public function information(){

        return $this->hasOne(UserInformation::class);

    }

    public function attachementUser(){

        return $this->morphMany(Attachement::class,'attachable');

    }


    public function followers(){

        return $this->hasMany(Followers::class);

    }

    public function checkout(){

        return $this->hasMany(Checkout::class);

    }

    public function store(){

        return $this->hasMany(Store::class);

    }

    public function devices(){

        return $this->hasManyThrough(Devices::class,Post::class);

    }


}
