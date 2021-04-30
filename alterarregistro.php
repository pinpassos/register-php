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

if(isset($_GET['cadastro'])) {
  $login = mysqli_escape_string($connect, $_GET['cadastro']);
  $sql = "SELECT * from dados_irmao WHERE login = '$login'";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
}
?>
<div class="container">
  <div class="row">
    
    <div class="col s12 m6 l6">
        <h1 class="title-collection">Edição de dados pessoais</h1>

        <form action="php_action/edit_register.php" method="POST"> 
        
        <input type="hidden" value="<?php echo $dados['login']; ?>">
        <input type="text" name="email" value="<?php echo $dados['email']; ?>">
        <label for="email">Email: </label>
        <input type="text" name="nome" value="<?php echo $dados['nome']; ?>">
        <label for="cep">Nome: </label>
        <input type="text" name="cpf" value="<?php echo $dados['cpf']; ?>">
        <label for="endereco">CPF: </label>
    </div>

        <center>
        <div class="col s12 m6 l6">
          <div class="secondSection teste" >
          <h1 class="title-collection">Uma pequena ajuda</h1>
          <p>Muito bem! Agora que chegou até aqui, iremos dar cotinuidade as alterações que deseja fazer em seu cadastro.</p>
          <p>Para que tudo ocorra bem, preencha as informações ao lado e para finalizar, basta clicar em salvar alterações.</p>
          <button type="submit" name="btn-editar" class="btn indigo">Salvar alterações</button><br><br>
          <a href="home.php" class="btn red">Descartar alterações</a>
          </div>
        </div>
        </center>
    </div>
  </div>
</form>

<?php
include_once 'includes/footer.php';
?>