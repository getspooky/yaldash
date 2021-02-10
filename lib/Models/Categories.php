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

class Categories extends Model
{
    protected $fillable = ['categories','post_id'];

    protected $guarded = ['id'];

   public function resolveChildRouteBinding($childType, $value, $field)
   {
    // TODO: Implement resolveChildRouteBinding() method.
   }

}
