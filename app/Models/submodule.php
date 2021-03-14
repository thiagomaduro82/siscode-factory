<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Submodule extends Model
{
    use SoftDeletes;
    protected $fillable = ['moduleid','name'];

    public function module(){
        return $this->belongsTo('App\Models\Module','moduleid','id');
    }
}
