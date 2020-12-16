<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Painel de controle easy password">
	<meta name="author" content="easy password - Desenvolvido por BCS Dev">

	<title><?php echo $title; ?></title>

	<link href="http://localhost/easy-password/assets/pnl/css/bootstrap.min.css" rel="stylesheet">

	<link href="http://localhost/easy-password/assets/pnl/font-awesome/css/font-awesome.css" rel="stylesheet" />
	<link rel="shortcut icon" href="http://localhost/easy-password/assets/img/icon.ico">
	<link href="http://localhost/easy-password/assets/css/toastr.min.css" rel="stylesheet" />

	<!-- Custom styles for this template -->
	<link href="http://localhost/easy-password/assets/pnl/css/style.css" rel="stylesheet">
	<link href="http://localhost/easy-password/assets/pnl/css/style-responsive.css" rel="stylesheet">

	<style>
		#tooltip {
			background: #333;
			color: white;
			font-weight: bold;
			padding: 4px 8px;
			font-size: 13px;
			border-radius: 4px;
			display: none;
		}

		#tooltip[data-show] {
			display: block;
		}

		#arrow,
		#arrow::before {
			position: absolute;
			width: 8px;
			height: 8px;
			z-index: -1;
		}

		#arrow::before {
			content: '';
			transform: rotate(45deg);
			background: #333;
		}

		#tooltip[data-popper-placement^='top']>#arrow {
			bottom: -4px;
		}

		#tooltip[data-popper-placement^='bottom']>#arrow {
			top: -4px;
		}

		#tooltip[data-popper-placement^='left']>#arrow {
			right: -4px;
		}

		#tooltip[data-popper-placement^='right']>#arrow {
			left: -4px;
		}
	</style>
</head>

<body>
	<section id="container">
		<header class="header black-bg">
			<div class="sidebar-toggle-box">
				<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
			</div>

			<a href="" class="logo"><b>easy password</b></a>
		</header>

		<aside>
			<div id="sidebar" class="nav-collapse ">
				<ul class="sidebar-menu" id="nav-accordion">

					<h5 class="centered">Marcel Newman</h5>
					<p class="centered"><a id="color_a" href="login.html">Sair</a></p>

					<li class="mt">
						<a class="active" href="<?php echo BASE_URI; ?>/painel">
							<i class="fa fa-plus"></i>
							<span>Cadastrar categoria</span>
						</a>
					</li>

					<li class="sub-menu">
						<a href="javascript:;">
							<i class="fa fa-eye"></i>
							<span>Visualizar senhas</span>
						</a>
						<ul class="sub">
							<li><a href="calendar.html">Calendar</a></li>
							<li><a href="gallery.html">Gallery</a></li>
							<li><a href="todo_list.html">Todo List</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</aside>