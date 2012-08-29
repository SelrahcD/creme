<h1>Créer un compte</h1>
{{ $form->open() }}
    <fieldset>
        <!-- username field -->
        {{ $form->text('name', 'Nom d\'utilisateur') }}

        <!-- email field -->
        {{ $form->text('email', 'Email') }}
        
        <!-- password field -->
        {{ $form->password('password', 'Mot de passe') }}

        <!-- password confirmation field -->
        {{ $form->password('password_confirmation', 'Confirmez votre mot de passe') }}
        
        <!-- submit button -->
        {{ $form->submit('Créer un compte') }}
    </fieldset>
{{ Form::close() }}