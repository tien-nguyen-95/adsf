<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\ProductType;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Str;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        $productTypes = ProductType::all();
        return view('admin.product.create', compact('productTypes'));
    }

    public function store(ProductRequest $request){
        $product = new Product;
        $product->name = request('name');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("images/product/" . $image)) {
                 $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("images/product/", $image);
            $product->image = $image;
        }
        $product->id_type = request('id_type');
        $product->description = request('description');
        $product->unit_price = request('unit_price');
        $product->promotion = request('promotion');
        $product->sale = request('sale');
        $product->speciality = request('speciality');
        $product->user_created = Auth::user()->email;
        $product->slug = ucwords(Str::slug(request('name')));
        $product->save();
        return redirect()->route('product.index')->with('success', "Tạo thành công");
    }

    public function edit($id)
    {
        $productTypes = ProductType::all();
        $product = Product::findOrFail($id);
        return view('admin.product.edit', compact('product','productTypes'));
    }

    public function update(ProductRequest $request, $id)
    {

        $product = Product::findOrFail($id);
        $product->name = request('name');
        $product->id_type = request('id_type');
        $product->description = request('description');
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $name_image = $file->getClientOriginalName();
            $image = Str::random(5) . "_" . $name_image;
            while (file_exists("images/product/" . $image)) {
                 $image = Str::random(5) . "_" . $name_image;
            }
            $file->move("images/product/", $image);
            if (!empty($product->image)) {
                unlink("images/product/" . $product->image);
            }
            $product->image = $image;
        }
        $product->unit_price = request('unit_price');
        $product->promotion = request('promotion');
        $product->sale = request('sale');
        $product->speciality = request('speciality');
        $product->slug = ucwords(Str::slug(request('name')));
        $product->user_updated = Auth::user()->email;
        $product->save();
        return redirect()->route('product.index')->with('success', "Cập nhật thành công");
    }


    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        Product::find($id)->update(['user_deleted' => Auth::user()->email]);
        $product->delete();
        return redirect()->route('product.index')->with('success', "Xóa $product->name thành công");
    }

    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.product.trash', compact('products'));
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        $product->restore();

        return redirect()->route('product.index')->with('success', " $product->name đã được khôi phục !");
    }

    public function restoreAll()
    {
        $products = Product::onlyTrashed()->get();
        if (count($products) < 1) {
            return redirect()->route('product.trash')->with('error', "Thùng rác rỗng");
        } else {
            Product::onlyTrashed()->restore();
            return redirect()->route('product.index')->with('success', " Tất cả đã được khôi phục !");
        }
    }

    public function delete($id)
    {
        $product = Product::onlyTrashed()->findOrFail($id);
        if (!empty($product->image)) {
            unlink("images/product/" . $product->image);
        }
        $product->forceDelete();
        return redirect()->route('product.trash')->with('success', "Xóa thành công $product->name !");
    }

    public function deleteAll()
    {
        $product = Product::onlyTrashed()->get();

        if (count($product) < 1) {
            return redirect()->route('product.trash')->with('error', "Thùng rác rỗng !");
        } else {
            $trashes = Product::onlyTrashed()->get();
            foreach ($trashes as $product){
                if (!empty($product->image)) {
                    unlink("images/product/" . $product->image);
                }
            }
            Product::onlyTrashed()->forceDelete();
            return redirect()->route('product.trash')->with('success', "Đã xóa tất cả !");
        }
    }
}
