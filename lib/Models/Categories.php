<?php
/*
 * This file is part of the laravelDash package.
 *
 * (c) Yasser Ameur El Idrissi <getspookydev@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{

    protected $fillable = ['categories','post_id'];

    protected $guarded = ['id'];
}
