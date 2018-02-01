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

    public function nm_user(){
        $idtran = DB::table('transaction')->where('id',$this->id)->select('user_id');
        $nm = DB::table('user')->where('id',$idtran)->select('name');
        return ($nm);
    }
    
    public function nmadmin()
    {
        return $this->belongsTo('App\User');
    }

    public function get_staff(){
        if ($this->staff_id!=null && $staff=User::find($this->staff_id))
        return $staff->name;
    }

}
