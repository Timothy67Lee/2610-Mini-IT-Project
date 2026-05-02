<link rel="stylesheet" href="{{ asset('css/top-nav.css') }}">

<div class="top-nav">
    <img src="images/drop down.png" id="drop-down">
    <ul class="drop-down-list">
        <a href="{{ url('/') }}"><li>Home</li></a>
        <a href="{{ url('/profile') }}"><li>Profile</li></a>
    </ul>
    <ul class="right-side-nav">
        <a href="{{ url('/navigation') }}"><li>Clubs</li></a>
        <div class="underline"></div>
        <a href="{{ url('/calendar') }}"><li>Calendar</li></a>
        <div class="underline"></div>
    </ul>
</div>