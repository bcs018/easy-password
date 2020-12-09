<?php $render('header', ['title'=>'easy password - Login']); ?>

	<?php 
	if(!isset($_SESSION['hash'])){
		$_SESSION['hash'] = md5(time().rand(0,999));
	}
	?>

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form id="form3" class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						Acessar sistema
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="login" placeholder="Login">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
                    
					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Senha">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span> 
					</div>

					<div>
						<input type="hidden" name="hash" value="<?php echo $_SESSION['hash']; ?>">
					</div>

					<div class="container-login100-form-btn m-t-20">
						<input type="submit" class="login100-form-btn" value="Entrar">	
					</div>
					<br>
					<div class="text-center">
						<span class="txt1">
							Não tem uma conta?
						</span>

						<a href="<?php echo BASE_URI; ?>/cadastre-se" class="txt2 hov1">
							Cadastre-se
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php $render('footer'); ?>