<?php
/*
 * This file is part of the yaldash  package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace yal\laraveldash\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{

    protected $guarded = ['id'];

    protected $fillable = ['store_id','user_id'];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function resolveChildRouteBinding($childType, $value, $field)
    {
      // TODO: Implement resolveChildRouteBinding() method.
    }

}
