<h1>Proposer une vidéo</h1>
{{ $form->open() }}
    <fieldset>
        <!-- title field -->
        {{ $form->text('title', 'Titre') }}

        <!-- artist field -->
        {{ $form->text('artist', 'Artiste') }}
        
        <!-- url field -->
        {{ $form->text('url', 'Url de la vidéo') }}

        <!-- submit button -->
        {{ $form->submit('Suggérer la vidéo') }}
    </fieldset>
{{ Form::close() }}