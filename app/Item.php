<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    protected $fillable = [
        'name', 'desc', 'qty','price','purchased_at','status'
    ];

    public function is_available($n){
        $dipinjam = DB::table('transaction_details')->whereNull('returned_at')->where('item_id',$this->id)->sum('qty');
        $total = $this->qty;
        return ($total-$dipinjam-$n)>=0;
    }

    public function get_available(){
        $approve_trx = Transaction::whereNotNull('approved_at')->pluck('id')->toArray();
        $dipinjam = DB::table('transaction_details')->whereIn('transaction_id',$approve_trx)->whereNull('returned_at')->where('item_id',$this->id)->sum('qty');
        $total = $this->qty;
        return ($total-$dipinjam);
    }

    public function get_borrowed(){
        $dipinjam = DB::table('transaction_details')->whereNull('returned_at')->where('item_id',$this->id)->sum('qty');
        return($dipinjam);
    }

}
