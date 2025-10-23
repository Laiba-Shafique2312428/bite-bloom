
# Bite & Bloom Resturant 

A brief description of what this project does and who it's for


## Installation

Install Bite&Bloom Resturant with laravel

```bash
   Extact the zip file 
   go to project folder
   Composer Install
   php artisan serve
   project will runing......
```
    
## Documentation
1. Introduction

Project Title: Bit & Bloom
Project Type: Restaurant Website (Reservation System)
Framework: Laravel (PHP Framework)
Front-end: Blade Template Engine + Components

2. Purpose:
This project is developed to demonstrate a full-stack restaurant website built with Laravel. The website includes pages like Home, About, Menu, and Contact, along with reusable components such as headers, footers, and cards. The site also features a basic reservation system to manage table bookings

3. Project Structure Overview
When working with Laravel, your project folder typically looks like this:
```bash
bitbloom/
│
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       └── PageController.php
│   └── Models/
│
├── resources/
│   ├── views/
│   │   ├── components/
│   │   │   ├── header.blade.php
│   │   │   ├── footer.blade.php
│   │   │   ├── hero-section.blade.php
│   │   │   ├── menu-card.blade.php
│   │   │   └── restaurant-card.blade.php
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   └── pages/
│   │       ├── home.blade.php
│   │       ├── about.blade.php
│   │       ├── menu.blade.php
│   │       └── contact.blade.php
│
├── routes/
│   └── web.php
│
├── public/
│   ├── css/
│   ├── js/
│   └── images/
│
└── .env
```
4. Core Laravel Concepts Used
3.1 Blade Template Engine

Blade is Laravel’s built-in templating engine. It helps in reusing UI elements, passing data, and organizing HTML structure efficiently.

Example of a Blade syntax:

```bash
<h1>{{ $title }}</h1>
```
{{ }} is used to echo PHP variables.

@include, @component, and @yield help organize layout and reusability.

3.2 Components

What are Components?
Components are reusable UI blocks (similar to partials). You can use them across multiple pages.

Example Components Used:

Header Component (header.blade.php) – contains navigation bar and logo.

Footer Component (footer.blade.php) – contains site footer and social links.

Hero Section (hero-section.blade.php) – displays main banner on home page.

Menu Card Component (menu-card.blade.php) – displays menu items.

Restaurant Card Component (restaurant-card.blade.php) – used to show restaurant info or offers.
```bash
   @component('components.hero-section')
   @endcomponent
   @component('components.menu-home-card', [
         'title' => $item['title'],
         'tag' => $item['tag'] ?? null,
         'description' => $item['description'],
         'image' => $item['image'],
         'alt' => $item['alt'],
         'price' => $item['price'],
         ])
    @endcomponent
```
3.3 Layout File (app.blade.php)

The app.blade.php file inside resources/views/layouts/ acts as the main layout template.
It includes the header, footer, and a dynamic content section where pages are loaded.
```bash
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bit & Bloom</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

     @component('components.nav-bar')
     
 @endcomponent

    <main>
        @yield('content')
    </main>

   @component('components.footer')
    
@endcomponent

</body>
</html>

```
3.4 Pages
Each page extends the main layout file and adds its own content.
3.5 Controllers
Purpose:
Controllers handle the logic for routes and decide what data to send to each page.
3.6 Routes
Routes connect URLs to specific controller methods.
5. Assets and Styling
All CSS, JavaScript, and image files are stored in the public/ directory.
6. Key Laravel Features Demonstrated
| Feature              | Description                                                      |
| -------------------- | ---------------------------------------------------------------- |
| **Blade Components** | Used to build reusable UI sections (header, footer, cards).      |
| **Controller**       | Handles logic for each page and connects views with data.        |
| **Routing**          | Maps URLs to specific pages or actions.                          |
| **Views**            | Organized into layout, components, and pages for modular design. |
| **Dynamic Content**  | Data passed from controllers to views using variables.           |

7. Conclusion

The Bit & Bloom Restaurant Website demonstrates how Laravel’s Blade templates, components, and controllers can be used together to build a modular, maintainable, and professional web application.

This project serves as an excellent beginner-level introduction to Laravel development, helping students understand:

MVC structure (Model–View–Controller)

Reusable components

Page routing

Layout-based design