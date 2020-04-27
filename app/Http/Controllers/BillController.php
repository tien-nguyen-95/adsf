<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Customer;
use Illuminate\Http\Request;
use Auth;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bills = Bill::all();
        return view('admin.bill.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin.bill.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bill = new Bill;
        $bill->code = request('code');
        $bill->id_customer = request('id_customer');
        $bill->date_order = request('date_order');
        $bill->total = request('total');
        $bill->payment = request('payment');
        $bill->note = request('note');
        $bill->user_created = Auth::user()->email;
        $bill->save();
        return redirect()->route('bill.index')->with('success', "Tạo thành công");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customers = Customer::all();
        $bill = Bill::findOrFail($id);
        return view('admin.bill.edit', compact('customers','bill'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bill = Bill::findOrFail($id);
        $bill->code = request('code');
        $bill->id_customer = request('id_customer');
        $bill->date_order = request('date_order');
        $bill->total = request('total');
        $bill->payment = request('payment');
        $bill->note = request('note');
        $bill->user_created = Auth::user()->email;
        $bill->save();
        return redirect()->route('bill.index')->with('success', "Cập nhật đơn $bill->code thành công");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bill::findOrFail($id);
        Bill::find($id)->update(['user_deleted' => Auth::user()->email]);
        $bill->delete();
        return redirect()->route('bill.index')->with('success', "Xóa $bill->code thành công");
    }

    public function trash()
    {
        $bills = Bill::onlyTrashed()->get();
        return view('admin.bill.trash', compact('bills'));
    }

    public function restore($id)
    {
        $bill = Bill::onlyTrashed()->findOrFail($id);
        $bill->restore();

        return redirect()->route('bill.index')->with('success', " $bill->code đã được khôi phục !");
    }

    public function restoreAll()
    {
        $bills = bill::onlyTrashed()->get();
        if (count($bills) < 1) {
            return redirect()->route('bill.trash')->with('error', "Thùng rác rỗng");
        } else {
            bill::onlyTrashed()->restore();
            return redirect()->route('bill.index')->with('success', " Tất cả đã được khôi phục !");
        }
    }

    public function delete($id)
    {
        $bill = Bill::onlyTrashed()->findOrFail($id);
        $bill->forceDelete();
        return redirect()->route('bill.trash')->with('success', "Xóa thành công $bill->code !");
    }

    public function deleteAll()
    {
        $bill = Bill::onlyTrashed()->get();

        if (count($bill) < 1) {
            return redirect()->route('bill.trash')->with('error', "Thùng rác rỗng !");
        } else {
            Bill::onlyTrashed()->forceDelete();
            return redirect()->route('bill.trash')->with('success', "Đã xóa tất cả !");
        }
    }
}
