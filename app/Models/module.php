<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;
    protected $fillable = ['name'];

    public function submodules(){
        return $this->hasMany('App\Models\Submodule','moduleid','id');
    }
}
