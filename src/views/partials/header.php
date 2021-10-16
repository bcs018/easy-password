<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="/assets/css/layout.css">
        <link rel="shortcut icon" href="/assets/img/icon.ico" >
        <link href="/assets/css/toastr.min.css" rel="stylesheet"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/util.css">
	    <link rel="stylesheet" type="text/css" href="/assets/css/main.css">
        
        <title><?php echo $title; ?></title>

    </head>
    <body data-spy="scroll" data-target="#list-example">
        <header>  
            <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #ffdc7a;">
                <a class="navbar-brand" href="">
                    <img src="/assets/img/easy-password.png" width="194" height="40" alt="easy password" loading="lazy" style="margin-right: 100px;">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" id="menu" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="menu" href="/cadastre-se">Cadastre-se</a>
                        </li>
                        <li class="nav-item active">
                            <?php if(!isset($_SESSION['log'])): ?>
                                <a class="nav-link" id="menu" href="/login">Login</a>
                            <?php else: ?>
                                <a class="nav-link" id="menu" href="/painel">Painel</a>
                                <li class="nav-item">
                                    <a class="nav-link" id="menu" style="color:#ff3700;" href="/sair">Sair</a>
                                </li>
                            <?php endif; ?>
                        </li>
                       
                    </ul>
                </div>
            </nav>
        </header>  