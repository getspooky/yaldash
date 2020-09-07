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

class Country extends Model
{

    protected $fillable = ['code','name'];

    protected $guarded = ['id'];

   //
}
