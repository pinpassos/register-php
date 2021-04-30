<?php
// Include navbar
include_once 'navbar.php';
// Session
session_start();

if(isset($_SESSION['mensagem-senha-sucesso'])) {
  echo $_SESSION['mensagem-senha-sucesso'];
}

if(isset($_SESSION['mensagem-senha-erro'])) {
  echo $_SESSION['mensagem-senha-erro'];
}

?>
  
<div class="container">
  <form action="php_action/edit_password.php" method="GET">
  <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['id'];?>">
      <h1 class="title-collection">Alterar senha</h1>
    <div class="row">
    <div class="col s12 m12">
      <div class="card white">
        <div class="card-content indigo-text">
          <span class="card-title">Digite sua senha</span>
            <div class="row">
                <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                    <i class="material-icons prefix">lock_outline</i>
                    <input type="text" name="senha" class="validate">
                    <label>Digite sua nova senha</label>
                    </div>
                    <div class="input-field col s6">
                    <i class="material-icons prefix">lock_outline</i>
                    <input type="text" name="nova-senha" class="validate">
                    <label>Repita a senha inserida anteriormente</label>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="card-action">
          <button type="submit" name="btn-novasenha" class="btn indigo">Alterar senha</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</form>

<?php
include_once 'includes/footer.php';
?>