<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
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

        return view('pages.about', [
            'featuresArray' => $featuresArray,
        ]);
    }
}
