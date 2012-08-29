<h1>Modifier mon compte</h1>
{{ $form->open() }}

	<fieldset>
		<p>Avant tout changement vous devez indiquer votre mot de passe actuel.</p>
		<!-- current password field -->
        {{ $form->password('current_password', 'Mot de passe actuel') }}
	</fieldset>
    <fieldset>
        <!-- new username field -->
        {{ $form->text('name', 'Nom d\'utilisateur') }}

        <!-- new email field -->
        {{ $form->text('email', 'Email') }}
        
        <!-- new password field -->
        {{ $form->password('password', 'Mot de passe') }}

        <!-- new password confirmation field -->
        {{ $form->password('password_confirmation', 'Confirmez votre mot de passe') }}
        
        <!-- submit button -->
        {{ $form->submit('Effectuer les changements') }}
    </fieldset>
{{ Form::close() }}