<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Cart;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,$this->qty,$product_price)->associate('App\\Models\\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }


    public function render()
    {
        $product = Product::where('slug',$this->slug)->first();
        $rel_products = Product::where('category_id',$product->category_id)->inRandomOrder()->limit(5)->get();
        $pop_products = Product::inRandomOrder()->limit(4)->get();
        return view('livewire.details-component',['product'=>$product,'rel_products'=>$rel_products,'pop_products'=>$pop_products])->layout('layouts.base');
    }
}


