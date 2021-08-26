<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\CartRequest;
use App\Models\Cart;
use App\Models\CartCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
       $cart_items =  Cart::all();
       return view('admin.cart.index')->with('cart_items', $cart_items);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $category = CartCategory::pluck('category_name','id');
        return view('admin.cart.create')->with('category',$category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(CartRequest $request)
    {
        try{
        $cart_picture = $request->file('image');
        $path = null;

        if ($cart_picture){
            $path = $cart_picture->store('public/cart_pictures');
            $path = Str::replace('public/','',$path);

        }
         Cart::create([
            'item_name'=>$request->input('item_name'),
            'quantity'=>$request->input('quantity'),
            'category_id'=>$request->input('category_id'),
             'picture'=>$path
        ]);

        }catch(Exception $e){
        return redirect(route('cart.index'))->with($e,"The action haven't worked");
    }

        return redirect(route('cart.index'))->with('success','The Item was added with success');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        $category = CartCategory::pluck('category_name','id');
        return view('admin.cart.edit')->with('cart', $cart)->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(CartRequest $request, Cart $cart)
    {
        $cart_picture = $request->file('picture');
        $path = null;

        if ($cart_picture){
            $path = $cart_picture->store('public/cart_pictures');
            $path = Str::replace('public/','',$path);
            $cart->picture = $path;
        }
        $cart->name = $request->input('item_name');
        $cart->quantity = $request->input('quantity');
        return redirect(route('cart.index'))->with('success','Item was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return response('ok',200);
    }
}
