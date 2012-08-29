<h1>Se connecter</h1>
@if(Session::has('login_errors'))
<p>Email/Mot de passe invalide.</p>
@endif

{{ $form->open() }}
    <fieldset>
        <!-- email field -->
        {{ $form->text('email', 'Email') }}
        
        <!-- password field -->
        {{ $form->password('password', 'Mot de passe') }}

        <!-- submit button -->
        {{ $form->submit('Se connecter') }}
    </fieldset>
{{ Form::close() }}