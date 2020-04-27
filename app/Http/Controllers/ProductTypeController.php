<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Str;
use App\Http\Requests\ProductTypeRequest;

use App\ProductType;

class ProductTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $productTypes = ProductType::all();
        return view('admin.productType.index', compact('productTypes'));
    }

    public function create(){
        return view('admin.productType.create');
    }

    public function store(ProductTypeRequest $request){
        $productType = new ProductType;
        $productType->name = request('name');
        $productType->description = request('description');
        $productType->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        $productType->slug = ucwords(Str::slug(request('name')));
        $productType->save();
        return redirect()->route('productType.index')->with('success', "Tạo thành công");
    }

    public function edit($id)
    {
        $productType = ProductType::findOrFail($id);
        return view('admin.productType.edit', compact('productType'));
    }

    public function update(ProductTypeRequest $request, $id)
    {
        $productType = ProductType::findOrFail($id);
        $productType->name = request('name');
        $productType->description = request('description');
        if($request->file('image')) {
            $productType->image = base64_encode(file_get_contents($request->file('image')->getRealPath()));
        }
        $productType->slug = ucwords(Str::slug(request('name')));
        $productType->save();
        return redirect()->route('productType.index')->with('success', "Cập nhật thành công");
    }

    public function destroy($id)
    {
        $productType = ProductType::findOrFail($id);
        $productType->delete();
        return redirect()->route('productType.index')->with('success', "Xóa Loại $productType->name thành công");
    }

    public function trash()
    {
        $productTypes = ProductType::onlyTrashed()->get();
        return view('admin.productType.trash', compact('productTypes'));
    }

    public function restore($id)
    {
        $productType = ProductType::onlyTrashed()->findOrFail($id);
        $productType->restore();

        return redirect()->route('productType.index')->with('success', " $productType->name đã được khôi phục !");
    }

    public function restoreAll()
    {
        $productTypes = ProductType::onlyTrashed()->get();
        if (count($productTypes) < 1) {
            return redirect()->route('productType.trash')->with('error', "Thùng rác rỗng");
        } else {
            ProductType::onlyTrashed()->restore();
            return redirect()->route('productType.index')->with('success', " Tất cả đã được khôi phục !");
        }
    }

    public function delete($id)
    {
        $productType = ProductType::onlyTrashed()->findOrFail($id);
        $productType->forceDelete();
        return redirect()->route('productType.trash')->with('success', "Xóa thành công $productType->name !");
    }

    public function deleteAll()
    {
        $productTypes = ProductType::onlyTrashed()->get();

        if (count($productTypes) < 1) {
            return redirect()->route('productType.trash')->with('error', "Thùng rác rỗng !");
        } else {
            ProductType::onlyTrashed()->forceDelete();
            return redirect()->route('productType.trash')->with('success', "Đã xóa tất cả !");
        }
    }
}
