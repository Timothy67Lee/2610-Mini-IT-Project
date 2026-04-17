<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="{{ asset('css/log-in.css') }}">
</head>
<body>
    <form action="log-in.blade.php" method="GET">
        <h2>Log In</h2>
        <label for="Email">Email</label><br>
        <input type="text" name="Email"><br>
        <label for="Password">Password</label><br>
        <input type="text" name = "Password"><br>
        <a href="forgot-password.blade.php" id = "forgot-pass">Forgot Password</a><br>
        <input type="submit" value="Log In" id="log-in-btn"><br>
    </form>
</body>
</html>

<? php
    echo $_GET["Email"];
?>