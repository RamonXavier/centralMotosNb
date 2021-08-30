<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar - Central Motos NB</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <div class="global-container">
        <div class="card login-form">
            <div class="card-header card_header_person"></div>
            <div class="card-body">
                <?php
                if (isset($_GET['error'])) { ?>
                <div class="form-group alert alert-danger" role="alert">
                    Usuário ou Senha Inválidos
                </div>
                <?php } ?>
                <form action="../../Controller/LoginController.php" method="POST">

                    <div class="card-text">
                        <!--
			<div class="alert alert-danger alert-dismissible fade show" role="alert">Incorrect username or password.</div> -->
                        <!-- to error: add class "has-danger" -->
                        <div class="form-group"></div>
                        <label for="nome">Nome de usuário</label>
                        <input type="text" class="form-control form-control-sm" id="nome" name="nome"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="senha">Senha</label>
                        <a href="#" style="float:right;font-size:12px;">Perdi a senha</a>
                        <input type="password" class="form-control form-control-sm" id="senha" name="senha">
                    </div>

                    <input type="hidden" value="logar" name="formPost" id="formPost">
                    <button type="submit" class="btn btn-primary btn-block">Logar</button>

                    <div class="sign-up">
                        Não tem conta? <a href="#">Entre em contato</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>