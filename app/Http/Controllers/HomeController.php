<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class HomeController extends Controller
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = $this->product->limit(99)->orderBy('id', 'DESC')->get();
        return view('welcome', compact("products"));
    }

    public function single($slug){
        // $product = $this->product->whereSlug($slug)->get();
        $product = $this->product->whereSlug($slug)->first();
        return view('single', compact('product'));
    }
}
