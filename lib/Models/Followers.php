<?php
/**
 * Created by PhpStorm.
 * User: yasser
 * Date: 27/02/19
 * Time: 09:10
 */

namespace Yasser\LaravelDashboard\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Followers extends Model
{

    // $fillable

    protected $fillable = ['follow_id'];

    protected $guarded = ['id'];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
