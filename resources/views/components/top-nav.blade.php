<link rel="stylesheet" href="{{ asset('css/top-nav.css') }}">

<div class="top-nav">
    <img src="images/drop down.png" id="drop-down">
    <ul class="drop-down-list">
        <li><a href="{{ url('/') }}">Home</a></li>
        <li><a href="{{ url('/profile') }}">Profile</a></li>
    </ul>
    <ul class="right-side-nav">
        <li><a href="{{ url('/navigation') }}">Clubs</a></li>
        <div class="underline"></div>
        <li><a href="{{ url('/navigation') }}">Calendar</a></li>
        <div class="underline"></div>
    </ul>
</div>