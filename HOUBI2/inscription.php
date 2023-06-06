<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/header.php'; ?>
<div class="container my-4">
    <h2 class=" text-center" > Inscription </h2>
<?php  
if(isset($_POST['envoi'])){
  if(!empty($_POST['nompre_user']) && !empty($_POST['email_user']) && !empty($_POST['tel_user']) 
  && !empty($_POST['address_user']) && !empty($_POST['login_user']) && !empty($_POST['pass_user'])){

    require 'inc/db-function.php';

    $inscription = user_register($_POST);

    if($inscription){
        header("Location: connexion.php?success=1");
    }else{
        echo'<div class="alert alert-danger" role="alert">
        Inscription Echoué!
      </div>';
    }
  }else{
      echo'<div class="alert alert-danger" role="alert">
      Les champs ne sont pas remplis!
    </div>';
  }
}?>
 
<form method="POST" action="">
  <div class="mb-3">
    <label for="nompre_user" class="form-label"> Nom & Prénom</label>
    <input type="text" class="form-control" id="nompre_user" name="nompre_user" >
  </div>

  <div class="mb-3">
    <label for="email_user" class="form-label">Email</label>
    <input type="email" class="form-control" id="email_user" name="email_user" >
  </div>

  <div class="mb-3">
    <label for="tel_user" class="form-label">Telephone</label>
    <input type="Telephone" class="form-control" id="tel_user" name="tel_user">
  </div>

  <div class="mb-3">
    <label for="address_user" class="form-label">Address</label>
    <textarea type="address" class="form-control" id="address_user" rows="3" name="address_user"></textarea>
  </div>

  <div class="mb-3">
    <label for="login_user" class="form-label">Login</label>
    <input type="login" class="form-control" id="login_user" name="login_user">
  </div>

  <div class="mb-3">
    <label for="pass_user" class="form-label">Password</label>
    <input type="password" class="form-control" id="pass_user" name="pass_user">
  </div>
  

  <button type="submit" class="btn btn-primary" name="envoi">Inscription</button>
</form>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/footer.php'; ?>