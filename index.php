<?php
// Header
include_once 'includes/header.php';
// Connection
require_once 'php_action/db_connect.php';

// Session
session_start();

// Verify action btn_login
if(isset($_POST['btn_login'])) {
  $erros = array();
  $login = mysqli_escape_string($connect, $_POST["login"]);
  $senha = mysqli_escape_string($connect, $_POST["password"]);

  if(empty($login) || empty($senha)) {
    $erros[] = 'Os campos de Login e Senha devem ser preenchidos.';
  } else {
    $sql = "SELECT login FROM dados_irmao WHERE login = '$login'";
    $resultado = mysqli_query($connect, $sql);


    if(mysqli_num_rows($resultado) > 0) {
      $sql = "SELECT * FROM dados_irmao WHERE login = '$login' AND senha = '$senha'";
      $resultado = mysqli_query($connect, $sql);

      if(mysqli_num_rows($resultado) == 1) {
        $dados = mysqli_fetch_array($resultado);
        $_SESSION['logado'] = true;
        $_SESSION['id'] = $dados['login'];
        header('Location: home.php');
    
      } else {
        $erros[] = 'Número de cadastro e senha não conferem.';
      }
    } else {
      $erros[] = 'O usuário não está cadastrado ou não existe.';
    }
  }
}
?>

<!--LOGIN SCREEN-->
<div class="section">
<?php 
  if(!empty($erros)) {
    foreach($erros as $erro) {
      echo $erro;
    }
  }
?>

</div>
  <main>
    <center>
      <!--<img class="responsive-img" style="width: 250px;" src="logo-transp01.png" />-->
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12"  action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class='row'>
              <div class='col s12'>
              <i class="medium material-icons indigo-text">face</i>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name="login">
                <label for='login'>Digite seu cadastro</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password'/>
                <label for='password'>Digite sua senha</label>
              </div>
            </div>

            <br/>
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo modal-trigger href'>Entrar</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    </center>

  </main>

<!--PAGE FOOTER-->
<?php
// Footer
include_once 'includes/footer.php';
?>