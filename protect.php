<?php 
if(!isset($_SESSION))
{
    session_start();
}

if(!isset($_SESSION['id']))
{
    die("Ação interrompida! Faça a autenticaçao novamente <p><a href=\"index.php\">ENTRAR</a></p>");
}
