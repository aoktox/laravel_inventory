<?php

namespace App\Http\Controllers;

use App\Item;
use App\Transaction;
use App\TransactionDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $all = Transaction::all();
        return view('admin.dashboard', ['transactions' => $all]);
    }

    public function detail()
    {
        return view('admin.detail');
    }

    public function detailtrans()
    {
        $all = TransactionDetail::all();
        return view('admin.detail', ['transactiondetails' => $all]);
    }


    public function history()
    {
        $all = Transaction::select('transactions.*', 'users.name as staff')
            ->join('users', 'users.id', '=', 'transactions.staff_id', 'left')
            ->get();
        return view('admin.history', ['historis' => $all]);
    }

    public function historydetail($id)
    {
        $data = Transaction::findOrFail($id);
        $model = TransactionDetail::select('transaction_details.*', 'users.name as staff')
            ->join('users', 'users.id', '=', 'transaction_details.staff_id', 'left')
            ->get();

        return view('admin.historydetail', compact('model', 'data'));
    }

    public function historyreject($id)
    {
        $data = Transaction::findOrFail($id);
        $model = TransactionDetail::all();

        return view('admin.historyreject', compact('model', 'data'));
    }

    public function item()
    {
        $all = Item::paginate(10);
        return view('admin.item', ['items' => $all]);
    }

    public function itemadd()
    {
        return view('admin.itemadd');
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'desc' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'status' => 'required'
        ]);

        $item = Item::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'qty' => $request->qty,
            'price' => $request->price,
            'purchased_at' => Carbon::now(),
            'status' => $request->status,
            'create_at' => Carbon::now(),
            'updated_at' => Carbon::now()]);

        return redirect(route('admin.item'))->with('success', 'Data berhasil diinput!');
    }

    //ini edit
    public function itemdetail($id)
    {
        $model = Item::findOrFail($id);

        return view('admin.itemdetail', compact('model'));
    }

    //ini update
    public function itemedit(Request $request, $id)
    {
        $this->validate($request, [
            'item-name' => 'required',
            'desc' => 'required',
            'qty' => 'required',
            'price' => 'required'
        ]);

        $model = Item::findOrFail($id)->update($request->all());

        return redirect()->route('admin.item')->with('success', 'Data item berhasil diubah');
    }

    public function itemdelete($id)
    {
        $model = Item::findOrFail($id)->delete();
        return redirect()->route('admin.item')->with('success', 'Data item berhasil dihapus');
    }

    public function itemout()
    {
        $all = Transaction::select('transactions.*', 'users.name as staff')
            ->join('users', 'users.id', '=', 'transactions.staff_id', 'left')
            ->get();
        return view('admin.itemout', ['itemout' => $all]);
    }

    public function itemoutdetail($id)
    {
        $data = Transaction::findOrFail($id);
        $model = TransactionDetail::all();

        return view('admin.itemoutdetail', compact('model', 'data'));
    }

    public function request()
    {
        $all = Transaction::paginate(10);
        return view('admin.request', ['transactions' => $all]);
    }

    public function reject($id)
    {
        $model = Transaction::where('id', '=', $id)->firstOrFail();
        $model->reject_at = Carbon::now();
        $model->staff_id = Auth::user()->id;
        $model->save();

        return redirect('admin/request')->with('success', 'Transaksi Ditolak...');
    }

    public function approve($id)
    {
        $model = Transaction::findOrFail($id);
        $model->approved_at = Carbon::now();
        $model->staff_id = Auth::user()->id;
        $model->save();

        return redirect('admin/request')->with('success', 'Transaksi Diterima...');
    }

    public function requestdetail($id)
    {
        $data = Transaction::findOrFail($id);
        $model = TransactionDetail::all();

        return view('admin.requestdetail', compact('model', 'data'));
    }

    public function user()
    {
        $all = User::paginate(10);
        return view('admin.user', ['users' => $all]);
    }

    public function userdetail($id)
    {
        $model = User::findOrFail($id);

        return view('admin.userdetail', compact('model'));
    }

    public function useredit(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'pass' => 'required',
        ]);

        $model = User::findOrFail($id)->update($request->all());

        return redirect()->route('admin.user')->with('success', 'Data user berhasil diubah...');
    }

    public function userdelete($id)
    {
        $model = User::findOrFail($id)->delete();
        return redirect()->route('admin.user')->with('success', 'Data user berhasil dihapus...');
    }

    public function do_receive_item(Request $request){
        $transaction = TransactionDetail::findOrFail($request->get('trx_id'));

        $transaction->update([
            'return_status' => $request->get('status'),
            'returned_at' => Carbon::now(),
            'staff_id' => Auth::user()->id
        ]);

        return \response()->json(['error'=>false,'message'=>'Transaction succeeded'],200);
    }
}
