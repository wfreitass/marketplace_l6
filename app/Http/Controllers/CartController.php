<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cart = session()->has('cart') ? session()->get('cart') : [];
        return view('cart', compact('cart'));
    }

    public function remove($slug){
        if (!session()->has('cart')) {
            return redirect()->route('cart.index');
        }

        $products = session()->get('cart');

        $products = array_filter($products, function($line) use($slug) { //Use para colocar o slug no mesmo escopo que o da função anonima
            return $line['slug'] != $slug;
        });

        session()->put('cart', $products);
        return redirect()->route('cart.index');
    }

    public function cancel(){
        session()->forget('cart');

        flash('Compra Cancelada!')->success();

        return redirect()->route('cart.index');
    }

    public function add(Request $request){
        $product = $request->get('product');

        if(session()->has('cart')){

            $products = session()->get('cart');
            $productsSlug = array_column($products, 'slug');

            if(in_array($product['slug'], $productsSlug)){
                $products = $this->productincrement($product['slug'], $product['amount'], $products);
                session()->put('cart', $products);
            }else{
                session()->push('cart', $product);
            }
        }else{
            $products[] = $product;
            session()->put('cart', $products);
        }

        flash('Produto Adicionado no carrinho!')->success();

        return redirect()->route('product.single', ['slug'=>$product['slug']]);
    }

    private function productincrement($slug, $amount,$products){
        $products = array_map(function($line) use($slug,$amount){
            if($slug == $line['slug']){
                $line['amount'] += $amount;
            }
            return $line;
        },$products);
        return $products;
    }
}
