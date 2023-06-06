<?php session_start(); ?>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/header.php'; ?>
<div class="container my-4">
<?php 
if(isset($_POST['connect'])){
  if(!empty($_POST['login_user']) && !empty($_POST['pass_user'])){
    require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/inc/db-function.php';
  
    $res = user_connect($_POST);
    if(is_numeric($res)){
      $_SESSION["login"] = $_POST["login_user"];
      $_SESSION["id"] = $res;
      header("Location: index.php");
    }
    switch($res){
      case 'wrongpass':
        echo'<div class="alert alert-danger" role="alert">Mauvais MDPS!</div>';
        break;
      case 'wronglogin':
        echo'<div class="alert alert-danger" role="alert">Mauvais LOGIN!</div>';
        break;
      
          
    }
  }
}

?>

    <h2 class="text-center" > Connexion </h2>
<?php if(isset($_GET['success']) && $_GET['success'] == 1){ ?>
  <div class="alert alert-success" role="alert">Inscription Réussi!</div>
<?php } ?>


<form method="POST" action="">
  <div class="mb-3">
    <label for="login_user" class="form-label"> Identifiant</label>
    <input type="text" class="form-control" id="login_user" name="login_user">
  </div>
  <div class="mb-3">
    <label for="pass_user" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="pass_user" name="pass_user">
  </div>
  
  <button type="submit" class="btn btn-primary" name="connect">Submit</button>
</form>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/footer.php'; ?>
