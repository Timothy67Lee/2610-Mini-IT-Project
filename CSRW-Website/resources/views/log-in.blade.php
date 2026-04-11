<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <form action="" method="POST">
        <label for="Email">Email</label><br>
        <input type = "text" name = "Email">
        <label for="Password">Password</label>
        <input type="text" name = "Password">
        <input type="button" value="Log In">
    </form>
</body>
</html>