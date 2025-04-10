<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $reservationScores->date }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if ($reservationScores)
                <ul role="list" class="divide-y divide-gray-100">
                    @foreach ($reservationScores->score as $score)
                        <li class="flex flex-col sm:flex-row justify-between gap-x-6 p-5 bg-white rounded-md mb-5">
                            <div class="flex min-w-0 gap-x-4">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-base font-semibold text-black">
                                        Name: {{ $score->person }}
                                    </p>
                                    <p class="text-base font-semibold text-black">
                                        Score: {{ $score->score }}
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-app-layout>
