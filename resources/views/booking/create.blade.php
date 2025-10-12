<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('Book Your Service Appointment') }}
        </h1>
        <p class="text-center text-gray-600 mb-8 text-lg">{{ __('Fill out the form below and we\'ll confirm your booking shortly.') }}</p>
    </x-slot>

    <div class="max-w-3xl mx-auto bg-white p-8 md:p-12 rounded-2xl shadow-xl border border-gray-200">
    
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md" role="alert">
                <p class="font-bold text-lg">Success!</p>
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <form action="/booking" method="POST">
            @csrf

            <div class="space-y-10">
                <div class="border-b border-gray-200 pb-10">
                    <h2 class="text-2xl font-bold leading-9 text-gray-900">Your Contact Information</h2>
                    <div class="mt-8 grid grid-cols-1 gap-2 sm:grid-cols-2">
                        <div class="sm:col-span-2">
                            <input type="text" name="name" id="name" placeholder="Full Name" value="{{ old('name') }}" required class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                        </div>
                        <div>
                            <input id="email" name="email" type="email" placeholder="Email Address" value="{{ old('email') }}" required class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                        </div>
                        <div>
                            <input type="tel" name="phone" id="phone" placeholder="Phone Number" value="{{ old('phone') }}" required class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                        </div>
                        <div class="sm:col-span-2">
                            <input type="text" name="address" id="address" placeholder="Address" value="{{ old('address') }}" class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                        </div>
                    </div>
                </div>
                
                <div class="border-b border-gray-200 pb-10">
                    <h2 class="text-2xl font-bold leading-9 text-gray-900">Vehicle Details</h2>
                    <div class="mt-8 grid grid-cols-3 gap-2">
                        <div>
                            <select id="make" name="make" required class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                                <option value="">Select Make</option>
                                @foreach($carMakes as $make)
                                    <option value="{{ $make->id }}" {{ old('make') == $make->id ? 'selected' : '' }}>
                                        {{ $make->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <select id="model" name="model" required disabled class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-blue-600 disabled:bg-gray-100">
                                <option value="">Select Make First</option>
                            </select>
                        </div>

                        <div>
                            <input type="number" name="year" id="year" min="1950" max="{{ date('Y') + 1 }}" placeholder="Year" value="{{ old('year') }}" required class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                        </div>
                    </div>
                </div>

                <div>
                    <h2 class="text-2xl font-bold leading-9 text-gray-900">Appointment & Services</h2>
                    <div class="mt-8 grid grid-cols-1 gap-x-8 gap-y-8 sm:grid-cols-1">
                        <div>
                            <input type="datetime-local" name="booking_date" id="booking_date" title="Preferred Date & Time" value="{{ old('booking_date') }}" required class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600">
                        </div>
                        
                        <div class="space-y-4">
                            @foreach($serviceCategories as $category => $services)
                                <div>
                                    <h3 class="font-semibold text-gray-800">{{ $category }}</h3>
                                    <div class="mt-2 space-y-2 pl-2 border-l-2 border-gray-200">
                                        @foreach($services as $service)
                                            <div class="relative flex items-start justify-between">
                                                <div class="flex items-center">
                                                    <input id="service_{{ $service->id }}" name="services[]" type="checkbox" value="{{ $service->id }}" 
                                                        class="h-5 w-5 rounded border-gray-300 text-blue-600 focus:ring-blue-600"
                                                        {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                                    <label for="service_{{ $service->id }}" class="ml-3 font-medium text-gray-900 text-base cursor-pointer">
                                                        {{ $service->name }}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="sm:col-span-1">
                            <textarea id="notes" name="notes" rows="4" placeholder="Additional Notes (Optional)" class="block w-full rounded-md border-0 py-2.5 px-3 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-blue-600">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex items-center justify-end">
                <button type="submit" class="rounded-full bg-blue-600 px-10 py-4 text-lg font-semibold text-white shadow-xl hover:bg-blue-700">Request Appointment</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const makeDropdown = document.getElementById('make');
                const modelDropdown = document.getElementById('model');
                const oldModelId = '{{ old('model', '') }}';

                function fetchModels(makeId) {
                    if (!makeId) {
                        modelDropdown.innerHTML = '<option value="">Select Make First</option>';
                        modelDropdown.disabled = true;
                        return;
                    }

                    modelDropdown.innerHTML = '<option value="">Loading...</option>';
                    modelDropdown.disabled = true;

                    fetch(`/api/models/${makeId}`)
                        .then(response => {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(models => {
                            modelDropdown.innerHTML = '<option value="">Select Model</option>';
                            models.forEach(model => {
                                const option = document.createElement('option');
                                option.value = model.id;
                                option.textContent = model.name;
                                if (model.id == oldModelId) {
                                    option.selected = true;
                                }
                                modelDropdown.appendChild(option);
                            });
                            modelDropdown.disabled = false;
                        })
                        .catch(error => {
                            console.error('Error fetching models:', error);
                            modelDropdown.innerHTML = '<option value="">Could not load models</option>';
                            modelDropdown.disabled = true;
                        });
                }

                makeDropdown.addEventListener('change', function () {
                    fetchModels(this.value);
                });

                // Trigger on page load if a "make" is already selected (e.g., after validation error)
                if (makeDropdown.value) {
                    fetchModels(makeDropdown.value);
                }
            });
        </script>
    @endpush
</x-app-layout>

