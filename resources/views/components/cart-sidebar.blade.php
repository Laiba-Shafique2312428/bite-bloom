<aside id="cart-drawer" class="cart-drawer" aria-hidden="true">
    <div class="cart-header">
        <h3>Your Cart</h3>
        <button type="button" class="close-btn" onclick="toggleCart(false)">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    <div id="cart-items" class="cart-items">
        <!-- Items will be rendered here -->
    </div>

    <div class="cart-footer">
        <div class="cart-total">
            <span class="total-label">Total:</span>
            <span id="cart-total" class="total-amount">PKR 0.00</span>
        </div>
        <a href="/checkout" class="checkout-btn">Proceed to Checkout</a>
        <a href="/cart" class="cart-btn">View cart</a>
    </div>

    <style>
        /* Updated entire styling to match Bite & Bloom brand theme */
        .cart-drawer {
            position: fixed;
            right: 0;
            top: 0;
            height: 100vh;
            width: 380px;
            background: #D4B896;
            box-shadow: -8px 0 32px rgba(0, 0, 0, 0.15);
            padding: 0;
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1200;
            display: flex;
            flex-direction: column;
        }

        .cart-drawer.open {
            transform: translateX(0);
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 24px;
            border-bottom: 1px solid rgba(58, 58, 58, 0.1);
            background: #D4B896;
        }

        .cart-header h3 {
            font-size: 24px;
            font-weight: 600;
            color: #3a3a3a;
            margin: 0;
            letter-spacing: 0.5px;
        }

        .close-btn {
            background: transparent;
            border: none;
            color: #3a3a3a;
            cursor: pointer;
            padding: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: all 0.2s ease;
        }

        .close-btn:hover {
            background: rgba(58, 58, 58, 0.1);
        }

        .cart-items {
            flex: 1;
            overflow-y: auto;
            padding: 16px 24px;
            background: #D4B896;
        }

        .cart-items::-webkit-scrollbar {
            width: 6px;
        }

        .cart-items::-webkit-scrollbar-track {
            background: rgba(58, 58, 58, 0.05);
        }

        .cart-items::-webkit-scrollbar-thumb {
            background: rgba(58, 58, 58, 0.2);
            border-radius: 3px;
        }

        .cart-item {
            display: flex;
            gap: 16px;
            padding: 16px;
            margin-bottom: 12px;
            background: rgba(255, 255, 255, 0.5);
            border-radius: 12px;
            border: 1px solid rgba(58, 58, 58, 0.08);
            transition: all 0.2s ease;
            color: black;
        }

        .cart-item:hover {
            background: rgba(255, 255, 255, 0.7);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .cart-item img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid rgba(58, 58, 58, 0.1);
        }

        .cart-item strong {
            color: #3a3a3a;
            font-size: 15px;
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
        }

        .cart-item button {
            background: #3a3a3a;
            color: #D4B896;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .cart-item button:hover {
            background: #2a2a2a;
            transform: translateY(-1px);
        }

        .cart-footer {
            padding: 24px;
            border-top: 1px solid rgba(58, 58, 58, 0.1);
            background: #D4B896;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 16px;
            padding: 16px;
            background: rgba(255, 255, 255, 0.4);
            border-radius: 8px;
        }

        .total-label {
            font-size: 16px;
            font-weight: 600;
            color: #3a3a3a;
        }

        .total-amount {
            font-size: 24px;
            font-weight: 700;
            color: #3a3a3a;
        }

        .checkout-btn {
            width: 100%;
            background: #3a3a3a;
            color: #D4B896;
            border: none;
            padding: 16px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            text-align: center;
        }
          .cart-btn {
            width: 100%;
            background: #3a3a3a;
            color: #D4B896;
            border: none;
            padding: 16px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 0.5px;
            margin-top: 25px;
            text-align: center;
        }

        .checkout-btn:hover {
            background: #2a2a2a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
         .cart-btn:hover {
            background: #2a2a2a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }


        .cart-count {
            background: #3a3a3a;
            color: #D4B896;
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 8px;
        }

        /* Added responsive styles for mobile */
        @media (max-width: 480px) {
            .cart-drawer {
                width: 100%;
            }
        }
    </style>

    <script>
        (function() {
            function getCsrf() {
                const m = document.querySelector('meta[name="csrf-token"]');
                return m ? m.content : '';
            }

            async function loadCart() {
                const res = await fetch('/cart/items', { credentials: 'same-origin' });
                if (!res.ok) return [];
                return await res.json();
            }

            function formatPrice(v) {
                return 'PKR' + (Number(v) || 0).toFixed(2)
            }

            window.addToCart = async function(item) {
                const token = getCsrf();
                await fetch('/cart/add', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token },
                    credentials: 'same-origin',
                    body: JSON.stringify(item)
                });
                await renderCart();
                toggleCart(true);
            }

            window.removeFromCart = async function(index) {
                const token = getCsrf();
                await fetch('/cart/remove', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': token },
                    credentials: 'same-origin',
                    body: JSON.stringify({ index })
                });
                await renderCart();
            }

            window.toggleCart = function(open) {
                const el = document.getElementById('cart-drawer');
                if (!el) return;
                if (open) el.classList.add('open'), el.setAttribute('aria-hidden', 'false');
                else el.classList.remove('open'), el.setAttribute('aria-hidden', 'true');
            }

            function updateCartCount(count) {
                const span = document.getElementById('cart-count');
                if (span) span.textContent = count;
            }

            window.renderCart = async function() {
                const items = await loadCart();
                const container = document.getElementById('cart-items');
                const totalEl = document.getElementById('cart-total');
                if (!container) return;
                container.innerHTML = '';
                let total = 0;
                items.forEach((it, idx) => {
                    const div = document.createElement('div');
                    div.className = 'cart-item';
                    div.innerHTML = `
                        <img src="${it.image||'https://via.placeholder.com/80x60'}" alt="${it.title}">
                        <div style="flex:1">
                          <strong>${it.title}</strong>
                          <div>${formatPrice(it.price)}</div>
                          <div style="margin-top:6px; display:flex;align-items:center">
                              <button onclick="changeQty(${idx}, -1)">-</button>
                              <span style="margin:0 8px">${it.qty}</span>
                              <button onclick="changeQty(${idx}, 1)">+</button>
                          </div>
                        </div>
                        <div style="display:flex;flex-direction:column;align-items:flex-end">
                          <div>${formatPrice((Number(it.price)||0) * (it.qty||1))}</div>
                          <button style="margin-top:8px" onclick="removeFromCart(${idx})">Remove</button>
                        </div>
                    `;
                    container.appendChild(div);
                    total += (Number(it.price) || 0) * (it.qty || 1);
                });
                totalEl.textContent = formatPrice(total);
                updateCartCount(items.reduce((s, i) => s + (i.qty || 0), 0));
            }

            window.changeQty = async function(index, delta) {
                // fetch current items, modify qty and submit via add/remove endpoints
                const items = await loadCart();
                if (!items[index]) return;
                const item = items[index];
                item.qty = (item.qty || 1) + delta;
                if (item.qty < 1) {
                    // remove
                    await removeFromCart(index);
                    return;
                }
                // update session by clearing and re-adding all (simple approach)
                // We'll call clear then re-add items with qty
                const token = getCsrf();
                await fetch('/cart/clear', { method: 'POST', headers: {'X-CSRF-TOKEN': token}, credentials: 'same-origin' });
                for (let i = 0; i < items.length; i++) {
                    const it = items[i];
                    const qty = (i === index) ? item.qty : (it.qty||1);
                    for (let q = 0; q < qty; q++) {
                        await fetch('/cart/add', { method: 'POST', headers: {'Content-Type':'application/json','X-CSRF-TOKEN': token}, credentials: 'same-origin', body: JSON.stringify({ title: it.title, price: it.price, image: it.image||'', alt: it.alt||'' }) });
                    }
                }
                await renderCart();
            }

            // initialize
            document.addEventListener('DOMContentLoaded', function() {
                renderCart();
            });
        })();
    </script>
</aside>
