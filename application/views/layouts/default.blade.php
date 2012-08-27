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
	{{ Menu::handler('nav') }}


	{{ $content }}
</body>
</html>