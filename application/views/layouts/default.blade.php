<!doctype html>
<!--[if lte IE 7]> <html class="no-js ie7 oldie" lang="fr"> <![endif]-->
<!--[if IE 8]> <html class="no-js ie8 oldie" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>La crème de la crème@if(isset($pageTitle)) - {{ $pageTitle }} @endif</title>
	<meta name="viewport" content="width=device-width">
	<!--[if lt IE 9]><script src="/js/html5shiv.js"></script><![endif]-->
	{{ HTML::style('css/styles.css') }}
</head>
<body>
	<nav>
		<ul>
			<li>{{ HTML::link('/', 'Accueil') }}</li>
			<li>{{ HTML::link('videos', 'Les vidéos') }}</li>
			<li>{{ HTML::link('about', 'A propos') }}</li>
			@if(Authority::can('moderate', 'video'))
			<li>{{ HTML::link('videos/waiting', 'Vidéos en attente de validation') }}</li>
			@endif
			@if(Auth::check())
			<li>{{ HTML::link('videos/suggest', 'Proposer une vidéo') }}</li>
			<li>{{ HTML::link('account', 'Profil') }}</li>
			<li>{{ HTML::link('logout', 'Se déconnecter') }}</li>
			@else
			<li>{{ HTML::link('login', 'Se connecter') }}</li>
			<li>{{ HTML::link('register', 'Créer un compte') }}</li>
			@endif
			@if(Authority::can('manage', 'user'))
			<li>{{ HTML::link('admin/users', 'Gérer les utilisateurs') }}</li>
			@endif
		</ul>
	</nav>

	{{ $content }}
</body>
</html>