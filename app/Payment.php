<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $connection = 'mysql';
    protected $primaryKey = 'id';
    protected $table = 'payments';

    protected $fillable  = array(
        'txnid',
        'payment_amount',
        'payment_status', 
        'user_id'   
    );
    //
}
