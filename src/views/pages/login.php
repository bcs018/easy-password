<?php $render('header', ['title'=>'easy password - Login']); ?>

    <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>
                    
					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Senha">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<input type="submit" class="login100-form-btn" value="Entrar">	
					</div>
					<br>
					<div class="text-center">
						<span class="txt1">
							Não tem uma conta?
						</span>

						<a href="#" class="txt2 hov1">
							Cadastre-se
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>

<?php $render('footer'); ?>