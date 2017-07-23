<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DefaultTemplate extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'default_template';

    protected $fillable  = array(
        'Title',
        'Source',
        'user_id'
    );
}
