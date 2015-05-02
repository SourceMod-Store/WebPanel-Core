<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreUserItemLoadout extends Model {

    use SoftDeletes;

    protected $connection = 'store';
    protected $table = 'users_items_loadout';

}
