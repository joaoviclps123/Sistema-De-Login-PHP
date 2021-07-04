<?php
    require_once 'classes/usuarios.php';
    $u = new Usuario;
?>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Sistema Login</title>
        <link rel="stylesheet" href="./assets/css/style.css">
    </head>
    <body>
        <div id="corpo-form">
            <h1>Entrar</h1>
            <form method="POST">
                <input type="email" name="email" placeholder="Usuario">
                <input type="password" name="senha" placeholder="Senha">
                <input type="submit" value="ACESSAR">
                <a href="cadastrar.php">Ainda não tem cadastro? <strong>CADASTRE-SE</strong></a>
            </form>
        </div>
        <?php
            if (isset($_POST['email'])){
                $email = addslashes ($_POST['email']);
                $senha = addslashes ($_POST['senha']);

                if(!empty($email) && !empty($senha)){
                    $u->conectar("sistema_login", "localhost", "root", "root");
                    if($u->msgErro == ""){
                        if($u->logar($email, $senha)){
                            header("location: AreaPrivada.php");
                    }else{
                        ?>
                        <div class="msg-erro">
                            Email e/ou senha estão incorretos
                        </div>
                        <?php
                    }
                }else{
                    ?>
                    <div class="msg-erro">
                        <?php echo "Erro: ".$u->msgErro; ?>
                    </div>
                    <?php
                }
            }else{
                ?>
                <div class="msg-erro">
                    Preencha todos os campos!!!
                </div>
                <?php
            }
        }
        ?>
    </body>
</html>