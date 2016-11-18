<?php $adm_urls = ['orders', 'auth', 'commissions']; ?>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Globalcustomzsigns</title>

	<!-- Web Application Manifest -->
	<link rel="manifest" href="manifest.json">

	<!-- Add to homescreen for Chrome on Android -->
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="Globalcustomzsigns">
	<!-- <link rel="icon" sizes="192x192" href="images/touch/chrome-touch-icon-192x192.png"> -->

	<!-- Add to homescreen for Safari on iOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta name="apple-mobile-web-app-title" content="Globalcustomzsigns">
	<!-- <link rel="apple-touch-icon" href="images/touch/apple-touch-icon.png"> -->

	<!-- Tile icon for Win8 (144x144 + tile color) -->
	<!-- <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png"> -->
	<meta name="msapplication-TileColor" content="#3372DF">

	<link href='//fonts.googleapis.com/css?family=Alegreya+Sans+SC:700italic' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.0/css/buttons.bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo (in_array($this->uri->segment(1), $adm_urls)) ? base_url('css/main-adm.css') : base_url('css/main.css'); ?>">
</head>
