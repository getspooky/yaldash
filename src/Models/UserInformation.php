<?php

namespace Yasser\LaravelDashboard\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserInformation extends Model
{
    //
    protected $fillable = ['username','Description','last_name','Address','Address2','City','Country','Zip'];

    protected $guarded = ['id'];

    public $table = "user_informations";


    public function users(){

        return $this->belongsTo(User::class);

    }
    
}
