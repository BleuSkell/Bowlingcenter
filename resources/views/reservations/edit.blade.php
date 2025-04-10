<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">✏️ Edit Reservation</h1>

        <form action="{{ route('reservations.update', $reservation) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <!-- Lane selection -->
                <div class="form-group">
                    <label for="lane_id" class="block text-sm font-medium text-gray-700">Lane</label>
                    <select name="lane_id" id="lane_id" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-black">
                        <option value="" disabled>Select a lane</option>
                        @foreach($lanes as $lane)
                            <option value="{{ $lane->id }}" {{ $lane->id == $reservation->lane_id ? 'selected' : '' }}>
                                {{ $lane->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Date selection -->
                <div class="form-group">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="date" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('date', $reservation->date) }}" required>
                </div>

                <!-- Start Time selection -->
                <div class="form-group">
                    <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                    <select name="start_time" id="start_time" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                        <!-- Options will be dynamically populated based on the selected day -->
                    </select>
                </div>

                <!-- End Time selection -->
                <div class="form-group">
                    <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                    <select name="end_time" id="end_time" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">
                        <!-- Options will be dynamically populated based on the selected start time -->
                    </select>
                </div>

                <!-- Price selection based on time and day -->
                <div class="form-group">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="text" name="price" id="price" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('price', $reservation->price) }}" readonly>
                </div>

                <!-- Status input -->
                <div class="form-group">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <input type="text" name="status" id="status" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('status', $reservation->status) }}" required>
                </div>

                <!-- Active status checkbox -->
                <div class="form-group">
                    <label for="is_active" class="block text-sm font-medium text-gray-700">Active</label>
                    <input type="checkbox" name="is_active" id="is_active" class="form-check-input" value="1" {{ old('is_active', $reservation->is_active) ? 'checked' : '' }}>
                </div>

                <!-- Comment text area -->
                <div class="form-group">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                    <textarea name="comment" id="comment" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">{{ old('comment', $reservation->comment) }}</textarea>
                </div>

                <!-- Submit button -->
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-black font-semibold px-4 py-2 rounded-lg shadow">
                    Update Reservation
                </button>
            </div>
        </form>
    </div>

    <script>
        // Function to update start and end time based on selected date (weekend or weekday)
        document.getElementById("date").addEventListener("change", function () {
            let selectedDate = new Date(this.value);
            let dayOfWeek = selectedDate.getDay();  // Sunday = 0, Saturday = 6
            let startTimeSelect = document.getElementById("start_time");
            let endTimeSelect = document.getElementById("end_time");
            let priceInput = document.getElementById("price");

            // Clear current options
            startTimeSelect.innerHTML = "";
            endTimeSelect.innerHTML = "";

            // Weekday (Mon - Thu): 14:00 to 22:00
            if (dayOfWeek >= 1 && dayOfWeek <= 4) {
                let weekdayTimes = ["14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00"];
                weekdayTimes.forEach(function(time) {
                    let option = document.createElement("option");
                    option.value = time;
                    option.textContent = time;
                    startTimeSelect.appendChild(option);
                });

                let weekdayEndTimes = ["15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00"];
                weekdayEndTimes.forEach(function(time) {
                    let option = document.createElement("option");
                    option.value = time;
                    option.textContent = time;
                    endTimeSelect.appendChild(option);
                });

                // Price for Monday/Thursday
                priceInput.value = "24 per hour";
            }

            // Weekend (Fri - Sun): 14:00 to 24:00
            else if (dayOfWeek >= 5 && dayOfWeek <= 7) {
                let weekendTimes = ["14:00", "15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00"];
                weekendTimes.forEach(function(time) {
                    let option = document.createElement("option");
                    option.value = time;
                    option.textContent = time;
                    startTimeSelect.appendChild(option);
                });

                let weekendEndTimes = ["15:00", "16:00", "17:00", "18:00", "19:00", "20:00", "21:00", "22:00", "23:00", "24:00"];
                weekendEndTimes.forEach(function(time) {
                    let option = document.createElement("option");
                    option.value = time;
                    option.textContent = time;
                    endTimeSelect.appendChild(option);
                });

                // Price for Friday/Saturday/Sunday
                priceInput.value = "28 per hour (14:00 - 18:00), 33.50 per hour (18:00 - 24:00)";
            }

            // Trigger date change event to prepopulate the fields
            document.getElementById("start_time").dispatchEvent(new Event("change"));
        });

        // Trigger date change event to prepopulate the fields
        document.getElementById("date").dispatchEvent(new Event("change"));
    </script>
</x-app-layout>
