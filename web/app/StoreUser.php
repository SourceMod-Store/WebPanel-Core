<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreUser extends Model {

    use SoftDeletes;

    protected $connection = 'store';
    protected $table = 'users';

}
