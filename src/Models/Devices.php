<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 26/02/19
 * Time: 00:01
 */

namespace Yasser\LaravelDashboard\Models;


use App\User;
use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{

   protected $fillable = ['user_device_information'];

   protected  $guarded = ['id'];

    /**
     * Get the post that owns the devices.
     */

   public function post(){

       return $this->belongsTo(Post::class);

   }

}
