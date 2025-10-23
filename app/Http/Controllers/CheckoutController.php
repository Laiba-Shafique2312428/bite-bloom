<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $subtotal = array_sum(array_map(function ($item) {
            return $item['price'] * $item['qty'];
        }, $cart));

        $tax = $subtotal * 0.10;
        $shipping = 10.00;
        $total = $subtotal + $tax + $shipping;

        return view('pages.checkout.index', compact('cart', 'subtotal', 'tax', 'shipping', 'total'));
    }

    public function process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'shipping_address' => 'required|string|max:255',
            'shipping_city' => 'required|string|max:255',
            'shipping_state' => 'required|string|max:255',
            'shipping_zip' => 'required|string|max:10',
            'payment_method' => 'required|in:credit_card,paypal,bank_transfer',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

  
        $orderData = $request->all();
        $cart = Session::get('cart', []);

        

        Session::forget('cart');

        return redirect()->route('checkout.success')->with('success', 'Order placed successfully!');
    }

    public function success()
    {
        return view('pages.checkout.success');
    }
}
