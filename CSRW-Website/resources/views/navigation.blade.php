<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/navigation-page.css') }}">
    <title>Navigation</title>
</head>
<body>
    <h1>Clubs and Societies in MMU</h1>
        <h2>Art Clubs</h2>
        
        @foreach ($clubs as $club)
        @if ($club["category"] == "Arts Clubs")
        <div class="container">
          <a href="clubs/{{ $club["name"]}}">
            <p>{{ $club["name"] }}</p>
            <img src="{{ $club["profile_picture"] }}" alt="{{ $club["name"] }}">
        </a>  
        </div>
        @endif
        @endforeach
        
        <h2>Community Clubs</h2>
        <h2>Religious Clubs</h2>
        <h2>Games / Entertainment Clubs</h2>
        <h2>Cultural Clubs</h2>
        <h2>Tech Clubs</h2>
        <h2>Recreational / Physical Activities Clubs</h2>
        
        
        


    
</body>


</html>

