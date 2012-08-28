<p>Afficher par : {{ HTML::link('videos/list', 'Artistes') }} | {{ HTML::link('videos/list/date', 'Date d\'ajout') }}</p>
@if($sortMode == 'date')
	@if(sizeof($videos) > 0 )
		<ul>
		@foreach($videos as $video)
		<li>{{ HTML::link('videos/watch/'.$video->slug(), $video->artist->name . ' - ' . $video->title) }}</li>
		@endforeach
		</ul>
	@else
	Aucune vidéo n'a été ajoutée.
	@endif
@else
	@if(sizeof($artists) > 0)
		@foreach($artists as $artist)
		<h3>{{ $artist->name }}</h3>
			<ul>
			@foreach($artist->videos as $video)
				<li>{{ HTML::link('videos/watch/'.$video->slug(), $video->title) }}</li>
			@endforeach
			</ul>
		@endforeach
	@else
	Aucun artiste n'a été ajouté.
	@endif
@endif