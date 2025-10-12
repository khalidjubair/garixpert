<nav class="bg-white shadow-lg sticky top-0 z-50">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <a href="/" class="font-bold text-2xl text-blue-600 flex items-center">
            <img src="{{ asset('images/garixpert-logo.png') }}" alt="Garixpert Logo" class="h-8 mr-2">
        </a>
        <div class="hidden md:flex space-x-6 items-center">
            <a href="/" class="text-gray-700 hover:text-blue-700 transition-colors duration-200 font-medium">Home</a>
            <a href="/#services" class="text-gray-700 hover:text-blue-700 transition-colors duration-200 font-medium">Services</a>
            <a href="/pre-booking" class="text-gray-700 hover:text-blue-700 transition-colors duration-200 font-medium">Pre-Booking</a>
            <a href="/booking" class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition-colors duration-200 shadow-lg font-medium">Book Now</a>
        </div>
        <div class="md:hidden">
            <button class="text-gray-600 hover:text-blue-600 focus:outline-none">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
            </button>
        </div>
    </div>
</nav>