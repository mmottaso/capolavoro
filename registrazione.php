<?php
session_start();
include_once('connection.php');

if (isset($_POST['submit'])) {

    $cf = $_POST['cf'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $numeroTelefono = $_POST['numeroTelefono'];
    $email = $_POST['email'];
    $_SESSION['email'] = $email;
    $password = md5($_POST['password']);
    
    $sql = "INSERT INTO utente (cf,nome,cognome,numeroTelefono,email,password) VALUES ('$cf','$nome','$cognome','$numeroTelefono','$email','$password')";
    $result = mysqli_query($conn, $sql);

    if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['nome']) || empty($_POST['cognome']) || empty($_POST['cf'])) {
        echo "<script>alert('Inserire tutti i campi');</script>";
        exit;
    } elseif($result) {
      header('location:pagina.php');
      echo "<script>alert('Registrazione effettuata con successo');</script>";
    }

}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Registrazione</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css">
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
            <p  style ="color: white;" class="text-center h1 fw-bold mb-4 mx-1 mx-md-3 mt-3">Registrazione </p>
            <!-- Email input -->
            <div class="form-outline mb-4">

              <label class="form-label" for="form1Example13" style ="color: white;"> <i class="bi bi-person-circle"></i> Nome</label>
              <input type="text" id="form1Example13" class="form-control form-control-lg py-3" name="nome" autocomplete="off" placeholder="inserisci nome" style="border-radius:25px ;" />

              <label class="form-label" for="form1Example13" style ="color: white;"> <i class="bi bi-person-circle"></i> Cognome</label>
              <input type="text" id="form1Example13" class="form-control form-control-lg py-3" name="cognome" autocomplete="off" placeholder="inserisci cognome" style="border-radius:25px ;" />


              <label class="form-label" for="form1Example13" style ="color: white;"> <i class="bi bi-person-circle"></i> Codice fiscale</label>
              <input type="text" id="form1Example13" class="form-control form-control-lg py-3" name="cf" autocomplete="off" placeholder="inserisci codice fiscale" style="border-radius:25px ;" />

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">

            <label class="form-label" for="form1Example13" style ="color: white;"> <i class="bi bi-person-circle"></i> Numero di telefono</label>
              <input type="text" id="form1Example13" class="form-control form-control-lg py-3" name="numeroTelefono" autocomplete="off" placeholder="inserisci numero di telefono" style="border-radius:25px ;" />


              <label class="form-label" for="form1Example13" style ="color: white;"> <i class="bi bi-person-circle"></i> Email</label>
              <input type="text" id="form1Example13" class="form-control form-control-lg py-3" name="email" autocomplete="off" placeholder="inserisci e-mail" style="border-radius:25px ;" />


              <label  style ="color: white;" class="form-label" for="form1Example23"><i class="bi bi-chat-left-dots-fill"></i> Password</label>
              <input type="password" id="form1Example23" class="form-control form-control-lg py-3" name="password" autocomplete="off" placeholder="inserisci password" style="border-radius:25px ;" />

            </div>


            <!-- Submit button -->
            <!-- <button type="submit" class="btn btn-primary btn-lg">Login in</button> -->
            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
             <a href="pagina.php"><input type="submit" value="submit" name="submit" class="btn btn-warning btn-lg text-light my-2 py-3" style="width:100% ; border-radius: 30px; font-weight:600;" /></a>
            </div>

          </form><br>
          <p style ="color: white;" align="center">Possiedi già un account? Effettua il <a href="login.php" class="text-warning" style="font-weight:600;text-decoration:none;">login</a> qui.</p>
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