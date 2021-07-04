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
        <div id="corpo-form-cad">
            <h1>Cadastrar</h1>
            <form method="POST">
                <input type="text" name="nome" placeholder="Nome Completo" maxlength="30">
                <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
                <input type="email" name="email" placeholder="Usuario" maxlength="40">
                <input type="password" name="senha" placeholder="Senha" maxlength="15">
                <input type="password" name="confSenha" placeholder="Confirmar Senha" maxlength="15">
                <input type="submit" value="CADASTRAR">
            </form>
        </div>
        <?php
            //Verificar se clicou no botão
           if (isset($_POST['nome'])){
                $nome = addslashes ($_POST['nome']);
                $telefone = addslashes ($_POST['telefone']);
                $email = addslashes ($_POST['email']);
                $senha = addslashes ($_POST['senha']);
                $confirmarSenha = addslashes ($_POST['confSenha']);
                //verificar se está preenchido
                if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha)){
                    $u->conectar("sistema_login", "localhost", "root", "root");
                    if($u->msgErro == ""){
                        if($senha == $confirmarSenha){
                           if($u->cadastrar($nome, $telefone, $email, $senha)){
                               ?>
                                <div id="msg-sucesso">
                                    Cadastrado com sucesso
                                </div>
                                <?php
                           }else{
                               ?>
                                <div class="msg-erro">
                                    Email já cadastrado!!!
                                </div>
                               <?php
                           }
                        }else{
                            ?>
                            <div class="msg-erro">
                                Senha e confirmar senha não correspondem!!!
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