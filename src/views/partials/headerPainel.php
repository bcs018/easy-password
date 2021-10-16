<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Painel de controle easy password">
	<meta name="author" content="easy password - Desenvolvido por BCS Dev">

	<title><?php echo $title; ?></title>

	<link href="/assets/pnl/css/bootstrap.min.css" rel="stylesheet">

	<link href="/assets/pnl/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="shortcut icon" href="/assets/img/icon.ico">
	<link href="/assets/css/toastr.min.css" rel="stylesheet" />

	<!-- Custom styles for this template -->
	<link href="/assets/pnl/css/style.css" rel="stylesheet">
	<link href="/assets/pnl/css/style-responsive.css" rel="stylesheet">
</head>

<body>
	<section id="container">
		<header class="header black-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>

			<a href="" class="logo"><b>easy password</b></a> <a class="logo homeP" href="/">Home</a>
		</header>

		<aside>
			<div id="sidebar" class="nav-collapse ">
				<ul class="sidebar-menu" id="nav-accordion">

					<h5 class="centered"><?php echo htmlspecialchars($_SESSION['log']['nick']); ?> &nbsp <i id="button" aria-describedby="tooltip" class="fa fa-info-circle" aria-hidden="true"></i></h5>
					<p class="centered"><a id="color_a" href="/sair">Sair</a></p>
					<div id="tooltip" role="tooltip">
						Você pode mudar seu nome clicando no menu "Dados cadastrais"!	
						<div id="arrow" data-popper-arrow></div>
                    </div>
					<li class="mt">
						<a class="" href="/painel">
							<i class="fa fa-plus"></i>
							<span>Cadastrar categoria</span>
						</a>
					</li>

					<li class="sub-menu">
						<a href="/painel/visualizar-senha">
							<i class="fa fa-eye"></i>
							<span>Visualizar senhas</span>
						</a>
					</li>

					<li class="sub-menu">
						<a href="/painel/dados-cadastrais">
							<i class="fa fa-user"></i>
							<span>Dados cadastrais</span>
						</a>
					</li>
				</ul>
			</div>
		</aside>