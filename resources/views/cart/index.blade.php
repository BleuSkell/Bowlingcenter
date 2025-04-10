<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Cart') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div id="empty-cart-message" class="p-8 text-center" style="display: none;">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-400" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                        </svg>
                        <h3 class="mb-2 text-xl font-semibold text-gray-700">Cart is Empty</h3>
                        <p class="mb-4 text-gray-500">Your cart is empty.</p>
                        <a href="{{ route('extras.index') }}"
                            class="px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Continue Shopping
                        </a>
                    </div>

                    <div class="mb-6">
                        <label for="reservation_id" class="block text-sm font-medium text-gray-700">Reservation</label>
                        <select name="reservation_id" id="reservation_id"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            @if (count($reservations) <= 0)
                                <option value="">No active reservations found</option>
                            @else
                                @foreach ($reservations as $reservation)
                                    <option value="{{ $reservation->id }}">{{ $reservation->id }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div id="cart-items-container" class="mb-6">
                        <!-- Cart items will be displayed here by JavaScript -->
                    </div>

                    <div id="cart-total" class="mb-6">
                        <!-- Cart total will be displayed here by JavaScript -->
                    </div>

                    <div class="flex justify-between">
                        <a href="{{ route('extras.index') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 transition-colors duration-200 bg-gray-200 rounded-lg hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            Continue Shopping
                        </a>
                        <button id="checkout-button" onclick="checkout()"
                            class="px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Order Now
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/cart.js') }}"></script>
    <script>
        // Display cart items when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            displayCartItems();
        });

        // Checkout function
        function checkout() {
            const cartItems = getCartItems();

            if (cartItems.length === 0) {
                showNotification('Your cart is empty!', 'error');
                return;
            }

            // Create a form to submit the cart data
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = '{{ route('cart.checkout') }}';

            // Add CSRF token
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            form.appendChild(csrfToken);

            // Add cart data
            const cartData = document.createElement('input');
            cartData.type = 'hidden';
            cartData.name = 'cart_data';
            cartData.value = JSON.stringify(cartItems);
            form.appendChild(cartData);

            // Add reservation ID if available
            const reservationId = document.getElementById('reservation_id').value;
            if (reservationId) {
                const reservationInput = document.createElement('input');
                reservationInput.type = 'hidden';
                reservationInput.name = 'reservation_id';
                reservationInput.value = reservationId;
                form.appendChild(reservationInput);
            }

            // Submit the form
            document.body.appendChild(form);
            form.submit();
        }
    </script>
</x-app-layout>
