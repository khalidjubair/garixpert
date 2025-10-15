<!DOCTYPE html>
<html>
<head>
    <title>New Booking Request</title>
</head>
<body>
    <h1>New Booking Request from Garixpert.com</h1>
    <p>A new booking has been submitted. Please review the details below and contact the customer to confirm.</p>
    <hr>
    <h3>Customer Details:</h3>
    <ul>
        <li><strong>Name:</strong> {{ $booking->customer->name }}</li>
        <li><strong>Phone:</strong> {{ $booking->customer->phone }}</li>
        <li><strong>Email:</strong> {{ $booking->customer->email }}</li>
    </ul>

    <h3>Vehicle Details:</h3>
    <ul>
        <li><strong>Car:</strong> {{ $booking->car->year }} {{ $booking->car->make->name }} {{ $booking->car->model->name }}</li>
    </ul>

    <h3>Appointment Details:</h3>
    <ul>
        <li><strong>Requested Date:</strong> {{ $booking->booking_date->format('d M Y, h:i A') }}</li>
        <li><strong>Status:</strong> {{ $booking->status }}</li>
    </ul>

    <h3>Services Requested:</h3>
    <ul>
        @foreach($booking->services as $service)
            <li>{{ $service->name }}</li>
        @endforeach
    </ul>
    
    <p>Thank you,</p>
    <p>Garixpert Notification System</p>
</body>
</html>