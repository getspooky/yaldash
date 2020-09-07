<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Traits;

use yal\laraveldash\Models\Attachement;
use yal\laraveldash\Models\Buy;
use yal\laraveldash\Models\Country;
use yal\laraveldash\Models\Devices;
use yal\laraveldash\Models\Checkout;
use yal\laraveldash\Models\Followers;
use yal\laraveldash\Models\Post;
use yal\laraveldash\Models\Store;
use yal\laraveldash\Models\UserInformation;

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

  public function isDescription()
  {
    return $this->information->description ?? null;
  }

  public function isZipcode()
  {
    return $this->information->zip ?? null;
  }

  public function isLastName()
  {
    return $this->information->last_name ?? null;
  }

  public function isAddress()
  {
    return $this->information->address ?? null;
  }

  public function isCity()
  {
    return $this->information->city ?? null;
  }

  public function isCountry()
  {
    return $this->information->country->id;
  }
}
