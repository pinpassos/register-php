<?php
// Include navbar
include_once 'navbar.php';
// Connection
require_once 'php_action/db_connect.php';
// Session
session_start();
// Verify session
if(!isset($_SESSION['logado'])) {
  header('Location: index.php');
}
?>

<?php
if(isset($_SESSION['mensagem'])){
  echo $_SESSION['mensagem'];
}

// Datas
$login = $_SESSION['id'];
$sql = " SELECT * FROM dados_irmao WHERE login = '$login' ";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
?>

<!-- Main div -->
<div class="container">
  <div class="row">
    <div class="col s1 m6 l12">
      <h1 class="title-collection">Dados Pessoais de <?php echo $dados['nome']; ?></h1>
      <ul class="collection">
        <li class="collection-item avatar">
          <i class="material-icons circle indigo">navigate_next</i>
          <span>Cadastro</span>
          <p><?php echo $dados['cadastro'];?></p>
        </li>

        <li class="collection-item avatar">
          <i class="material-icons circle indigo">navigate_next</i>
          <span>Nome</span>
          <p><?php echo $dados['nome'];?></p>
        </li>

        <li class="collection-item avatar">
          <i class="material-icons circle indigo">navigate_next</i>
          <span>Email</span>
          <p><?php echo $dados['email'];?></p>
          </p>
        </li>

        <li class="collection-item avatar">
          <i class="material-icons circle indigo">navigate_next</i>
          <span>CPF</span>
          <p><?php echo $dados['cpf'];?></p>
        </li>

          <li class="collection-item avatar">
          <i class="material-icons circle indigo">navigate_next</i>
          <span>Situação</span>
          <?php
            if($dados['situacao'] === '1'):?>
            <p class="teal-text text-darken-1"><b>Ativo</b></p>
            <?php 
            else:?>
            <p class="red-text text-darken-1"><b>Inativo</b></p>
            <?php
            endif;
            ?>
        </li>
    </div>
</div>
<a href="alterarregistro.php?cadastro=<?php echo $login; ?>" class=" botao-edit waves-effect waves-light btn red darken-1"><i class="material-icons right">dehaze</i>Editar dados pessoais</a>

<?php
include_once 'includes/footer.php';
?>