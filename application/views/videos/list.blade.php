<h1>Liste des vidéos</h1>
<p>Afficher par : {{ HTML::link('videos/list', 'Artistes') }} | {{ HTML::link('videos/list/date', 'Date d\'ajout') }}</p>
@if($sortMode == 'date')
	@if(sizeof($videos) > 0 )
		<ul>
		@foreach($videos as $video)
		<li>{{ HTML::link('videos/watch/'.$video->slug(), $video->artist->name . ' - ' . $video->title) }}</li>
		@endforeach
		</ul>
	@else
	<p>Aucune vidéo n'a été ajoutée.</p>
	@endif
@else
	@if(sizeof($artists) > 0)
		@foreach($artists as $artist)
		@if(sizeof($artist->videos) > 0 )
		<h2>{{ $artist->name }}</h2>
			<ul>
			@foreach($artist->videos as $video)
				<li>{{ HTML::link('videos/watch/'.$video->slug(), $video->title) }}</li>
			@endforeach
			</ul>
		@endif
		@endforeach
	@else
	<p>Aucun artiste n'a été ajouté.</p>
	@endif
@endif