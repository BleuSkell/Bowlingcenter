<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-bold text-gray-800">
                {{ __('Orders') }}
            </h2>

            <a href="{{ route('orders.create') }}"
                class="inline-flex items-center px-4 py-2 text-sm font-medium text-black transition-colors duration-200 bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create Order
            </a>
        </div>
    </x-slot>

    <div class="w-full py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-lg sm:rounded-xl">
                <div class="p-6">
                    <div class="overflow-x-auto">
                        <table class="w-full min-w-full divide-y divide-gray-200">
                            <thead class="text-left">
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                        Product
                                    </th>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                        Quantity
                                    </th>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                        Total Price
                                    </th>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-4 text-xs font-semibold tracking-wider text-left text-gray-500 uppercase">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($orders as $order)
                                    <tr class="transition-colors duration-150 hover:bg-gray-50">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-900">
                                            {{ $order->product->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $order->quantity }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            ${{ number_format($order->total_price, 2) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <span
                                                class="inline-flex px-2 py-1 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">
                                                {{ $order->status }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 space-x-3 text-sm font-medium">
                                            <a href="{{ route('orders.show', $order->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">View</a>
                                            <a href="{{ route('orders.edit', $order->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <a href="{{ route('orders.destroy', $order->id) }}"
                                                class="text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
