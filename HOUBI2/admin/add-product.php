<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/header-admin.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/inc/db-function.php'; ?>
<?php if(!is_admin()){
    header('location: login.php');
    exit();
}?>
<?php 
    if(isset($_POST["ajouter"])){
        if(!empty($_FILES["img"]) && !empty($_POST["titre"])  && !empty($_POST["prix"])){
        //ajoute l'image au dossier img de notre projet
        $filename =  $_FILES["img"]["name"];
        $tempname =  $_FILES["img"]["tmp_name"];
        $folder   =  "../assets/img/" . $filename;

    
        $titre    =  htmlentities($_POST["titre"]);
        $prix    =  htmlentities($_POST["prix"]);

   
        if(move_uploaded_file($tempname, $folder)) {
          $res = add_product($filename, $titre, $prix);
          if($res){
          $message = '<div class="alert alert-success" role="alert">Produit correctement ajouté</div>';
          }else{
          $message = '<div class="alert alert-danger" role="alert">Echec lors de l\'ajout du produit</div>';
          }
          }else{
          $message = '<div class="alert alert-danger" role="alert">Image non envoyé</div>';
          }
        } 
      }?>
<div class=" container my-4">
    <h2 class="text-center">Ajouter un produit </h2>
    <?php if(isset($message)) { ?>
      <?= $message ?>
  <?php } ?>

<form method="POST" action="" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="img" class="form-label"> Image</label>
    <div class="input-group">
        <input type="file" class="form-control" id="img" name="img" aria-label="Selectionner">
  </div>
  </div>

  <div class="mb-3">
    <label for="titre" class="form-label">Titre du produit</label>
    <input type="titre" class="form-control" id="titre" name="titre" >
  </div>

  <div class="mb-3">
    <label for="prix" class="form-label">Prix du produit</label>
    <input type="prix" class="form-control" id="prix" name="prix">
  </div>
 
  <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
</form>
</div>

    <?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/footer.php'; ?>
