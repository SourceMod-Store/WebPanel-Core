<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreLoadout extends Model
{
    protected $connection = 'store';
    protected $table = 'loadouts';

}
