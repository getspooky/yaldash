<?php

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class ChatDiscussion extends Model
{

    // protected $fillable

    protected $fillable = ['message','receiver'];


    public function users(){

        return $this->belongsTo(User::class);

    }

}
