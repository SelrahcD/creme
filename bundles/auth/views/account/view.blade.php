<p>Your name : {{ $user->name }}</p>
<p>Your email address : {{ $user->email }}</p>
<p>{{ HTML::link('account/edit', 'Modify') }}</p>