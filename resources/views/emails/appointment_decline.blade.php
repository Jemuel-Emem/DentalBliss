<!DOCTYPE html>
<html>
<head>
    <title>Appointment Approved</title>
</head>
<body>
    <h1>Hello, {{ $appointment->user->name }}</h1>

    <p>We are sorry to inform you that your appointment has been decline.</p>

    <p>Appointment Details:</p>
    <ul>

        <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->date_schedule)->format('F j, Y') }}</li>
        <li><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->time_schedule)->format('g:i A') }}</li>
    </ul>

    <p>Thank you for choosing our services!</p>
</body>
</html>
