<?php

namespace App\Http\Controllers;

use App\Item;
use App\Transaction;
use App\TransactionDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('public.main',['items'=>Item::all()]);
    }

    public function pinjam()
    {
        return view('public.pinjam');
    }

    public function do_pinjam(Request $request){
//        dd($request);
        $pinjam =[
            'user' => 2,
            'submitted_at' => \Carbon\Carbon::now(),
            'items'=>[
                [
                    'item_id' => 2,
                    'desc' => 'wkwkwk',
                    'qty' => 1
                ],
                [
                    'item_id' => 3,
                    'desc' => 'wkwkwk',
                    'qty' => 10
                ],
                [
                    'item_id' => 4,
                    'desc' => 'wkwkwk',
                    'qty' => 10
                ],
                [
                    'item_id' => 8,
                    'desc' => 'wkwkwk',
                    'qty' => 195
                ]
            ]
        ];

        $is_validated = $this->validate_pinjam($pinjam);
        if ($is_validated!==true){
            return $is_validated;
        }
        $this->simpan($pinjam);

    }

    private function validate_pinjam($param){
        if(User::find($param['user'])==null)
            return $this->send_json(404, true, 'User not found');

        foreach ($param['items'] as $item) {
            $t_item = Item::find($item['item_id']);
            if ($t_item==null)
                return $this->send_json(404,true,'Item not found');
            if (!$t_item->is_available($item['qty']))
                return $this->send_json(400,true,"Item #{$t_item->id}: {$t_item->name} not available");
        }
        return true;
    }

    private function simpan($param){
        $trx = Transaction::create([
            'user_id' => $param['user'],
            'submitted_at'=>$param['submitted_at']
        ]);

        foreach ($param['items'] as $item) {
            TransactionDetail::create([
                'transaction_id' => $trx->id,
                'item_id' => $item['item_id'],
                'desc' => $item['desc'],
                'qty' => $item['qty']
            ]);
        }
    }

    private function send_json($code,$error,$message){
        return response()->json(['error'=>$error,'message'=>$message],$code);
    }
}
