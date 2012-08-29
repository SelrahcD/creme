<h1>Liste des vidéos en attente de validation</h1>
@if(!sizeof($videosList))
<p>Aucune vidéo à activer.</p>
@else
<table>
	<tr>
		<td>Titre</td><td>Artiste</td><td>Visionner</td><td>Activer</td>
	</tr>
@foreach($videosList as $video)
	<tr>
		<td>{{ $video->title }}</td>
		<td>{{ $video->artist->name }}</td>
		<td>{{HTML::link('videos/watch/'.$video->slug(), 'Visionner')}}</td>
		<td>{{HTML::link('videos/activate/'.$video->id, 'Activer')}}</td>
	</tr>
@endforeach
</table>
@endif