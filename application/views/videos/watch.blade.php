@if(isset($artist) && isset($title))
<h1>{{ $artist }} - {{ $title }}</h1>

<iframe src="{{ $url }}" frameborder="0" allowfullscreen></iframe>
@else 
<p>Pas de vidéo à afficher.</p>
@endif