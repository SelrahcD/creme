<h1>Mon compte</h1>
<p>Nom d'utilisateur : {{ $user->name }}</p>
<p>Adresse email : {{ $user->email }}</p>
<p>{{ HTML::link('account/edit', 'Modifier ces informations') }}</p>