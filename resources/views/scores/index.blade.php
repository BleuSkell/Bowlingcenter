<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                @if (session('error'))
                    <div class="w-4/5 bg-red-500 text-white p-2 mb-4 mt-4 rounded text-center">
                        {{ session('error') }}
                    </div>
                @elseif (session('success'))
                    <div class="w-4/5 bg-green-500 text-white p-2 mb-4 mt-4 rounded text-center">
                        {{ session('success') }}
                    </div>
                @endif
            </div>

            @if ($reservations)
                <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($reservations as $reservation)
                        <a href="{{ route('scores.show', $reservation->id) }}">
                            <li class="flex flex-col sm:flex-row justify-between gap-x-6 p-5 bg-white rounded-md mb-5">
                                <div class="flex min-w-0 gap-x-4">
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-base font-semibold text-black">
                                            Game: {{ $reservation->date }}
                                        </p>
                                        <p class="mt-1 truncate text-sm text-gray-600">
                                                Hello
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-app-layout>
