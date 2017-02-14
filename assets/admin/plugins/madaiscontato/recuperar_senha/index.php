<?php
	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$human = intval($_POST['human']);
		$from = 'Solicitação Mudança de Senha $name'; 
		$to = 'taciovictor5@gmail.com'; 
		$subject = 'Solicitação de mudança de senha - (CampanhasFb)';
		
		$body ="Usuário: $name\n E-Mail: $email\n Nova Senha: $senha\n Não se esqueça de modificar o acesso deste usuário em http://campanhasfb.com.br/premium/";
		// Check if name has been entered
		if (!$_POST['name']) {
			$errName = 'Por favor, digite o nome de usuário';
		}
		
		// Check if email has been entered and is valid
		if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$errEmail = 'Por favor insira um endereço de e-mail válido';
		}
		
		//Check if message has been entered
		if (!$_POST['senha']) {
			$errSenha = 'Sua Senha é invalida';
		}
		//Check if simple anti-bot test is correct
		if ($human !== 5) {
			$errHuman = 'Seu anti-spam esta incorreta';
		}
// If there are no errors, send the email
if (!$errName && !$errEmail && !$errSenha && !$errHuman) {
	if (mail ($to, $subject, $body, $from)) {
		$result='<div class="alert alert-success">Obrigado! Em breve retornaremos contato aprovando sua solicitação.</div>';
	} else {
		$result='<div class="alert alert-danger">Desculpe, houve um erro ao enviar a sua solicitação. Por favor, tente novamente mais tarde.</div>';
	}
}
	}
?>

<!DOCTYPE html>
<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="recupere sua senha http://campanhasfb.com.br/">
    <meta name="author" content="campanhasfb.com.br/">
    <title>Formulário - Recuperação de Senha</title>
    <link rel="stylesheet" href="http://campanhasfb.com.br/premium/assets/plugins/bootstrap/css/bootstrap.css">
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Recupere sua senha</h1>
				<form class="form-horizontal" role="form" method="post" action="index.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Nome de usuário</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="Digite o nome do seu usuário" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="Digite um email para contato" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="message" class="col-sm-2 control-label">Nova senha</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="senha" name="senha" placeholder="Digite sua nova senha" value="<?php echo htmlspecialchars($_POST['senha']);?>">
							<?php echo "<p class='text-danger'>$errSenha</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="human" class="col-sm-2 control-label">2 + 3 = ?</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="human" name="human" placeholder="Digite o resuldado da soma">
							<?php echo "<p class='text-danger'>$errHuman</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="Enviar Solicitação" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>