<?php
session_start();
include_once('connection.php');

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT email, password FROM utente WHERE email = '$email' AND password ='$password'";
    $result = mysqli_query($conn, $sql);

    if (empty($_POST['email']) && empty($_POST['password'])) {
        echo "<script>alert('Inserire email e password');</script>";
        exit;
    } elseif (empty($_POST['password'])) {
        echo "<script>alert('Inserire password');</script>";
        exit;
    } elseif (empty($_POST['email'])) {
        echo "<script>alert('Inserire email);</script>";
        exit;
    } else {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $email = $row['email'];
            $password = $row['password'];
            $_SESSION['email'] = $email;

            if ($email == $email && $password == $password) {
                $_POST['email'] = $email;
                $_POST['password'] = $password;
                header('location:pagina.php');
            }
        } else {
            echo "<script>alert('Invalid email or Password');</script>";
            exit;
        }
    }
    if($result){
      echo "<script>alert('Login effettuato con successo');</script>";
    } else {
      echo "<script>alert('Login non riuscito, l'account non esiste');</script>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Login</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="stils.css">
</head>


<body style="background-color: #012e72;">


  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="img.avif" class="img-fluid" alt="Phone image" height="300px" width="600px">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <form action="" method="post">
            <p  style ="color: white;" class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Login </p>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <label class="form-label" for="form1Example13" style ="color: white;"> <i class="bi bi-person-circle"></i> Email</label>
              <input type="email" id="form1Example13" class="form-control form-control-lg py-3" name="email" autocomplete="off" placeholder="inserisci e-mail" style="border-radius:25px ;" />

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <label  style ="color: white;" class="form-label" for="form1Example23"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
              <input type="password" id="form1Example23" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="inserisci password" style="border-radius:25px ;" />

            </div>


            <!-- Submit button -->
            <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
              <input type="submit" value="submit" name="submit" class="btn btn-warning btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;" onclick="pagina.php"/>
            </div>

          </form><br>
          <p style ="color: white;" align="center">Non possiedi ancora un account? <a href="registrazione.php" class="text-warning" style="font-weight:600;text-decoration:none;"> Registrati</a> qui.</p>
        </div>
      </div>
    </div>
  </section>







  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>