<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yasser\LaravelDashboard\Traits;

use Yasser\LaravelDashboard\Models\Attachement;
use Yasser\LaravelDashboard\Models\Buy;
use Yasser\LaravelDashboard\Models\Devices;
use Yasser\LaravelDashboard\Models\Checkout;
use Yasser\LaravelDashboard\Models\Followers;
use Yasser\LaravelDashboard\Models\Post;
use Yasser\LaravelDashboard\Models\Store;
use Yasser\LaravelDashboard\Models\UserInformation;

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
