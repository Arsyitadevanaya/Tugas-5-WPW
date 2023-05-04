<?php
session_start();
include 'koneksi.php';



if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result=mysqli_query($conn, "SELECT username FROM user WHERE id =$id");
    $row=mysqli_fetch_assoc($result);

    //cek cookie
    if($key===hash('sha256', $row['username'])){
        $_SESSION["user_is_loged_in"]=true;
    }
}



if(isset($_SESSION["user_is_loged_in"])){
    header("Location: tampilan.php");
    exit;
}
if(isset($_POST["login"])){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $result=mysqli_query($conn, "SELECT * FROM user WHERE username='$username'");
    //cek username
    if(mysqli_num_rows($result)===1){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password, $row["pswd"])){
            //set session
            $_SESSION["user_is_loged_in"]=true;
            //cek remember me
            if(isset($_POST['cek'])){

                setcookie('id', $row['id'], time()+60);
                setcookie('key', hash('sha256', $row['username']), time()+60);
            }

            header("location:tampilan.php");
            exit;
        }else{
            $error_message = "Gagal login";
        }
    }else{
        $error_message = "Gagal login";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body {
            background-color: #0041b8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            
            width: 500pc;
        }
        img{
            margin-top: 70px;
        }
        .card-body{
            margin: 10px;
        }
    </style>
</head>
<body>
    
    <div class="content">
        <div class="card mb-3" style="max-width: 800px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="assets/Login.jpg" class="img-fluid rounded-start" alt="login" >
                </div>
                <div class="col-md-8">
                    <div class="card-body"><br>
                        <h1 class="card-title fw-bold">Log in</h1><br><br>
                        
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="email" name="username" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                            <div class="mb-3">
                                <label for="inputPassword6" class="col-form-label">Password</label> 
                                <input type="password" name="password" id="inputPassword6" class="form-control" aria-labelledby="passwordHelpInline">
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" name="cek" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
                            </div>
                            <a href="register.php">Sign in</a><br><br>
                           
                            <button type="submit" class="btn btn-primary" name="login">Log in</button>
                            <?php if(isset($error_message)) { ?>
                                <p style="color: red;"><?php echo $error_message; ?></p>
                             <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
       
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>