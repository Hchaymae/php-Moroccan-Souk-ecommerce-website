<?php

    session_start();
    if(isset($_SESSION['nom'])){ // connectee
        //header("Location:profile.php");
        
    }

    include "../include/FUNCTIONS.php";
    
    $user= true;
    if(!empty($_POST)){
        $user = ConnectAdmin($_POST);
        if( is_array($user) && count($user) > 0){     // utilisateur  connectee
            Session_start();
            $_SESSION['id'] = $user['id']; 
            $_SESSION['email'] = $user['email']; 
            $_SESSION['nom'] = $user['nom']; 
            $_SESSION['mp'] = $user['mp']; 
            
            header("location:profile.php");  //Redirection vers la page profile

        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.min.css" rel="stylesheet">

    <title>M-SHOP</title>
</head>

<body>

    <!-- Debut include -->
    <?php
        include "../include/header.php";
    ?>
    <!-- fin include -->

    <!-- debut form  -->
    <div class="col-12 p-5">

        <h1 class="text-center mb-2">Espace Admin : Connexion</h1>

        <form action="login.php" method="post">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Enter Your Email address">
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="mp" class="form-control" id="exampleInputPassword1"
                    placeholder="Enter Your Password">
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>

    </div>
    <!-- fin form  -->




    <!-- footer  -->

    <?php  include('../include/footer.php')?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

<?php    

if(!$user)
{print"<script>
    Swal.fire({
        title: 'ERROR!',
        text: 'Cordonnees non valides',
        icon: 'error',
        confirmButtonText: 'OK',
        timer : 2000
    })
</script>";
}
?>

</html>