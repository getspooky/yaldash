<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace LaravelDashboard\Traits;

use LaravelDashboard\Models\Attachement;
use LaravelDashboard\Models\Buy;
use LaravelDashboard\Models\Devices;
use LaravelDashboard\Models\Checkout;
use LaravelDashboard\Models\Followers;
use LaravelDashboard\Models\Post;
use LaravelDashboard\Models\Store;
use LaravelDashboard\Models\UserInformation;

trait UserRelation
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function information()
    {
        return $this->hasOne(UserInformation::class);
    }

    public function attachementUser()
    {
        return $this->morphMany(Attachement::class, 'attachable');
    }

    public function followers()
    {
        return $this->hasMany(Followers::class);
    }

    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }

    public function store()
    {
        return $this->hasMany(Store::class);
    }

    public function devices()
    {
        return $this->hasManyThrough(Devices::class, Post::class);
    }

    public function buy()
    {
        return $this->hasMany(Buy::class);
    }

}
