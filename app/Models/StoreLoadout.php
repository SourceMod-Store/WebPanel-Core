<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreLoadout extends Model
{
    protected $connection = 'store';
    protected $table = 'loadouts';
    protected $fillable = [];

    public function owner()
    {
        return $this->belongsTo('App\Models\StoreUser','owner_id','id');
    }

}
