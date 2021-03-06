<?php $render('header', ['title'=>'easy password - Cadastre-se']); ?> 

<?php 
	if(!isset($_SESSION['hash'])){
		$_SESSION['hash'] = md5(time().rand(0,999));
	}
?>

<main>
    <section>
        <article>
            <div class="container-sm margin_conteudo">
                <h2>Cadastro rápido</h2>
                <br><br>
                <div class="field">
                    <form id="form2" action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nick">Nickname (apelido) </label>
                                <input type="text" class="form-control" id="nick" placeholder="Nickname" name="nick">
                                <small id="passwordHelpInline" class="text-muted">
                                   Opcional.
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="login">Login</label>
                                <input type="text" class="form-control" id="login" placeholder="Login" name="login">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="pass">Senha</label>
                                <input type="password" class="form-control" id="pass" placeholder="Senha" name="pass">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="con_pass">Confirmar senha</label>
                                <input type="password" class="form-control" id="con_pass" placeholder="Senha" name="con_pass">
                            </div>
                            
                        </div>
                        <div>
						    <input type="hidden" name="hash" id="hash" value="<?php echo $_SESSION['hash']; ?>">
					    </div>
                        
                        <div id="errSenha"></div>
                        <input type="submit" id='cadastrar' class="btn btn-primary" value="Cadastrar">
                    </form>
                </div>               
            </div>
        </article>
    </section>
</main>

<?php $render('footer'); ?>

