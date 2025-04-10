<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('orders.update', $order) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div>
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                            <select name="product_id" id="product_id"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $order->product_id == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }} - {{ $product->price }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="reservation_id"
                                class="block text-sm font-medium text-gray-700">Reservation</label>
                            <select name="reservation_id" id="reservation_id"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach ($reservations as $reservation)
                                    <option value="{{ $reservation->id }}"
                                        {{ $order->reservation_id == $reservation->id ? 'selected' : '' }}>
                                        {{ $reservation->user_id }} - {{ $reservation->lane_id }} -
                                        {{ $reservation->date }} - {{ $reservation->start_time }} -
                                        {{ $reservation->end_time }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                value="{{ $order->quantity }}">
                        </div>

                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring-gray-300 disabled:opacity-25">
                            Update
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
