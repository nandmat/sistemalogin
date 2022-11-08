<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha']))
{
    if(strlen($_POST['email']) == 0)
    {
        echo "<script>window.alert('Preencha seu email!!')</script>";
    } elseif(strlen($_POST['senha']) == 0) {
        echo "<script>window.alert('Preencha sua senha!!')</script>";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli->query($sql) or die("Falha na execução SQL: ". $mysqli->error);

        $qtd = $sql_query->num_rows;

        if($qtd == 1)
        {
            $usuario = $sql_query->fetch_assoc();
            if(!isset($_SESSION))
            {
                session_start();
            }
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: page.php");
        } else {
            echo "<script>window.alert('Falha! Dados incorretos')</script>";
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acessar conta</title>
</head>
<body>
    <h3>Autenticar</h3>
    <form action="" method="post">
        <p>
        <label>Email</label>
        <input type="text" name="email">
        </p>

        <p>
        <label>Senha</label>
        <input type="password" name="senha">
        </p>

        <p>
            <button type="submit">Entrar</button>
        </p>
    </form>
</body>
</html>