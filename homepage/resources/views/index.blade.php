<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>University Clubs</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>

    <h2>Explore Our Clubs</h2>
    <div class="club-grid">

            <a href="/clubs/drama" class="club-card">
                <img src="{{ asset('images/picture2.jpg') }}" alt="Drama Club">
                <h3>Drama Club</h3>
                <p>Explore your creativity through acting and stage performance.</p>
            </a>

            <a href="/clubs/chess" class="club-card">
                <img src="{{ asset('images/picture1.jpg') }}" alt="Chess Club">
                <h3>Chess Club</h3>
                <p>Sharpen your mind with weekly chess matches and tournaments.</p>
            </a>

            <a href="/clubs/music" class="club-card">
                <img src="{{ asset('images/picture3.jpg') }}" alt="Music Club">
                <h3>Music Club</h3>
                <p>Bring out the musical talent in you in our club.</p>
            </a>

            <a href="/clubs/football" class="club-card">
                <img src="{{ asset('images/picture4.jpg') }}" alt="Football Club"> 
                <h3>Football Club</h3>
                <p>You got Ball knowledge? Join the Football Club.</p>
            </a>

            <a href="/clubs/badminton" class="club-card">
                <img src="{{ asset('images/picture5.jpg') }}" alt="Badminton Club">
                <h3>Badminton Club</h3>
                <p>Lee Chong Wei academy.</p>
            </a>

            <a href="/clubs/basketball" class="club-card">
                <img src="{{ asset('images/picture6.jpg') }}" alt="Basketball Club"> 
                <h3>Basketball Club</h3>
                <p>Practice drills and play competitive games with us.</p>
            </a>

    </div>

    <footer>
        <p> 2026 UNIVERSITY CLUBS </p>
    </footer>
</body>
</html>
