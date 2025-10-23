<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $ServiceArray = [
            [
                'id' => 1,
                'title' => 'Breakfast',
                'link' => '#',
                'image' => asset('assets/images/service-1.jpg'),
                'alt' => 'Dish 1',
            ],
            [
                'id' => 2,
                'title' => 'Appetizers',
                'link' => '#',
                'image' => asset('assets/images/service-2.jpg'),
                'alt' => 'Dish 2',
            ],
            [
                'id' => 3,
                'title' => 'Drinks',
                'link' => '#',
                'image' => asset('assets/images/service-3.jpg'),
                'alt' => 'Dish 3',
            ],
        ];

        $menuArray = [
            [
                'title' => 'Chicken Biryani',
                'tag' => 'Seasonal',
                'description' => 'Tomatoes, green bell pepper, sliced cucumber onion, olives, and feta cheese.',
                'image' => asset('assets/images/menu-1.jpg'),
                'alt' => 'Greek Salad',
                'price' => 250.00,
            ],
            [
                'title' => 'Pasta',
                'description' => 'Vegetables, cheeses, ground meats, tomato sauce, seasonings and spices.',
                'image' => asset('assets/images/menu-2.jpg'),
                'alt' => 'Lasagne',
                'price' => 330.00,
            ],
            [
                'title' => 'Haleem',
                'description' => 'Typesetting industry lorem Lorem Ipsum is simply dummy text of the priand.',
                'image' => asset('assets/images/menu-3.jpg'),
                'alt' => 'Butternut Pumpkin',
                'price' => 210.00,
            ],
            [
                'title' => 'Noodles',
                'tag' => 'New',
                'description' => 'Vegetables, cheeses, ground meats, tomato sauce, seasonings and spices.',
                'image' => asset('assets/images/menu-4.JPG'),
                'alt' => 'Tokusen Wagyu',
                'price' => 330.00,
            ],
            [
                'title' => 'Rolls',
                'description' => 'Avocados with crab meat, red onion, crab salad stuffed red bell pepper and green bell pepper.',
                'image' => asset('assets/images/menu-5.jpg'),
                'alt' => 'Olivas Rellenas',
                'price' => 120.00,
            ],
        ];
        $featuresArray = [
            [
                'icon' => './assets/images/features-icon-1.png',
                'title' => 'Hygienic Food',
                'description' => 'Lorem Ipsum is simply dummy printing and typesetting.',
            ],
            [
                'icon' => './assets/images/features-icon-2.png',
                'title' => 'Fresh Environment',
                'description' => 'Lorem Ipsum is simply dummy printing and typesetting.',
            ],
            [
                'icon' => './assets/images/features-icon-3.png',
                'title' => 'Skilled Chefs',
                'description' => 'Lorem Ipsum is simply dummy printing and typesetting.',
            ],
            [
                'icon' => './assets/images/features-icon-4.png',
                'title' => 'Event & Party',
                'description' => 'Lorem Ipsum is simply dummy printing and typesetting.',
            ],
        ];
        
        return view('pages.home', [
            'ServiceArray' => $ServiceArray,
            'menuArray' => $menuArray,
            'featuresArray' => $featuresArray,
        ]);
    }
}
