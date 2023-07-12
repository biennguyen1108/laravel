<?php

namespace App\Http\Controllers\API;

use App\Models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PaymentController extends Controller
{   public function index()
    {
        $payments = Payment::all();

        return response()->json($payments, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
            'amount' => 'required|numeric|min:0',
        ]);

        $payment = Payment::create($request->all());

        return response()->json($payment, 201);
    }
}
