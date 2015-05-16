<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreUserItem extends Model
{
    protected $connection = 'store';
    protected $table = 'users_items';

}
