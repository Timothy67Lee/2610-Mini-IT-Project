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
        <a href="{{route('club.show', $club -> $id)}}"><p>{{$club -> name}}</p><img src="{{asset ('images/'. $club -> $profile_picture)}}"></a>

    </div>
    
</body>
</html>