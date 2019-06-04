<?php

namespace Yasser\LaravelDashboard\Models;

use Illuminate\Database\Eloquent\Model;

class Buy extends Model
{
    //
    protected $guarded = ['id'];

    protected $fillable = ['store_id','user_id'];

    /**
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
