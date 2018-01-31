<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    
    //nah ini inisialisai method untuk relasi ke table user, dipanggil di view
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function staff()
    {
        return $this->hasOne('App\User', 'staff_id');
    }
}
