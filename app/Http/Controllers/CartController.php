<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Contact;

class CartController extends Controller
{
    public function cart()
    {
        $featuredproducts = Product::inRandomOrder()->limit(8)->get();
        $bestsellingproducts = Product::orderByDesc('sold')->limit(10)->get();
        $featureimage = Product::inRandomOrder()->limit(1)->get();
        $topcategories = Category::inRandomOrder()->take(8)->get();
        $womencategories = Category::where('sex', 'F')->take(8)->get();
        $mencategories = Category::where('sex', 'M')->take(8)->get();
        $salecategories = Category::where('sex', 'U')->take(8)->get();
        $mennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $womennewarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $newarrivals = Product::orderByDesc('created_at')->take(5)->get();
        $menproducts = Product::all();
        $womenproducts = Product::all();
        $trendingproducts = Product::all();
        $contacts = Contact::all();
        return view('pages.cart', compact('featuredproducts','bestsellingproducts','featureimage',
        'topcategories','womencategories','mencategories','salecategories',
        'menproducts','womenproducts','trendingproducts','mennewarrivals','womennewarrivals',
        'newarrivals','contacts')); 
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
         if(!$product){
            abort(404);
         }

        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $id = [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image_path' => $product->image_path
                ]
                ];
                session()->put('cart',$cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            'image_path' => $product->image_path
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function update(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function removeFromCart($id)
    {
        $product = Product::find($id);
         if(!$product){
            abort(404);
         }

        $cart = session()->get('cart');

        if(!$cart){
            $cart = [
                $id = [
                    'name' => $product->name,
                    'quantity' => 1,
                    'price' => $product->price,
                    'image_path' => $product->image_path
                ]
                ];
                session()->delete('cart',$cart);

                return redirect()->back()->with('success', 'Product removed from cart successfully!');
        }

        session()->delete('cart', $cart);
        return redirect()->back()->with('success', 'Product removed from cart successfully!');
    }


    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
}
