<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>My Spot - Login</title>
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="https://use.fontawesome.com/f07f2022bd.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="container_login">
			<div class="social_login">
				<h1 class="title_main">
					My Spot
					<i class="fa fa-heart-o" aria-hidden="true"></i>
				</h1>
				<span class="connect_social">
					Entre com sua rede social
				</span>
				<div class="button_social">
					<button class="button face" type="submit">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</button>
					<button class="button google" type="submit">
						<i class="fa fa-google" aria-hidden="true"></i>
					</button>
				</div>
			</div>
			<div class="normal_login">
				<h2 class="title_secundary">
					Entrar
				</h2>
				<span class="create_login">
					Não possui uma conta? <a class="link_register" href="index.php?controller=c_user&method=cadastrar">Crie sua conta</a>, isso leva menos de um minuto.
				</span>
				<form action="#" method="post" class="form_login" id="form_login">
					<div class="input_form">
						<input type="text" name="usuario" placeholder="Nome de usuário">
						<input type="password" placeholder="Senha" name="senha" id="password">
					</div>
					<div class="remember_form">
						<div>
							<input type="checkbox" name="save" id="save">
							<label for="save">Lembrar senha</label>
						</div>
						<a href="#">Esqueceu sua senha?</a>
					</div>
					<div class="send_form">
						<input class="button login" type="submit" value="Entrar">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>