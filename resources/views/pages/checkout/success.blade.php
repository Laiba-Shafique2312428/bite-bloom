@extends('layouts.app', ['title' => 'Home'])

@section('content')


<div class="success-container">
    <div class="success-icon">✓</div>
    <h1>ORDER CONFIRMED</h1>
    <p>Thank you for your order! We've received your purchase and will begin processing it right away.</p>
    
    <div class="order-number">
        <strong>Order Number:</strong> #{{ strtoupper(uniqid()) }}
    </div>

    <p>A confirmation email has been sent to your email address with all the order details.</p>

    <div class="action-buttons">
        <a href="/" class="btn btn-primary">CONTINUE SHOPPING</a>
        <a href="#" class="btn btn-secondary">VIEW ORDER</a>
    </div>
</div>
@endsection
