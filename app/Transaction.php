<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $timestamps=false;
    protected $dates = [
        'submitted_at', 'approved_at','reject_at'
    ];
    protected $fillable = [
        'user_id', 'submitted_at', 'approved_at','reject_at','staff_id'
    ];

    public function details()
    {
        return $this->hasMany('App\TransactionDetail');
    }
}
