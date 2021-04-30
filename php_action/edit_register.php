<?php
// Connection
require_once 'db_connect.php';
// Session
session_start();

if(isset($_POST['btn-editar'])) {
    $erros = array();
    $login = mysqli_escape_string($connect, $_SESSION['id']);
    $email = mysqli_escape_string($connect, $_POST['email']);
    $nome = mysqli_escape_string($connect, $_POST['nome']);
    $cpf = mysqli_escape_string($connect, $_POST['cpf']);

    if(empty($email) || empty($nome) || empty($cpf)) {
        $erros[] = 'Não pode haver espações em branco no formulário';
    }

    if(strlen($nome) < 3) {
        $erros[] = 'Senha ou nome devem conter mais do que três caracteres';
    }

    if(empty($erros)) {
        $sql = "UPDATE dados_irmao SET email = '$email', nome = '$nome', cpf = '$cpf' WHERE login = '$login'";

        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem'] = "Registro editado com sucesso!";
            header('Location: ../home.php');
        } else {
            $_SESSION['mensagem'] = "Erro ao editar registro!";
            header('Location: ../home.php');
        } 
    } else {
        foreach($erros as $erro) {
            echo $erro;
            echo '<br>';
        }
    }
}

?>
