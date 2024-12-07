<!DOCTYPE html>
<html>
<head>
    <title>Appointment Reminder</title>
</head>
<body>
    <h1>Reminder: Upcoming Appointment</h1>
    <p>Hello, {{ $appointment->user->name }}</p>
    <p>This is a reminder for your upcoming appointment:</p>
    <ul>
        <li><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->date_schedule)->format('F j, Y') }}</li>
        <li><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->time_schedule)->format('g:i A') }}</li>
    </ul>
    <p>Thank you!</p>
</body>
</html>
