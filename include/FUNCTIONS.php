<?php


function connect(){
  $username = 'root';
  $password = '';
  $servername = 'localhost';
  $DBname = 'ecommerce';
      
  try {
      $conn = new PDO("mysql:host=$servername;dbname=$DBname", $username, $password);
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo "Connected successfully";
  } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
  }
  
  return $conn;
}




function getAllcategories () {
    
    $conn = connect();
    //2-  Creation de la requette

    $requette ="SELECT * FROM categories";


    //3-  Execution de la requette

    $resultat = $conn -> query($requette); // execution de la requette par la fonction query 

    //4- Resultat de la requette

    $categories = $resultat -> fetchAll(); //tableau
    // var_dump($categories);
    return $categories;
    
}

function getAllProducts() {
   
  $conn = connect();

        //2-  Creation de la requette
    
        $requette ="SELECT * FROM produits";
    
    
        //3-  Execution de la requette
    
        $resultat = $conn -> query($requette); // execution de la requette par la fonction query 
    
        //4- Resultat de la requette
    
        $products = $resultat -> fetchAll(); //tableau
        // var_dump($categories);
        return $products;
        
}

function SearchProducts($keyword){   
  $conn = connect();


    //2-  Creation de la requette
    
    $requette ="SELECT * FROM produits WHERE nom LIKE '%$keyword%'";
    
    //3-  Execution de la requette
    
    $resultat = $conn -> query($requette); // execution de la requette par la fonction query 
    
    //4- Resultat de la requette

    $products = $resultat -> fetchAll(); //tableau
    // var_dump($categories);
    return $products;
}

function getProductById($id){
  $conn = connect();

    //2-  Creation de la requette

    $requette ="SELECT * FROM produits WHERE id=$id";
    //3-  Execution de la requette
    
    $resultat = $conn -> query($requette); // execution de la requette par la fonction query 
    
    //4- Resultat de la requette

    $product = $resultat -> fetch(); //tableau
    // var_dump($categories);
    return $product;

}



function AddVisiteur($data){
  $conn = connect();

  $mphash = md5($data['mp']);
  
  //2-  Creation de la requette

  $requette ="INSERT INTO `visiteur`(`email`, `nom`, `prenom`, `phone`, `adresse`, `mp`) VALUES ('".$data['email']."','".$data['nom']."','".$data['prenom']."','".$data['number']."','".$data['adresse']."','".$mphash."')";

  $resultat =  $conn -> query($requette);
  
  if ($resultat){
    return TRUE;
  }else{
    return FALSE;
  }
}

function ConnectVisiteur($data){
  $conn = connect();

  $email = $data['email'];
  $mphash = md5($data['mp']);
  $requette = "SELECT * FROM visiteur WHERE email='$email' AND mp ='$mphash'";
  
  $result = $conn -> query($requette);
  $user = $result->fetch();

  return $user;
  
}

function ConnectAdmin($data){
  $conn = connect();

  $email = $data['email'];
  $mphash = md5($data['mp']);
  
  $requette = "SELECT *FROM administrateur WHERE email = '".$email."' AND mp ='".$mphash."'";

  $result = $conn -> query($requette);
  $admin = $result->fetch();

  return $admin;
}

function getAllUsers(){

  $conn = connect();

  $requette = "SELECT * FROM `visiteur` WHERE `etat`=0";

  $resultat = $conn->query($requette);

  $users = $resultat->fetchAll();

  return $users;
}

function  getAllStocks(){
  
  $conn =connect();

  $requette = "SELECT stock.id,produit,`quantite` FROM `produits`,`stock` WHERE produits.id = stock.id ";

  $resultat = $conn -> query($requette);
  $stock = $resultat->fetchAll();
  return $stock;

}









?>