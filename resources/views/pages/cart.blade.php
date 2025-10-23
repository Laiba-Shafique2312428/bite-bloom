@extends('layouts.app', ['title' => 'Shopping Cart'])



@section('content')




<div class="cart-container">
    <div class="cart-itemss">
        <h1 class="cart-title">Shopping Cart</h1>
        
        @if(count($cart) > 0)
            <div id="cart-itemss-list">
                @foreach($cart as $id => $item)
                <div class="cart-item" data-item-id="{{ $id }}">
                    <img src="{{ $item['image'] }}" alt="{{ $item['alt'] }}" class="item-image">
                    <div class="item-details">
                        <div class="item-name">{{ $item['title'] }}</div>
                        <div class="item-price">PKR {{ number_format($item['price'], 2) }} each</div>
                        <div class="item-actions">
                            <div class="quantity-control">
                                <button class="quantity-btn decrease-qty" data-id="{{ $id }}">-</button>
                                <span class="quantity-display">{{ $item['qty'] }}</span>
                                <button class="quantity-btn increase-qty" data-id="{{ $id }}">+</button>
                            </div>
                            <button class="remove-btn" data-id="{{ $id }}">Remove</button>
                        </div>
                    </div>
                    <div class="item-total">
                        <span class="item-total-amount">PKR {{ number_format($item['price'] * $item['qty'], 2) }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="empty-cart">
                <div class="empty-cart-icon">🛒</div>
                <div class="empty-cart-text">Your cart is empty</div>
                <a href="/" class="continue-shopping">Continue Shopping</a>
            </div>
        @endif
    </div>

    @if(count($cart) > 0)
    <div class="cart-summary">
        <h2 class="summary-title">Order Summary</h2>
        <div class="summary-row">
            <span>Subtotal</span>
            <span id="subtotal">PKR {{ $total['subtotal'] }}</span>
        </div>
        <div class="summary-row">
            <span>Shipping</span>
            <span id="shipping">PKR {{ $total['shipping'] }}</span>
        </div>
        <div class="summary-row">
            <span>Tax</span>
            <span id="tax">PKR {{ $total['tax'] }}</span>
        </div>
        <div class="summary-row total">
            <span>Total</span>
            <span id="total">PKR {{ $total['total'] }}</span>
        </div>
        <a href="/checkout" class="checkout-btn" >Proceed to Checkout</a>
    </div>
    @endif
</div>
s
<script>
  
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';

  
    document.querySelectorAll('.increase-qty, .decrease-qty').forEach(btn => {
        btn.addEventListener('click', async function() {
            const itemId = this.dataset.id;
            const cartItem = this.closest('.cart-item');
            const quantityDisplay = cartItem.querySelector('.quantity-display');
            let currentQty = parseInt(quantityDisplay.textContent);
            
            if (this.classList.contains('increase-qty')) {
                currentQty++;
            } else if (this.classList.contains('decrease-qty') && currentQty > 1) {
                currentQty--;
            } else {
                return;
            }

            try {
                const response = await fetch('{{ route("cart.update") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        id: itemId,
                        quantity: currentQty
                    })
                });

                const data = await response.json();
                
                if (data.success) {
                    quantityDisplay.textContent = currentQty;
                    updateTotals(data.total);
                    
                    // Update item total
                    const itemPrice = parseFloat(cartItem.querySelector('.item-price').textContent.replace('$', '').replace(' each', ''));
                    const itemTotal = cartItem.querySelector('.item-total-amount');
                    itemTotal.textContent = (itemPrice * currentQty).toFixed(2);
                }
            } catch (error) {
                console.error('Error updating quantity:', error);
                alert('Failed to update quantity. Please try again.');
            }
        });
    });

   
    document.querySelectorAll('.remove-btn').forEach(btn => {
        btn.addEventListener('click', async function() {
            if (!confirm('Are you sure you want to remove this item?')) {
                return;
            }

            const itemId = this.dataset.id;
            const cartItem = this.closest('.cart-item');

            try {
                const response = await fetch('{{ route("cart.remove") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({
                        id: itemId
                    })
                });

                const data = await response.json();
                
                if (data.success) {
                    // Update DOM
                    cartItem.remove();
                    updateTotals(data.total);
                    updateCartCount();

                    // If cart empty on server, reload to show empty state
                    if (!data.cart || Object.keys(data.cart).length === 0) {
                        location.reload();
                    }
                }
            } catch (error) {
                console.error('Error removing item:', error);
                alert('Failed to remove item. Please try again.');
            }
        });
    });

   
    function updateTotals(total) {
        document.getElementById('subtotal').textContent = 'PKR' + total.subtotal;
        document.getElementById('shipping').textContent = 'PKR' + total.shipping;
        document.getElementById('tax').textContent = 'PKR' + total.tax;
        document.getElementById('total').textContent = 'PKR' + total.total;
    }


    async function updateCartCount() {
        try {
            const response = await fetch('{{ route("cart.count") }}');
            const data = await response.json();
            document.getElementById('cart-count').textContent = data.count;
        } catch (error) {
            console.error('Error updating cart count:', error);
        }
    }

 
    
</script>
@endsection
