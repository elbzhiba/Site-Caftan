<?php require $_SERVER['DOCUMENT_ROOT'] . '/HOUBI2/layouts/header.php'; ?>
<?php require $_SERVER['DOCUMENT_ROOT'] . '/HOUBI2/inc/db-function.php'; ?>
<?php if(!is_connected()) {
    header('location: login.php');
    exit();
}
$user = get_user_by_id($_SESSION['id']);
if(isset($_POST["edit"])){
    if(!empty($_POST['nompre'])){
        $nompre = htmlentities($_POST['nompre']);
      
        $res = edit_user($_SESSION["id"], $nompre);
        if($res){
            header("Refresh:0");
        }
    }
}
?>

<div class="container my-4">
    <div class="page-profile">
        <div class="row">
            <!-- COL 1 -->
            <div class="col-md-4">
                <section class="panel">
                    <div class="panel-body noradius padding-10">

                        <!-- About -->
                        <h3 class="text-black">
                            <?php echo $user["nompre_user"] ?>
                        </h3>
                        <small class="text-gray size-14"><?php echo $user["email_user"]; ?></small>
                        <ul class="list-group mt-4">
                            <li class="list-group-item"><a href="account.php">Modifier le profile</a></li>
                            <li class="list-group-item active"><a href="orders.php">Mes commandes</a></li>
                            <li class="list-group-item"><a href="logout.php">Déconnexion</a></li>
                        </ul>
                        <!-- /About -->

                    </div>
                </section>
            </div><!-- /COL 1 -->


            <!-- COL 2 -->

            <div class="col-md-8">

                
            <form class="form-horizontal padding-10" method="POST" action="" enctype="multipart/form-data">
                        <h4>Mes Commandes</h4>
                        <fieldset>
                        <div class="container">
                <?php $orders = get_all_orders(); ?>
                    <?php if (empty($orders)) { ?>
                        <p>Vous n'avez pas de commandes.</p>
                        <?php } else { ?>

<table class="table">
  <thead>
    <tr>

      <th scope="col">Num commande</th>
      <th scope="col">produit</th>
      <th scope="col">Date</th>

    </tr>
  </thead>
  <tbody>


    
    <?php $orders = get_all_orders(); ?>
    <?php if(!empty($orders)) { ?>
    <?php foreach($orders as $order) { ?>
    <tr>
      
      <td><?= $order["order_number"]?></td>
      <td><?= $order["title_produit"]?></td>
      <td><?= $order["created"]?></td>

      
    </tr>
    <?php } ?>
    <?php } ?>

  </tbody>
</table>
<?php } ?>
    </div>
</fieldset>


            </div>
            </div>
    </div>
</div>
<?php require $_SERVER['DOCUMENT_ROOT'].'/HOUBI2/layouts/footer.php'; ?>