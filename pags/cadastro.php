<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Adote.com</title>
        <link rel="icon" type="image/x-icon" href="assets/img/fav.jpg" />
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Adote.com</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="">Home</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="adote">Adote</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>


<form method="POST" id="cadastro" class="col-md-6 offset-md-3">
    <p class="col-md-12 offset-md-3" >Fomulário de cadastro<p>
    <label>Nome</label>
    <input type="text" name="nome" class="form-control"><br>

    <label>Telefone</label>
    <input type="text" name="telefone" class="form-control"><br>

    <label>Endereço</label>
    <input type="text" name="endereco" class="form-control"><br>

    <label>Usuário</label>
    <input type="text" name="usuario" class="form-control"><br>

    <label>E-mail</label>
    <input type="email" name="email" class="form-control"><br>

    <label>Senha</label>
    <input type="password" name="senha" class="form-control"><br>

    <input type="submit" value="Cadastrar" class="btn btn-outline-success btn-lg btn-block">
    <input type="hidden" name="env" value="cad">
</form>

<div id="ja_tem" class="col-md-6 offset-md-5">
    <a>Já tem cadastro?</a>
    <a href="login/" class="btn btn-info">Logar</a>
</div>


<?php

if(isset($_POST['env'])){
    if($_POST['env'] && $_POST['env'] == "cad"){
        if($_POST['nome'] || $_POST['telefone'] || $_POST['endereco'] || $_POST['usuario'] || $_POST['email'] || $_POST['senha']){
            $nome = addslashes($_POST['nome']);
            $telefone = addslashes($_POST['telefone']);
            $endereco = addslashes($_POST['endereco']);
            $usuario = addslashes($_POST['usuario']);
            $email = addslashes($_POST['email']);
            $senha = addslashes($_POST['senha']);

            $sql = $con->prepare("INSERT INTO usuario (nome, telefone, endereco, usuario, email, senha) VALUES (?, ?, ?, ?, ?, ?)");
            $sql->bind_param("ssssss", $nome, $telefone, $endereco, $usuario, $email, $senha);
            $sql->execute();
            
            if($sql->affected_rows > 0){
                echo "<div class='alert alert-success col-md-6 offset-md-3'>Cadastro efetuado com sucesso!</div>";
            }else{
                echo "<div class='alert alert-danger col-md-6 offset-md-3'>Erro ao se cadastrar!</div>";
            }
        }else{
            echo "<div class='alert alert-danger col-md-6 offset-md-3'>Preencha todos os campos!</div>";
        }
    }
}
?>
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Localização</h4>
                        <p class="lead mb-0">
                            Rua zero dois, 5678
                            <br />
                            Mairiporã, SP 02179-045
                        </p>
                    </div>
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Redes Sociais</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="https://www.instagram.com/marcelinhoprotetoroficial/?hl=pt-br"><i class="fab fa-fw fa-instagram"></i></a>
                    </div>
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Doações</h4>
                        <p class="lead mb-0">
                            Por favor entrar em contato através dos números:<br/>
                            Tel: (11) 2222-2222<br/>
                            Cel: (11) 98888-8888
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Adote.com 2020</small></div>
        </div>

        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
