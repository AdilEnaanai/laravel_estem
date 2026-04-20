@vite(['resources/css/app.css'])
<div class="player-card">
    <h3>{{$name}}</h3>
    <img src="{{$photoURL}}" alt="{{$name}}">
    <p>
       {{$slot}} 
    </p>
    
</div>