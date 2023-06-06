<?php

function connect(){
$servername   = "localhost:3307"; //server
$username     = "root"; //username
$password     = ""; //password
$dbname       = "houbi_bdd";  //database
$connexion    = new mysqli ($servername,$username,$password,$dbname);
     if($connexion){
        return $connexion;
    }else{
        die('Connexion impossible');
        }
}

function user_register($info_user){
    $bdd      = connect();

    $nompre   = htmlentities($info_user["nompre_user"]);
    $email    = htmlentities($info_user["email_user"]);
    $tel      = htmlentities($info_user["tel_user"]);
    $address  = htmlentities($info_user["address_user"]);
    $login    = htmlentities ($info_user["login_user"]);
    $pass     = password_hash($info_user["pass_user"], PASSWORD_DEFAULT);

    /* DEFINITION DE LA REQUETE SQL */
    $requete_sql = "INSERT INTO user(nompre_user, email_user, tel_user, address_user, login_user, pass_user)VALUES(
        '$nompre','$email', '$tel', '$address', '$login','$pass')";
    /*Execution de la requete */
    $result_sql  = $bdd->query($requete_sql);

    return $result_sql;
    
}

function user_connect($info_user){
    $bdd      =  connect();
    $login    = htmlentities($info_user["login_user"]);

    /* DEFINITION DE LA REQUETE SQL */
    $requete_sql = "SELECT * From user WHERE login_user= '$login'";

    /*Execution de la requete */
    $result_sql  = $bdd->query($requete_sql);

    if($result_sql->num_rows >0){
        $ligne = $result_sql->fetch_array();
        $passwordHash = $ligne['pass_user'];
        if(password_verify($info_user["pass_user"], $passwordHash)){
            //connecté
            return $ligne['id_user'];
        }else{
            // bon login mais faux mdp
            return "wrongpass";
        }
    }else{ 
        //mauvais login
        return "wronglogin";
    }

}
function get_all_product(){
    $bdd = connect();
    /* DEFINITION DE LA REQUETE SQL */
    $requete_sql = "SELECT * From produit";
     /*Execution de la requete */
     $result_sql  = $bdd->query($requete_sql);
     if($result_sql->num_rows >0){
        return $result_sql->fetch_all(MYSQLI_ASSOC);
     }
}
function get_product_by_id($id_product){
    $bdd = connect();
    /* DEFINITION DE LA REQUETE SQL */
    $requete_sql = "SELECT * FROM produit WHERE id_produit = $id_product";
     /*Execution de la requete */
     $result_sql  = $bdd->query($requete_sql);
     if($result_sql->num_rows > 0){
        return $result_sql->fetch_array();
     }
}
function remove_product($id_product){
    $bdd = connect();
    /* DEFINITION DE LA REQUETE SQL */
    $requete_sql = "DELETE FROM produit WHERE id_produit = $id_product";
     /*Execution de la requete */
     $result_sql  = $bdd->query($requete_sql);
     
        return $result_sql;
     }

     function create_order($order_number, $user_id, $produit, $created){
        $bdd      = connect();
        /* DEFINITION DE LA REQUETE SQL */
        $requete_sql = "INSERT INTO orders(order_number, user_id, product_id, created)
        VALUES('$order_number', '$user_id', '$produit', '$created')";
        /*Execution de la requete */
        $result_sql  = $bdd->query($requete_sql);
    
        return $result_sql;
    }
    function add_product($image, $titre, $prix){
        $bdd      = connect();
        /* DEFINITION DE LA REQUETE SQL */
        $requete_sql = "INSERT INTO produit(title_produit,  prix_produit, image_produit)
        VALUES('$titre', '$prix', '$image')";
        /*Execution de la requete */
        $result_sql  = $bdd->query($requete_sql);
    
        return $result_sql;
    }
    function edit_product($image, $titre, $prix, $id){
    $bdd = connect();
    /* Définition de la requête SQL */
    $requete_sql = "UPDATE produit SET title_produit = '$titre',  prix_produit = '$prix', image_produit = '$image' WHERE id_produit = $id";
    
    /* Execution de la requête SQL */
    $result_sql = $bdd->query($requete_sql);
    
    return $result_sql;
}
function get_user_by_id($id){
    $bdd = connect();
    
    /* Définition de la requête SQL */
    $requete_sql = "SELECT * FROM user WHERE id_user = $id" ;
    /* Execution de la requête SQL */
    $result_sql = $bdd->query($requete_sql);
    if($result_sql->num_rows > 0){
        $user = $result_sql->fetch_array();
        return $user;
    }
}
   





function edit_user($id, $nom, $tel, $adresse){
    $bdd = connect();
    /* Définition de la requête SQL */
    $requete_sql = "UPDATE user SET nompre_user = '$nom', tel_user = '$tel', address_user = '$adresse' WHERE id_user = $id";
    /* Execution de la requête SQL */
    $result_sql = $bdd->query($requete_sql);
    return $result_sql;
}
function get_all_orders(){
    $bdd = connect();
    /* DEFINITION DE LA REQUETE SQL */
    $requete_sql = "SELECT orders.*, user.*, produit.* FROM orders
    LEFT JOIN user ON orders.user_id = user.id_user LEFT JOIN produit ON produit.id_produit = orders.product_id";

     /*Execution de la requete */
     $result_sql  = $bdd->query($requete_sql);
     if($result_sql->num_rows >0){
        return $result_sql->fetch_all(MYSQLI_ASSOC);
     }
}
function get_order_by_id($user_id){
    $bdd = connect();
    /* DEFINITION DE LA REQUETE SQL */
    $requete_sql = "SELECT * FROM orders WHERE user_id = $login";
     /*Execution de la requete */
     $result_sql  = $bdd->query($requete_sql);
     if($result_sql->num_rows > 0){
        return $result_sql->fetch_array();
     }
}
function get_product_title($id_produit) {
    $bdd = connect();
  
    // Définition de la requête SQL pour récupérer le titre du produit
    $requete_select = "SELECT title_produit FROM produit WHERE id_produit = '$id_produit'";
    $result_select = $bdd->query($requete_select);
  
    if ($result_select->num_rows > 0) {
      $row = $result_select->fetch_assoc();
      return $row['title_produit'];
    }
  
    return null;
  }
?>