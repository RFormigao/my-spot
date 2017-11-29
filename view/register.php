<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>My Spot - Cadastro</title>
	<link rel="stylesheet" href="assets/css/normalize.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<script src="https://use.fontawesome.com/f07f2022bd.js"></script>
	
</head>
<body>
	<div class="container">
		<div class="container_login container_register">
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
					Cadastro
				</h2>
				<span class="create_login">
          Preencha as informações abaixo. Ou conecte-se com sua rede social ao lado.
				</span>
				<form action="#" method="post" class="form_login" id="form_login">
					<div class="input_form">
						<input type="text" name="nome" placeholder="Nome">
						<input type="text" name="sobrenome" placeholder="Sobrenome">
            <input type="text" name="usuario"  placeholder="Nome de usuário">
            <input type="text" name="email" placeholder="Email">
            <input type="password" name="senha" placeholder="Senha" name="password" id="password">
            <input type="password" name="confirm_senha" placeholder="Confirmar senha" name="password" id="password">
					</div>
					<div class="send_form">
						<input class="button login" type="submit" value="Cadastrar">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>