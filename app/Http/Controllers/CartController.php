<?php

namespace App\Http\Controllers;

use App\BillDetail;
use Illuminate\Http\Request;
use App\Product;
use Cart;
use App\Customer;
use App\Bill;
use App\Http\Requests\CustomerRequest;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('bakery.cart');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function add(Request $request)
    {
        // dd($request->all());
        $product = Product::find($request->productId);
        if($product->sale){
            $price = $product->get_sale_price();
        }
        else{
            $price = $product->unit_price;
        }

        // dd($product->price);
        Cart::add($product->id, $product->name, $price, $request->quantity, array('image'=>$product->image));
        // dd(Cart::getContent());
        return back()->with('success',"Thêm thành công $product->name vào giỏ hàng !!!");;
    }

    public function cart(){
        $params = [
            'title' => 'Shopping Cart Checkout',
        ];
// dd(Cart::getContent());
        return view('home.cart')->with($params);
    }

    public function clear(){
        Cart::clear();

        return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");;
    }

    public function remove($id){
        Cart::remove($id);

        return back();
    }
    public function confirmCheckout(CustomerRequest $request){
        $customer = new Customer;
        $customer->name = request('name');
        $customer->gender = request('gender');
        $customer->email = request('email');
        $customer->address = request('address');
        $customer->phone = request('phone');
        $customer->note = request('note');
        $customer->save();
        $id_customer = $customer->id;

        $bill = new Bill;
        $bill->id_customer = $id_customer;
        $bill->date_order = date('Y-m-d H:i:s');
        $bill->total = Cart::getSubTotal();
        $bill->save();
        $id_bill = $bill->id;

        foreach (Cart::getContent() as $cart) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $id_bill;
            $bill_detail->id_product = $cart->id;
            $bill_detail->quantity = $cart->quantity;
            $bill_detail->unit_price = $cart->price;
            $bill_detail->save();
        }
        Cart::clear();
        return back()->with('success', "Đã gửi đơn hàng");
    }
}
