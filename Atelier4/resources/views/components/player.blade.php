@vite(['resources/css/app.css'])
<div class="player-card">
    <h3>{{$name}}</h3>
    <img src="{{$photoURL}}" alt="{{$name}}" style="width: 200px; height: auto;">
    <p>
       {{$slot}} 
    </p>
    
</div>