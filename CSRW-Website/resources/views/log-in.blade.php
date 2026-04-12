<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <form action="" method="post">
        <label for="Email">Email</label><br>
        <input type="text" name="Email"><br>
        <label for="Password">Password</label><br>
        <input type="text" name = "Password"><br>
        <input type="submit" value="Log In"><br>
    </form>
</body>
</html>
