<?php
		function protegePagina($explode){
            
            $paginas_protegidas = array("inicio", "editar");
            
			if(!isset($_SESSION['usuarioLogin']) && in_array($explode, $paginas_protegidas)){
				header('Location: login');
			}
			if(isset($_SESSION['usuarioLogin']) && $explode == "site"){
				header('Location: inicio');
			}
		}

		function verifica_dados($con){
			if(isset($_POST['env']) && $_POST['env'] == "form"){
				$email = $_POST['email'];
				$sql = $con->prepare("SELECT * FROM usuario WHERE email = ?"); 
				$sql->bind_param("s", $email);
				$sql->execute();
				$get = $sql->get_result();
				$total = $get->num_rows;

				if($total > 0){
					$dados = $get->fetch_assoc();
					add_dados_recover($con, $email);
					
				}else{
					echo "<div class='alert alert-danger'>E-mail não cadastrado!</div>";
				}
			}
		}


		function add_dados_recover($con, $email){
			$rash = md5(rand());
			$sql = $con->prepare("INSERT INTO recover_solicitation (email, rash) VALUES (?, ?)");
			$sql->bind_param("ss", $email, $rash);
			$sql->execute();

			if($sql->affected_rows > 0){
				enviar_email($con, $email, $rash);
			}
		}

		function enviar_email($con, $email, $rash){
			//mail($email, "Recuperação de senha Adote.com", "Minha senha é essa...<a href='".sitedir."?pagina=alterar&rash={$rash}'>","From: adote_recupera@outlook.com");

			$texto = "
			Olá

			Verificamos que você precisa recuperar sua senha de acesso.
			Por favor, acesse o link para redefinir uma nova senha:

			".sitedir."?pagina=alterar&rash={$rash}

			Obrigado!";
			$envio = mail($email, "Recuperação de senha Adote.com", $texto,"From: adote_recupera@outlook.com");
			if($envio){
				echo "<div class='alert alert-success'>E-mail enviado com sucesso!</div>";
			}else{
				echo "<div class='alert alert-danger'>E-mail não cadastrado!</div>";
			}
		}

		function verifica_rash($con, $rash){
			if(isset($_POST['env']) && $_POST['env'] == "upd"){
				$nsenha = md5($_POST['senha']);
				$sql = $con->prepare("SELECT * FROM recover_solicitation WHERE rash = ? AND status = 0");
				$sql->bind_param("s", $_GET['rash']);
				$sql->execute();
				$get = $sql->get_result();
				$total = $get->num_rows;
				if($total > 0){
					$dados = $get->fetch_assoc();
					atualiza_senha($con, $dados['email'], $nsenha);
					deleta_rashs($con, $dados['email']);
					echo "<div class='alert alert-success'>Senha atualizada com sucesso!</div>";
					redireciona("?pagina=login");
				}else{
					echo "<div class='alert alert-danger'>Rash invalida!</div>";
				}
			}
		}

		function atualiza_senha($con, $email, $senha){
			$sql = $con->prepare("UPDATE usuario SET senha = ? WHERE email = ?");
			$sql->bind_param("ss", $senha, $email);
			$sql->execute();

			if($sql->affected_rows > 0){
				return true;
			}else{
				return false;
			}
		}

		function deleta_rashs($con, $email){
			$sql = $con->prepare("DELETE FROM recover_solicitation WHERE email = ?");
			$sql->bind_param("s", $email);
			$sql->execute();

			if($sql->affected_rows > 0){
				return true;
			}else{
				return false;
			}
		}

		function redireciona($dir){
			echo "<meta http-equiv='refresh' content='3; url={$dir}'>";
		}
?>

