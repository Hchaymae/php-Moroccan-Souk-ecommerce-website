<?php
    include "include/FUNCTIONS.php";
   
    session_start();

    if(isset($_SESSION['nom'])){ // connectee
        header("Location:profile.php");
    }

    $showRegirstrationAlert = 0;
    $categories = getAllcategories();
    $products = getAllProducts();
    if(!empty($_POST)){
        
       if(AddVisiteur($_POST)){
            $showRegirstrationAlert = 1;
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

    <!-- Debut include  -->
    <?php
        include "include/header.php";
    ?>
    <!-- fin include  -->

    <!-- debut form  -->
    <div class="col-12 p-5">

        <h1 class="text-center mb-2">Sign Up</h1>

        <form action="signup.php" method="POST">

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Enter Your Email address" name="email" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">First Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Your First Name"
                    name="nom" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Last Name"
                    name="prenom" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="text" class="form-control" id="exampleInputPassword1"
                    placeholder="Enter Your Number of phone" name="number" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Your address"
                    name="adresse" required>
            </div>

            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Your Password"
                    name="mp" required>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>
        </form>

    </div>
    <!-- fin form  -->




    <!-- debut footer  -->
    <?php  include('include/footer.php')?>
    <!-- fin footer  -->


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.1/dist/sweetalert2.all.min.js"></script>

<?php    

if($showRegirstrationAlert == 1 )
{print"<script>
    Swal.fire({
        title: 'Success!',
        text: 'Your account is successfully created',
        icon: 'success',
        confirmButtonText: 'OK',
        timer : 2000
    })
</script>";
}
?>

</html>