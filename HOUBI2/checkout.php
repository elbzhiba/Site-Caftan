<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/inc/db-function.php'; ?>

<?php
if (!is_connected()){
    exit();
}

if (!empty($_SESSION["cart"])) {
    $today = date("Ymd");
    $rand = strtoupper(substr(uniqid(sha1(time())), 0, 4));
    $order_number = $today . $rand;
    $created = date("Y-m-d H:i:s");
    $user_id = $_SESSION["id"];
    $title_produit = ""; // Variable pour stocker les titres des produits
  
    foreach ($_SESSION["cart"] as $id_produit) {
      $res = create_order($order_number, $user_id, $id_produit, $created);
  
      // Récupérer le titre du produit en fonction de l'id_produit
      $titre_produit = get_product_title($id_produit);
  
      if ($titre_produit) {
        $title_produit .= $titre_produit . ', ';
      }
    }
  
    if ($res) {
      $_SESSION["cart"] = array();
      echo '  

      <div class="container" style="text-align: center; margin-top: 50px;">
      <h1 style="font-size: 30px; color: #333333; margin-bottom: 20px;">Commande Passée</h1>
      <h4 style="font-size: 22px; color: #666666; margin-bottom: 10px;">Détails de la commande</h4>
      <p style="font-size: 20px; color: #888888; margin-bottom: 10px;"><strong>Numéro de commande :</strong>' . $order_number . '</p>
      <p style="font-size: 20px; color: #888888; margin-bottom: 10px;"><strong>Produits :</strong>' . rtrim($title_produit, ', ') . '</p>
      <p style="font-size: 20px; color: #888888;"><strong>Date de création :</strong>' . $created . '</p>
  </div>';
    }
  }
    
?>

<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/footer.php'; ?>