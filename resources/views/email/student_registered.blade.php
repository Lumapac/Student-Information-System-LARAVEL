<!DOCTYPE html>
<html>
<head>
    <title>Student Account Registration</title>
</head>
<body>
    <h2>Welcome, {{ $name }}!</h2>
    <p>Your student portal account has been created. Here are your login details:</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Password:</strong> {{ $password }}</p>
    <p>Please change your password after logging in.</p>
    <p>Thank you!</p>
</body>
</html>
