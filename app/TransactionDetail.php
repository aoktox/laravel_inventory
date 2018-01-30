<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $fillable=[
        'transaction_id','item_id','desc','qty','return_status','returned_at','staff_id',
    ];

    public function item()
    {
        return $this->belongsTo('App\Item');
    }
}
