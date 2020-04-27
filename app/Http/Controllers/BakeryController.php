<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Product;
use App\ProductType;
class BakeryController extends Controller
{
    public function home(){
        $products = Product::where('speciality', 1)->get();
        return view('bakery.home',compact('products'));
    }

    public function shop($type){
        if($type === 'all'){
            $products = Product::all();
        }
        else{
            // $slugs = explode("-", str_replace('-', ' ', $type));
            $find_type = ProductType::where('slug', $type)->first();
            $id = $find_type->id;
            $products = Product::where('id_type', $id)->get();
        }
        $type_product = $type;
        return view('bakery.shop', compact('products', 'type_product'));
    }

    public function shopDiscount($type){
        if($type === 'all'){
            $products = Product::all();
        }
        else{
            $slugs = explode("-", str_replace('-', ' ', $type));
            $find_type = ProductType::where('name', $slugs)->first();
            $id = $find_type->id;
            $products = Product::where('id_type', $id)->where('sale',1)->get();
        }
        $type_product = $type;
        return view('bakery.shop', compact('products', 'type_product'));
    }

    public function detail_product($name){
        $specialities = Product::where('speciality', 1)->get();
        // $slugs = explode("-", str_replace('-', ' ', $name));
        $find_product = Product::where('slug', $name)->first();
        $id = $find_product->id;
        $product = Product::findOrFail($id);
        return view('bakery.detail_product' , compact('product','specialities'));
    }

    public function about(){
        return view('bakery.about');
    }

    public function news(){
        $list_news = News::all();
        return view('bakery.news', compact('list_news'));
    }

    public function detail_news($id){

        $news = News::findOrFail($id);
        return view('bakery.detail_news', compact('news'));
    }

    public function contact(){
        return view('bakery.contact');
    }

    public function checkout(){
        return view('bakery.checkout');
    }

    public function login(){
        return view('auth.login');
    }
}
