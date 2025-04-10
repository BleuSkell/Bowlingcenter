<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">
            {{ __('Create Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if (session('error'))
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <form action="{{ route('orders.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label for="product_id" class="block text-sm font-medium text-gray-700">Product</label>
                            <select name="product_id" id="product_id"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ $product->id == old('product_id') ? 'selected' : '' }}>
                                        {{ $product->name }} -
                                        {{ $product->price }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="reservation_id"
                                class="block text-sm font-medium text-gray-700">Reservation</label>
                            <select name="reservation_id" id="reservation_id"
                                class="block w-full mt-1 text-black border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="" disabled selected>Select a reservation</option>
                                @foreach ($reservations as $reservation)
                                    <option value="{{ $reservation->id }}"
                                        {{ $reservation->id == old('reservation_id') ? 'selected' : '' }}>
                                        Reservation #{{ $reservation->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        @if (old('reservation_id'))
                            @php
                                $selectedReservation = $reservations->firstWhere('id', old('reservation_id'));
                            @endphp
                            @if ($selectedReservation)
                                <div class="p-4 mt-4 rounded-lg bg-gray-50">
                                    <h3 class="mb-3 text-lg font-medium text-gray-900">Reservation Details</h3>
                                    <dl class="grid grid-cols-1 gap-2 sm:grid-cols-2">
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Reservation ID</dt>
                                            <dd class="text-sm text-gray-900">{{ $selectedReservation->id }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Date</dt>
                                            <dd class="text-sm text-gray-900">{{ $selectedReservation->date }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">Start Time</dt>
                                            <dd class="text-sm text-gray-900">{{ $selectedReservation->start_time }}
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-gray-500">End Time</dt>
                                            <dd class="text-sm text-gray-900">{{ $selectedReservation->end_time }}</dd>
                                        </div>
                                    </dl>
                                </div>
                            @endif
                        @endif

                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity</label>
                            <input type="number" name="quantity" id="quantity" min="1"
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                required value="{{ old('quantity') }}">
                        </div>

                        <div class="flex justify-end">
                            <button type="submit"
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Create Order
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
