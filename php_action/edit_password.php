<?php
// Connection
require_once 'db_connect.php';
// Session
session_start();

if(isset($_GET['btn-novasenha'])) {
    $erros = array();
    $id = $_GET['id_usuario'];
    $senha = (mysqli_escape_string($connect, $_GET['senha']));
    $novaSenha = (mysqli_escape_string($connect, $_GET['nova-senha']));

    if($senha == '' || $novaSenha == '') {
        $erros[] = "Os campos de login e senha devem ser preenchidos.";
        $_SESSION['mensagem-senha-erro'] = 'Os campos de login e senha devem ser preenchidos.';
        header('Location: ../alterarsenha.php');
    }

    if($senha<>$novaSenha) {
        $erros[] = "Os campos de login e senha devem ser iguais.";
        $_SESSION['mensagem-senha-erro'] = 'Os campos de login e senha devem ser iguais.';
        header('Location: ../alterarsenha.php');
    }

    if(!empty($erros)) {
        foreach($erros as $erro) {
            echo '<li>'.$erro.'</li>';
            echo "<br>";
        }
    echo '<b>Volte para a página anterior para que possa fazer as alterações necessárias.</b>';
    } else {
        $sql = "UPDATE dados_irmao SET senha = '$senha' WHERE login = '$id' ";
        if(mysqli_query($connect, $sql)) {
            $_SESSION['mensagem-senha-sucesso'] = 'Senha alterada com sucesso!';
            header('Location: ../alterarsenha.php');
        }
    }
}
?>