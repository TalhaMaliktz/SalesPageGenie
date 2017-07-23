<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaptureContent extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'capture_contents';

    protected $fillable  = array(
        'URL',
        'Source',
        'user_id'
    );
}
