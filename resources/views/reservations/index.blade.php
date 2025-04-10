<x-app-layout>
<div class="max-w-7xl mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">📅 Reserveringen</h1>
        <a href="{{ route('reservations.create') }}" class="bg-yellow-400 hover:bg-yellow-300 text-black font-semibold px-4 py-2 rounded-lg shadow">
            + Nieuwe Reservering
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-yellow-100 text-black">
                <tr>
                    @foreach(['Datum','Starttijd','Eindtijd','Lane','Volwassenen','Kinderen','Prijs','Status','Actief','Acties'] as $heading)
                        <th class="px-4 py-3 text-left font-semibold">{{ $heading }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @forelse ($reservations as $reservation)
                    <tr class="hover:bg-yellow-50 transition">
                        <td class="px-4 py-2">{{ $reservation->date }}</td>
                        <td class="px-4 py-2">{{ $reservation->start_time }}</td>
                        <td class="px-4 py-2">{{ $reservation->end_time }}</td>
                        <td class="px-4 py-2">{{ $reservation->lane->lane_number ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $reservation->adult_count }}</td>
                        <td class="px-4 py-2">{{ $reservation->child_count }}</td>
                        <td class="px-4 py-2">€{{ number_format($reservation->price, 2, ',', '.') }}</td>
                        <td class="px-4 py-2">
                            <span class="px-2 py-1 text-xs font-medium rounded-full
                                @if($reservation->status === 'confirmed') bg-green-200 text-green-800
                                @elseif($reservation->status === 'pending') bg-yellow-200 text-yellow-800
                                @else bg-red-200 text-red-800 @endif">
                                {{ ucfirst($reservation->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <span class="text-xs px-2 py-1 rounded-full {{ $reservation->is_active ? 'bg-yellow-300 text-black' : 'bg-gray-300 text-gray-700' }}">
                                {{ $reservation->is_active ? 'Ja' : 'Nee' }}
                            </span>
                        </td>
                        <td class="px-4 py-2">
                            <div class="flex gap-2">
                                <a href="{{ route('reservations.edit', $reservation->id) }}" class="text-yellow-500 hover:text-yellow-600">✏️</a>
                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" onsubmit="return confirm('Weet je het zeker?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500 hover:text-red-600">🗑️</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="px-4 py-6 text-center text-gray-500">Geen reserveringen gevonden.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6 text-sm text-gray-600 flex justify-between items-center">
        <div>
            Totaal: {{ $reservations->total() }}
        </div>
        <div>
            {{ $reservations->links() }}
        </div>
    </div>
</div>
</x-app-layout>
