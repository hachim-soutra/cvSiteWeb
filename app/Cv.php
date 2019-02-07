<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes ;

class Cv extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function experiences()
    {
        return $this->hasMany('App\Experience' );
    }
}
