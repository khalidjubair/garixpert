<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center font-semibold text-3xl text-gray-800 leading-tight">
            {{ __('All Bookings') }}
        </h1>   
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">Confirmed Appointments</h3>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border">
                            <thead class="bg-gray-200">
                                <tr>
                                    <th class="py-2 px-4 border-b">Booking Date</th>
                                    <th class="py-2 px-4 border-b">Customer</th>
                                    <th class="py-2 px-4 border-b">Phone</th>
                                    <th class="py-2 px-4 border-b">Car</th>
                                    <th class="py-2 px-4 border-b">Status</th>
                                    <th class="py-2 px-4 border-b">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bookings as $booking)
                                    <tr class="hover:bg-gray-50">
                                        <td class="py-2 px-4 border-b">{{ $booking->booking_date->format('d M Y, h:i A') }}</td>
                                        <td class="py-2 px-4 border-b">{{ $booking->customer->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $booking->customer->phone }}</td>
                                        <td class="py-2 px-4 border-b">{{ $booking->car->year }} {{ $booking->car->make->name }} {{ $booking->car->model->name }}</td>
                                        <td class="py-2 px-4 border-b">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                {{ $booking->status }}
                                            </span>
                                        </td>
                                        <td class="py-2 px-4 border-b">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">View</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="py-4 px-4 text-center text-gray-500">No bookings found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>