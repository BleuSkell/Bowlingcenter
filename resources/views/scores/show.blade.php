<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $reservationScores->date }}
        </h2>

        <button>
            <a href="{{ route('scores.create', ['reservationId' => $reservationScores->id]) }}" class="text-sm text-gray-700 underline">Maak nieuwe score aan</a>
        </button>
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
                            <div class="shrink-0 sm:flex sm:flex-col sm:items-end mt-4 sm:mt-0">
                                <div class="grid sm:justify-center sm:content-center">
                                    <div class="grid sm:justify-self-center">
                                        <a href="{{ route('scores.edit', ['id' => $score->id]) }}" class="text-green-900 font-semibold" onclick="return confirm('Weet je zeker dat je deze score wilt bewerken?')">Bewerk</a>
                                    </div>
                                    
                                    <form action="{{ route('scores.destroy', ['id' => $score->id]) }}" method="post"
                                        onsubmit="return confirm('Weet je zeker dat je deze score wilt verwijderen?')">
                                        
                                        @csrf
                                        @method('delete')
                                        <div class="grid justify-self-start sm:justify-self-center">
                                            <input type="submit" value="Verwijder" class="text-red-600 font-semibold"/>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-app-layout>
