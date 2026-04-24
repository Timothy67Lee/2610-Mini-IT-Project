<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navigation-page.css') }}">
    <title>Navigation</title>
</head>
<body>
    <h1>Clubs and Societies in MMU</h1>
    <div class="container">
        <a href="clubs/{{ $clubs[0]["name"]}}">
            <p>{{ $clubs[0]["name"] }}</p>
            <img src="{{ $clubs[0]["profile_picture"] }}" alt="{{ $clubs[0]["name"] }}">
        </a>
        

    </div>
    
</body>


</html>

