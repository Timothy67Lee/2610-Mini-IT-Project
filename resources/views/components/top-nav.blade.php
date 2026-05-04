<link rel="stylesheet" href="{{ asset('css/top-nav.css') }}">

<div class="top-nav">
    <img src="images/drop down.png" id="drop-down">
    <ul class="drop-down-list">
        <a href="{{ url('/') }}"><li>Home</li></a>
     @if (Route::has('login'))
        @auth
            <a href="{{ url('/dashboard') }}"><li>Profile</li></a>
            <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><li>Log Out</li>
                {{ __('Logout') }}
            </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @else
            <a href="{{ route('login') }}"><li>Log in</li></a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"><li>Register</li></a>
            @endif
        @endauth
    @endif
    
    </ul>
    <ul class="right-side-nav">
        <a href="{{ url('/navigation') }}"><li>Clubs</li></a>
        <div class="underline"></div>
        @if (Route::has('login'))
        @auth
            <a href="{{ url('/calendar') }}"><li>Calendar</li></a>
            <a href="{{ url('/notifications') }}"><li>Notifications</li></a>
        @endauth
        @endif
        
        <div class="underline"></div>
    </ul>
</div>