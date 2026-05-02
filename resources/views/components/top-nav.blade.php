<link rel="stylesheet" href="{{ asset('css/top-nav.css') }}">

<div class="top-nav">
    <img src="images/drop down.png" id="drop-down">
    <ul class="drop-down-list">
        <a href="{{ url('/') }}"><li>Home</li></a>
        <a href="{{ url('/profile') }}"><li>Profile</li></a>
    </ul>
    <ul class="right-side-nav">
        <li><a href="{{ url('/navigation') }}">Clubs</a></li>
        <div class="underline"></div>
        <li><a href="{{ url('/calendar') }}">Calendar</a></li>
        <div class="underline"></div>
    </ul>
</div>