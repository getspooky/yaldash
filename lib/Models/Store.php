<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{

    protected $fillable = ['user_id','description','price','type'];

    protected $guarded = ['id'];

    public function attachementStore()
    {
        return $this->morphMany(Attachement::class, 'attachable');
    }

    public function buy()
    {
        return $this->hasMany(Buy::class);
    }

    public function resolveChildRouteBinding($childType, $value, $field)
    {
      // TODO: Implement resolveChildRouteBinding() method.
    }

}
