<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        session_start();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = $request->post('id');
        $product = Recipe::find($id);
        if(!$product){
            return response()->json(array('message' => 'Not found'), 404);
        }


        $cart = isset($_SESSION['cart'])  ? $_SESSION['cart'] : [];

        if(!$cart) {
            $_SESSION['cart'] = [$id => [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "picture" => $product->picture
            ]];
        } else {
            $_SESSION['cart'][$id]['quantity']++;

            $_SESSION['cart'][$id] = [
                "name" => $product->name,
                "quantity" => $_SESSION['cart'][$id]['quantity'],
                "price" => $product->price,
                "picture" => $product->picture
            ];
        }
        return response()->json(array('cart' => $_SESSION['cart']), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function remove(Request $request)
    {
        $id = $request->post('id');
        unset($_SESSION['cart'][$id]);
        return response()->json(array('message' => 'Product deleted', 'cart'=>$_SESSION['cart']), 200);
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->post('id');
        if(!isset($id) && $id == null) {
            return response()->json(array('message' => 'Not found'), 404);
        }
        $product = Recipe::find($id);
        $_SESSION['cart'][$id]['quantity']++;

        $_SESSION['cart'][$id] = [
            "name" => $product->name,
            "quantity" => $_SESSION['cart'][$id]['quantity'],
            "price" => $product->price,
            "picture" => $product->picture
        ];
            return response()->json(array('cart' => $_SESSION['cart']), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $_SESSION['cart'] = [];
    }
}
