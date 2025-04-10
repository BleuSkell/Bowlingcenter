<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bewerk score') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form action="{{ route('scores.update', $score->id) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <label for="person" class="block text-sm font-medium text-gray-700">Person</label>
                    <input type="text" name="person" id="person" value="{{ old('person', $score->person) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('person')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="score" class="block text-sm font-medium text-gray-700">Score</label>
                    <input type="number" name="score" id="score" value="{{ old('score', $score->score) }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                    @error('score')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Update</button>
            </form>
        </div>
    </div>
</x-app-layout>