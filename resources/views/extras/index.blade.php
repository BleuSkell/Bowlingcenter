<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Extras') }}
            </h2>
            <a href="{{ route('cart.index') }}"
                class="relative flex items-center px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
                Cart
                <span id="cart-count"
                    class="absolute flex items-center justify-center w-5 h-5 text-xs font-bold text-white bg-red-500 rounded-full -top-2 -right-2"
                    style="display: none;">0</span>
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach ($products as $product)
                    <div
                        class="flex flex-col h-full overflow-hidden transition-all duration-300 bg-white rounded-lg shadow-lg hover:shadow-xl hover:-translate-y-1">
                        <div class="relative h-64 overflow-hidden bg-gray-100 rounded-t-lg">
                            @if ($product->image_url)
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}"
                                    class="absolute inset-0 object-cover w-full h-full transition-transform duration-300 hover:scale-110" />
                            @else
                                <div class="flex items-center justify-center w-full h-full bg-gray-200">
                                    <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="flex flex-col flex-grow p-4">
                            <h3 class="mb-2 text-lg font-semibold text-gray-800">{{ $product->name }}</h3>
                            <p class="mb-4 text-sm text-gray-600 line-clamp-2">{{ $product->description }}</p>
                            <div class="flex items-center justify-between mt-auto">
                                <span
                                    class="text-lg font-bold text-indigo-600">€{{ number_format($product->price, 2) }}</span>
                                <button
                                    onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})"
                                    class="px-4 py-2 text-sm font-medium text-white transition-colors duration-200 bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="{{ asset('js/cart.js') }}"></script>
</x-app-layout>
