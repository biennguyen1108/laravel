<?php

namespace App\Http\Controllers\API;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Http\Controllers\Controller;


class CartItemController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('product')->get();
        return response()->json($cartItems);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        $cartItem = CartItem::create([
            'product_id' => $product->id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
        ]);

        return response()->json($cartItem, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = CartItem::find($id);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $product = Product::findOrFail($cartItem->product_id);
        $cartItem->quantity = $request->quantity;
        $cartItem->total_price = $product->price * $request->quantity;
        $cartItem->save();

        return response()->json($cartItem);
    }

    public function destroy($id)
    {
        $cartItem = CartItem::find($id);

        if (!$cartItem) {
            return response()->json(['message' => 'Cart item not found'], 404);
        }

        $cartItem->delete();

        return response()->json(['message' => 'Cart item deleted']);
    }
}
