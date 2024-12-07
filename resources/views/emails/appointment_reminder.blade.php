<!DOCTYPE html>
<html>
<head>
    <title>Appointment Reminder</title>
</head>
<body>
    <h1>Dear {{ $appointment->name }},</h1>
    <p>This is a reminder for your upcoming appointment.</p>
    <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($appointment->date_schedule)->format('F j, Y') }}</p>
    <p><strong>Time:</strong> {{ \Carbon\Carbon::parse($appointment->time_schedule)->format('g:i A') }}</p>
    <p>Please ensure you arrive on time. Thank you!</p>
</body>
</html>
