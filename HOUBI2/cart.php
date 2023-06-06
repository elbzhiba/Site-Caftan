<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/inc/db-function.php'; ?>
<?php 
  //initialisation de panier
  if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  }

// si on
  if(isset($_GET['action']) && $_GET['action'] == 'del'){
    if(isset( $_GET['id'])){
      if( ($key = array_search($_GET['id'],$_SESSION['cart'])) !== false){
        unset($_SESSION['cart'][$key]);
      }
    }
  } 
  if(isset($_GET['action']) && $_GET['action'] == 'add'){
     //on test si l'id du produit existe dans le panier
    if(!in_array($_GET['id'], $_SESSION['cart'])){
      //si non on ajoute l'id du produit au panier
      array_push($_SESSION['cart'], $_GET['id']);
      $message ="Le produit a bien ete ajoute au panier ";
    }else{
      $message ="Le produit existe deja dans votre panier! ";
    }
  }
  
 
?>
<section class="h-100" style="background-color: #eee;">
  <div class="container h-100 py-5">
    <?php if (isset($message)){ ?>
      <div class="alert alert-info" role="alert"><?php echo $message ?></div>
    <?php } ?>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-10">

        <div class="d-flex justify-content-between align-items-center mb-4">
          <h3 class="fw-normal mb-0 text-black">Panier</h3>
         
        </div>
        <?php 
        if(!empty($_SESSION['cart'])){
          $total= 0;
        foreach($_SESSION['cart'] as $id_product_in_cart){  
          $product = get_product_by_id($id_product_in_cart);
        ?>
<div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <div class="col-md-2 col-lg-2 col-xl-2">
              <img class="card-img-top" src="assets/img/<?php echo $product["image_produit"]?>" alt="..." />
              </div>
              <div class="col-md-3 col-lg-3 col-xl-3">
                <p class="lead fw-normal mb-2"><?= $product['title_produit']?></p>
              </div>
              <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                <h5 class="mb-0"><?=$product['prix_produit']?> €</h5>
              </div>
              <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                <a href="cart.php?action=del&id=<?= $product['id_produit'] ?>" class="text-danger"><i class="bi bi-trash"></i></a>
              </div>
            </div>
          </div>
        </div>
        <?php $total += floatval($product['prix_produit']); ?>
        <?php } ?>
      <?php }else{ ?>
      <div class="card rounded-3 mb-4">
          <div class="card-body p-4">
            <div class="row d-flex justify-content-between align-items-center">
              <p> Votre panier est vide ! </p>
            </div>
          </div>
        </div>
        <?php } ?>
        <div class="card">
          <div class="card-body d-flex justify-content-between">
            <a class="btn btn-warning btn-block btn-lg" href="checkout.php">Commander</a>
           <?php if(isset($total)){ ?>
            <p class="h4 text-right">Total:<?=$total ?>€</p>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/footer.php'; ?>
