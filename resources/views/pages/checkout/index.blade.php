@extends('layouts.app',['title'=>'Checkout'])



@section('content')

<div class="checkout-container">


    @if ($errors->any())
        <div class="error-message">
            <ul style="margin: 0; padding-left: 20px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('checkout.process') }}" method="POST" id="checkoutForm">
        @csrf
        <div class="checkout-grid">
            <div class="checkout-form">
                <!-- Customer Information -->
                <div class="form-section">
                    <h2>Customer Information</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="first_name">First Name *</label>
                            <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last Name *</label>
                            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="form-section">
                    <h2>Shipping Address</h2>
                    <div class="form-group full-width">
                        <label for="shipping_address">Street Address *</label>
                        <input type="text" id="shipping_address" name="shipping_address" value="{{ old('shipping_address') }}" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="shipping_city">City *</label>
                            <input type="text" id="shipping_city" name="shipping_city" value="{{ old('shipping_city') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_state">State *</label>
                            <input type="text" id="shipping_state" name="shipping_state" value="{{ old('shipping_state') }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="shipping_zip">ZIP Code *</label>
                            <input type="text" id="shipping_zip" name="shipping_zip" value="{{ old('shipping_zip') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="shipping_country">Country *</label>
                            <input type="text" id="shipping_country" name="shipping_country" value="{{ old('shipping_country', 'United States') }}" required>
                        </div>
                    </div>
                </div>

                <!-- Billing Address -->
                <div class="form-section">
                    <h2>Billing Address</h2>
                    <div class="checkbox-group">
                        <input type="checkbox" id="same_as_shipping" checked>
                        <label for="same_as_shipping">Same as shipping address</label>
                    </div>
                    <div id="billing_fields" style="display: none;">
                        <div class="form-group full-width">
                            <label for="billing_address">Street Address *</label>
                            <input type="text" id="billing_address" name="billing_address" value="{{ old('billing_address') }}">
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="billing_city">City *</label>
                                <input type="text" id="billing_city" name="billing_city" value="{{ old('billing_city') }}">
                            </div>
                            <div class="form-group">
                                <label for="billing_state">State *</label>
                                <input type="text" id="billing_state" name="billing_state" value="{{ old('billing_state') }}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="billing_zip">ZIP Code *</label>
                                <input type="text" id="billing_zip" name="billing_zip" value="{{ old('billing_zip') }}">
                            </div>
                            <div class="form-group">
                                <label for="billing_country">Country *</label>
                                <input type="text" id="billing_country" name="billing_country" value="{{ old('billing_country', 'United States') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="form-section">
                    <h2>Payment Method</h2>
                    <div class="payment-methods">
                        <label class="payment-option selected">
                            <input type="radio" name="payment_method" value="credit_card" checked>
                            <span>Credit Card</span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="paypal">
                            <span>PayPal</span>
                        </label>
                        <label class="payment-option">
                            <input type="radio" name="payment_method" value="bank_transfer">
                            <span>Bank Transfer</span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="order-summary">
                <h2>Order Summary</h2>
                
                @foreach($cart as $id => $item)
                <div class="summary-item">
                    <div class="item-details">
                        <div class="item-image">
                            <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" style="width: 100%; height: 100%; object-fit: cover; border-radius: 8px;">
                        </div>
                        <div class="item-info">
                            <h4>{{ $item['title'] }}</h4>
                            <p>Qty: {{ $item['qty'] }}</p>
                        </div>
                    </div>
                    <div class="item-price">PKR {{ number_format($item['price'] * $item['qty'], 2) }}</div>
                </div>
                @endforeach

                <div class="summary-totals">
                    <div class="total-row">
                        <span>Subtotal:</span>
                        <span>PKR {{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Tax (10%):</span>
                        <span>PKR {{ number_format($tax, 2) }}</span>
                    </div>
                    <div class="total-row">
                        <span>Shipping:</span>
                        <span>PKR {{ number_format($shipping, 2) }}</span>
                    </div>
                    <div class="total-row grand-total">
                        <span>Total:</span>
                        <span>PKR{{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <button type="submit" class="place-order-btn">PLACE ORDER</button>
            </div>
        </div>
    </form>
</div>


@endsection
