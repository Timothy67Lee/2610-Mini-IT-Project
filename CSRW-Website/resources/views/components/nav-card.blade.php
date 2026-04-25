<div class="container">
          <a href="clubs/{{ $club["name"]}}">
            {{$slot}}
            <img src="{{ $club["profile_picture"] }}" alt="{{ $club["name"] }}">
        </a> 
</div>