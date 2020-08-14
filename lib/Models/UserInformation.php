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

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    protected $fillable = [
      'username',
      'Description',
      'last_name',
      'Address',
      'Address2',
      'City',
      'Country',
      'Zip'
    ];

    protected $guarded = ['id'];

    public $table = "user_informations";

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function resolveChildRouteBinding($childType, $value, $field)
    {
      // TODO: Implement resolveChildRouteBinding() method.
    }

}
