<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Garixpert - Your Trusted Vehicle Partner</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 text-gray-800">

    <nav class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="font-bold text-2xl text-blue-600 flex items-center">
                <img src="/images/garixpert-logo.png" alt="Garixpert Logo" class="h-8 mr-2">
            </a>
            <div class="hidden md:flex space-x-6 items-center">
                <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Home</a>
                <a href="#services" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Services</a>
                <a href="#offers" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Offers</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 transition-colors duration-200">Contact</a>
                <a href="/login" class="bg-blue-600 text-white px-5 py-2 rounded-full hover:bg-blue-700 transition-colors duration-200 shadow-lg">Book Now</a>
            </div>
            <div class="md:hidden">
                <button class="text-gray-600 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                </button>
            </div>
        </div>
    </nav>

    <header class="relative bg-gray-900 text-white py-20 overflow-hidden">
        <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('/images/hero-car-service.jpg');">
            <div class="absolute inset-0 bg-black opacity-60"></div> </div>
        <div class="container mx-auto px-6 relative z-10 text-center">
            <h1 class="text-6xl font-extrabold mb-4 animate-fade-in-up">Expert Care for Your Vehicle</h1>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl mx-auto animate-fade-in-up delay-200">
                Reliable, affordable, and professional service you can trust. Get back on the road with confidence.
            </p>
            <a href="/login" class="bg-blue-600 text-white font-bold px-10 py-4 rounded-full text-xl hover:bg-blue-700 transition-all duration-300 shadow-xl animate-scale-in">
                Schedule a Service Today
            </a>
        </div>
    </header>

    <main class="container mx-auto px-6 py-12">
        <section id="services" class="my-16">
            <h2 class="text-4xl font-bold text-center mb-12 text-gray-800">Our Comprehensive Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 text-center border-t-4 border-blue-500">
                    <img src="/images/icon-diagnostics.png" alt="Engine Diagnostics Icon" class="mx-auto mb-4 h-20 w-20 object-contain">
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Engine Diagnostics</h3>
                    <p class="text-gray-600">Using cutting-edge technology to accurately diagnose and fix any issue with your vehicle's engine, ensuring peak performance.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 text-center border-t-4 border-yellow-500">
                    <img src="/images/icon-oil-change.png" alt="Oil Change Icon" class="mx-auto mb-4 h-20 w-20 object-contain">
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Oil & Filter Change</h3>
                    <p class="text-gray-600">Essential for your car's longevity. Our quick and efficient service uses premium oils and filters to keep your engine healthy.</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-2xl transition-shadow duration-300 text-center border-t-4 border-green-500">
                    <img src="/images/icon-tire-service.png" alt="Tire Service Icon" class="mx-auto mb-4 h-20 w-20 object-contain">
                    <h3 class="text-2xl font-bold mb-3 text-gray-800">Tire & Wheel Service</h3>
                    <p class="text-gray-600">Ensure a smooth and safe ride with our comprehensive tire services, including rotation, balancing, and alignment checks.</p>
                </div>
            </div>
        </section>

        <section id="offers" class="my-16 bg-gradient-to-r from-blue-600 to-indigo-700 text-white p-12 rounded-2xl shadow-xl">
            <h2 class="text-4xl font-bold text-center mb-6">Exclusive Special Offers!</h2>
            <div class="text-center">
                <p class="text-xl mb-4">New customer? Get a fantastic **20% discount** on your first full service!</p>
                <p class="text-2xl font-mono bg-white text-blue-800 px-6 py-3 inline-block rounded-lg shadow-md mt-4 animate-pulse">
                    Use Code: GARIEXPERT20
                </p>
                <p class="text-md mt-4 text-blue-100">Limited time offer. Terms and conditions apply.</p>
            </div>
        </section>

        <section id="about" class="my-16 text-center">
            <h2 class="text-4xl font-bold mb-6 text-gray-800">Why Choose Garixpert?</h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto mb-8">
                At Garixpert, we're dedicated to providing top-notch vehicle maintenance and repair services. Our certified technicians use only quality parts and the latest diagnostic tools to ensure your car is in the best hands.
            </p>
            <a href="#" class="bg-gray-700 text-white font-bold px-8 py-3 rounded-full hover:bg-gray-800 transition-colors duration-300 shadow-lg">Learn More About Us</a>
        </section>
    </main>

    <footer class="bg-gray-900 text-white py-10">
        <div class="container mx-auto px-6 text-center">
            <p class="mb-2">&copy; {{ date('Y') }} Garixpert. All Rights Reserved.</p>
            <div class="flex justify-center space-x-4">
                <a href="#" class="text-gray-400 hover:text-white">Privacy Policy</a>
                <a href="#" class="text-gray-400 hover:text-white">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>