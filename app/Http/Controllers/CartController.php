<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        $cart = Session::get('cart', []);
        $total = $this->calculateTotal($cart);
      
        return view('pages.cart', compact('cart', 'total'));
    }

   
    public function items(Request $request): JsonResponse
    {
        $cart = $request->session()->get('cart', []);
        return response()->json($cart);
    }

 
    public function add(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => 'required|string',
            'price' => 'required',
            'image' => 'nullable|string',
            'alt' => 'nullable|string',
        ]);

        $cart = $request->session()->get('cart', []);
      
        $idx = null;
        foreach ($cart as $i => $it) {
            if (($it['title'] ?? '') === $data['title'] && ($it['price'] ?? '') == $data['price']) { $idx = $i; break; }
        }
        if ($idx !== null) {
            $cart[$idx]['qty'] = ($cart[$idx]['qty'] ?? 1) + 1;
        } else {
            $data['qty'] = 1;
            $cart[] = $data;
        }
        $request->session()->put('cart', $cart);
        return response()->json($cart);
    }
    public function update(Request $request)
    {
      
        $data = $request->validate([
            'id' => 'required',
            'quantity' => 'required|integer|min:1'
        ]);

        $cart = Session::get('cart', []);

        if (isset($cart[$data['id']])) {
            $cart[$data['id']]['qty'] = $data['quantity'];
            Session::put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'total' => $this->calculateTotal($cart)
        ]);
    }
    public function count()
    {
        $cart = Session::get('cart', []);
        $count = array_sum(array_column($cart, 'qty'));

        return response()->json([
            'count' => $count
        ]);
    }

    public function remove(Request $request): JsonResponse
    {
      
        $id = $request->input('id', $request->input('index'));
        $cart = $request->session()->get('cart', []);
        if (is_numeric($id) && isset($cart[$id])) {
            array_splice($cart, (int)$id, 1);
            $request->session()->put('cart', $cart);
        }

        return response()->json([
            'success' => true,
            'cart' => $cart,
            'total' => $this->calculateTotal($cart)
        ]);
    }

    public function clear(Request $request): JsonResponse
    {
        $request->session()->forget('cart');
        return response()->json([]);
    }
    private function calculateTotal($cart)
    {
        $subtotal = 0;
        foreach ($cart as $item) {
            $subtotal += $item['price'] * $item['qty'];
        }

        $shipping = $subtotal > 0 ? 5.99 : 0;
        $tax = $subtotal * 0.08; 
        $total = $subtotal + $shipping + $tax;

        return [
            'subtotal' => number_format($subtotal, 2),
            'shipping' => number_format($shipping, 2),
            'tax' => number_format($tax, 2),
            'total' => number_format($total, 2)
        ];
    }
}
