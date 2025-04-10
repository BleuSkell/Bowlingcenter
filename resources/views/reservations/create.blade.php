<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold text-gray-900 mb-6">📅 Create Reservation</h1>

        <!-- Display validation errors -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('reservations.store') }}" method="POST">
            @csrf

            <div class="space-y-4">
                <!-- Lane selection -->
                <div class="form-group">
                    <label for="lane_id" class="block text-sm font-medium text-gray-700">Lane</label>
                    <select name="lane_id" id="lane_id" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 text-black bg-white">
                        <option value="" disabled selected>Select a lane</option>
                        @foreach($lanes as $lane)
                            <option value="{{ $lane->id }}" {{ old('lane_id') == $lane->id ? 'selected' : '' }}>
                                {{ $lane->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Date selection -->
                <div class="form-group">
                    <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                    <input type="date" name="date" id="date" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('date') }}" required>
                </div>

                <!-- Start Time selection -->
                <div class="form-group">
                    <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                    <select name="start_time" id="start_time" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 bg-white">
                        <!-- Options will be dynamically populated based on the selected date -->
                    </select>
                </div>

                <!-- End Time selection -->
                <div class="form-group">
                    <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                    <select name="end_time" id="end_time" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 bg-white">
                        <!-- Options will be dynamically populated based on the selected start time -->
                    </select>
                </div>

                <!-- Price selection based on time and day -->
                <div class="form-group">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="text" name="price" id="price" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" readonly>
                </div>

                <!-- Number of People selection -->
                <div class="form-group">
                    <label for="adult_count" class="block text-sm font-medium text-gray-700">Adults</label>
                    <input type="number" name="adult_count" id="adult_count" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('adult_count', 8) }}" required min="1">
                </div>

                <div class="form-group">
                    <label for="child_count" class="block text-sm font-medium text-gray-700">Children</label>
                    <input type="number" name="child_count" id="child_count" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500" value="{{ old('child_count', 0) }}" min="0">
                </div>

                <!-- Status input -->
                <div class="form-group">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500 bg-white">
                        <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ old('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="cancelled" {{ old('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <!-- Active status checkbox -->
                <div class="form-group">
                    <label for="is_active" class="flex items-center">
                        <input type="checkbox" name="is_active" id="is_active" class="rounded border-gray-300 text-yellow-500 shadow-sm focus:border-yellow-500 focus:ring focus:ring-yellow-200 focus:ring-opacity-50" value="1" {{ old('is_active', 1) ? 'checked' : '' }}>
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>

                <!-- Comment text area -->
                <div class="form-group">
                    <label for="comment" class="block text-sm font-medium text-gray-700">Comment</label>
                    <textarea name="comment" id="comment" class="form-control mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-yellow-500 focus:border-yellow-500">{{ old('comment') }}</textarea>
                </div>

                <!-- Submit button -->
                <button type="submit" class="bg-yellow-500 hover:bg-yellow-400 text-black font-semibold px-4 py-2 rounded-lg shadow">
                    Create Reservation
                </button>
            </div>
        </form>
    </div>

    <script>
        // Function to calculate price based on date, start time, and duration
        function calculatePrice() {
            const date = document.getElementById('date').value;
            const startTime = document.getElementById('start_time').value;
            const endTime = document.getElementById('end_time').value;
            
            if (!date || !startTime || !endTime) return;
            
            const selectedDate = new Date(date);
            const dayOfWeek = selectedDate.getDay(); // 0 = Sunday, 1 = Monday, etc.
            
            // Parse hours for calculation
            const startHour = parseInt(startTime.split(':')[0]);
            const endHour = parseInt(endTime.split(':')[0]);
            const hours = endHour - startHour;
            
            let hourlyRate = 0;
            let priceDisplay = '';
            let totalPrice = 0;
            
            // Weekday rates (Monday - Thursday)
            if (dayOfWeek >= 1 && dayOfWeek <= 4) {
                hourlyRate = 24;
                totalPrice = hourlyRate * hours;
                priceDisplay = `€${totalPrice.toFixed(2)} (€${hourlyRate} per hour)`;
            } 
            // Weekend rates (Friday - Sunday)
            else {
                // Early rate (14:00 - 18:00)
                if (startHour < 18) {
                    // If both start and end time are before 18:00
                    if (endHour <= 18) {
                        hourlyRate = 28;
                        totalPrice = hourlyRate * hours;
                        priceDisplay = `€${totalPrice.toFixed(2)} (€${hourlyRate} per hour)`;
                    } 
                    // If start time is before 18:00 but end time is after 18:00
                    else {
                        const earlyHours = 18 - startHour;
                        const lateHours = endHour - 18;
                        const earlyRate = 28;
                        const lateRate = 33.50;
                        totalPrice = (earlyRate * earlyHours) + (lateRate * lateHours);
                        priceDisplay = `€${totalPrice.toFixed(2)} (€${earlyRate}/hr before 18:00, €${lateRate}/hr after 18:00)`;
                    }
                } 
                // Late rate (18:00 - 24:00)
                else {
                    hourlyRate = 33.50;
                    totalPrice = hourlyRate * hours;
                    priceDisplay = `€${totalPrice.toFixed(2)} (€${hourlyRate} per hour)`;
                }
            }
            
            // Update the price input
            document.getElementById('price').value = priceDisplay;
        }

        // Function to update endTime options based on selected startTime
        function updateEndTimeOptions() {
            const startTime = document.getElementById('start_time').value;
            const endTimeSelect = document.getElementById('end_time');
            const date = document.getElementById('date').value;
            const selectedDate = new Date(date);
            const dayOfWeek = selectedDate.getDay();
            
            // Clear current options
            endTimeSelect.innerHTML = "";
            
            if (!startTime) return;
            
            const startHour = parseInt(startTime.split(':')[0]);
            let maxHour = 22; // Default for weekdays
            
            // Update max hour based on day of week
            if (dayOfWeek >= 5 || dayOfWeek === 0) { // Friday, Saturday, Sunday
                maxHour = 24;
            }
            
            // Add end time options starting from start_time + 1 hour
            for (let hour = startHour + 1; hour <= maxHour; hour++) {
                const timeStr = `${hour.toString().padStart(2, '0')}:00`;
                const option = document.createElement("option");
                option.value = timeStr;
                option.textContent = timeStr;
                endTimeSelect.appendChild(option);
            }
            
            // Trigger price calculation
            calculatePrice();
        }

        // Function to update start and end time based on selected date (weekend or weekday)
        document.getElementById("date").addEventListener("change", function () {
            const selectedDate = new Date(this.value);
            const dayOfWeek = selectedDate.getDay();  // Sunday = 0, Saturday = 6
            const startTimeSelect = document.getElementById("start_time");
            
            // Clear current options
            startTimeSelect.innerHTML = "";
            
            // Weekdays (Monday - Thursday): 14:00 - 22:00
            if (dayOfWeek >= 1 && dayOfWeek <= 4) {
                const weekdayTimes = Array.from({length: 9}, (_, i) => i + 14)
                    .map(hour => `${hour.toString().padStart(2, '0')}:00`);
                
                weekdayTimes.forEach(function(time) {
                    const option = document.createElement("option");
                    option.value = time;
                    option.textContent = time;
                    startTimeSelect.appendChild(option);
                });
            }
            // Weekend (Friday - Sunday): 14:00 - 24:00
            else {
                const weekendTimes = Array.from({length: 10}, (_, i) => i + 14)
                    .map(hour => `${hour.toString().padStart(2, '0')}:00`);
                
                weekendTimes.forEach(function(time) {
                    const option = document.createElement("option");
                    option.value = time;
                    option.textContent = time;
                    startTimeSelect.appendChild(option);
                });
            }
            
            // Update end time options based on selected start time
            if (startTimeSelect.options.length > 0) {
                startTimeSelect.selectedIndex = 0;
                updateEndTimeOptions();
            }
        });
        
        // Listen for changes to start time to update end time options
        document.getElementById("start_time").addEventListener("change", updateEndTimeOptions);
        
        // Listen for changes to end time to update price
        document.getElementById("end_time").addEventListener("change", calculatePrice);
        
        // Trigger date change event on page load to populate the fields
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("date").dispatchEvent(new Event("change"));
        });
    </script>
</x-app-layout>
