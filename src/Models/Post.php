<?php

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Post extends Model
{
    //
    protected $fillable = ["user_id","title","content","summary"];

    protected $guarded = ['id'];

    /**
     *  Eloquent: Relationships
     */

    /**
     * Get the user that owns the post.
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function attachements(){

        return $this->morphMany(Attachement::class,"attachable");

    }

    public function categories(){

       return $this->hasOne(Categories::class);

    }

    /**
     * Get the devices for the blog post.
     */

    public function devices(){

        return $this->hasMany(Devices::class);

    }

}
