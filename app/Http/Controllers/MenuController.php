<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menuArray = [
            [
                'title' => 'Chicken Biryani',
                'tag' => ['Seasonal'],
                'rating' => '4.5',

                'image' => asset('assets/images/menu-1.jpg'),
                'alt' => 'Greek Salad',
                'price' => 250.00,
            ],
            [
                'title' => 'Pasta',
                'tag' => ['Seasonal'],
                'rating' => '4.5',
                'image' => asset('assets/images/menu-2.jpg'),
                'alt' => 'Lasagne',
                'price' => 440.00,
            ],
            [
                'title' => 'Haleem',
                'tag' => ['Seasonal'],
                'rating' => '4.5',
                'image' => asset('assets/images/menu-3.jpg'),
                'alt' => 'Butternut Pumpkin',
                'price' => 210.00,
            ],
            [
                'title' => 'Noodles',
                'tag' => 'New',
                'tag' => ['Seasonal'],
                'rating' => '4.5',
                'image' => asset('assets/images/menu-4.JPG'),
                'alt' => 'Tokusen Wagyu',
                'price' => 330.00,
            ],
            [
                'title' => 'Rolls',
                'tag' => ['Seasonal'],
                'rating' => '4.5',
                'image' => asset('assets/images/menu-5.jpg'),
                'alt' => 'Olivas Rellenas',
                'price' => 120.00,
            ],
        ];
        return view('pages.menu', compact('menuArray'));
    }
}
