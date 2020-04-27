<?php

namespace App\Http\Controllers;
use App\Customer;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $customers = Customer::all();
        return view('admin.customer.index', compact('customers'));
    }

    public function create(){
        return view('admin.customer.create');
    }

    public function store(CustomerRequest $request){
        $customer = new Customer;
        $customer->name = request('name');
        $customer->gender = request('gender');
        $customer->email = request('email');
        $customer->address = request('address');
        $customer->phone = request('phone');
        $customer->note = request('note');
        $customer->user_created = Auth::user()->email;
        $customer->save();
        return redirect()->route('customer.index')->with('success', "Thêm Khách hàng mới thành công");
    }

    public function edit($id){
        $customer = Customer::findOrFail($id);
        return view('admin.customer.edit', compact('customer'));
    }

    public function update(CustomerRequest $request , $id){
        $customer = Customer::findOrFail($id);
        $customer->name = request('name');
        $customer->gender = request('gender');
        $customer->email = request('email');
        $customer->address = request('address');
        $customer->phone = request('phone');
        $customer->note = request('note');
        $customer->user_updated = Auth::user()->email;
        $customer->save();
        return redirect()->route('customer.index')->with('success', "Cập nhật Khách hàng thành công");
    }

    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        Customer::find($id)->update(['user_deleted' => Auth::user()->email]);
        $customer->delete();
        return redirect()->route('customer.index')->with('success', "Xóa $customer->name thành công");
    }

    public function trash()
    {
        $customers = Customer::onlyTrashed()->get();
        return view('admin.customer.trash', compact('customers'));
    }

    public function restore($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->restore();

        return redirect()->route('customer.index')->with('success', " $customer->name đã được khôi phục !");
    }

    public function restoreAll()
    {
        $customers = Customer::onlyTrashed()->get();
        if (count($customers) < 1) {
            return redirect()->route('customer.trash')->with('error', "Thùng rác rỗng");
        } else {
            Customer::onlyTrashed()->restore();
            return redirect()->route('customer.index')->with('success', " Tất cả đã được khôi phục !");
        }
    }

    public function delete($id)
    {
        $customer = Customer::onlyTrashed()->findOrFail($id);
        $customer->forceDelete();
        return redirect()->route('customer.trash')->with('success', "Xóa thành công $customer->name !");
    }

    public function deleteAll()
    {
        $customer = Customer::onlyTrashed()->get();

        if (count($customer) < 1) {
            return redirect()->route('customer.trash')->with('error', "Thùng rác rỗng !");
        } else {
            Customer::onlyTrashed()->forceDelete();
            return redirect()->route('customer.trash')->with('success', "Đã xóa tất cả !");
        }
    }
}
