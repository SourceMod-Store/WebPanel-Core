<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreLoadout extends Model {

    use SoftDeletes;

    protected $connection = 'store';
    protected $table = 'loadouts';

}
