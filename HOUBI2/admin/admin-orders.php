<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/header-admin.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/inc/db-function.php'; ?>
<?php if(!is_admin()){
    header('location: login.php');
    exit();
}?>
<div class="container">
<table class="table">
  <thead>
    <tr>

      <th scope="col">Numéro commande</th>
      <th scope="col">Nom</th>
      <th scope="col">Produit</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    
    <?php $orders = get_all_orders(); ?>
    <?php if(!empty($orders)) { ?>
    <?php foreach($orders as $order) { ?>
    <tr>
      
      <td><?= $order["order_number"]?></td>
      <td><?= $order["nompre_user"]?></td>
      <td><?= $order["title_produit"]?></td>
      <td><?= $order["created"]?></td>

     
      
    </tr>
    <?php } ?>
    <?php } ?>

  </tbody>
</table>
    </div>

<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/footer.php'; ?>