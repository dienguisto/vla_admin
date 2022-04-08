<?php

echo $_GET['login'];

   if (isset($_GET['login']) && !empty($_GET['username']) && !empty($_GET['password'])) {

	$user = $_GET['username'];
	$pass = $_GET['password'];
	
 }

function get_client_ip_server() {
$ipaddress = '';
if($_SERVER['REMOTE_ADDR'])
 $ipaddress = $_SERVER['REMOTE_ADDR'];
else
 $ipaddress = 'UNKNOWN';

return $ipaddress;
}

//BDD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "vla_db";
// Connections
$con = new mysqli($servername, $username, $password, $dbname);

            //On vérifie la connexion
            if($con->connect_error){
                die('Erreur : ' .$con->connect_error);
            }

$select_utilisateur = "SELECT * FROM `users` WHERE user = '$user' AND password ='$pass' ";

$select_utilisateur_query = mysqli_query($con, $select_utilisateur);
$utilisateur=mysqli_fetch_array($select_utilisateur_query);
$user =   $utilisateur['user'];
$nom =    $utilisateur['nom'];
$prenom = $utilisateur['prenom'];
$pass =   $utilisateur['password'];

	   
	  if (($_GET['username'] == $user) && 
		 ($_GET['password'] == $pass))
	  {


		header('Location: ../index.html');

		 $_SESSION['valid'] = true;
		 $_SESSION['timeout'] = time();
		 $_SESSION['username'] = $user;
		 $_SESSION['nom'] = $nom.' '.$prenom;
         $ip = get_client_ip_server();
	  }
	else{
		echo "Vous avez pas l'autorisation d'accéder à cette interface.";
	}
	



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>VLA ADMIN</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="#" class="logo d-flex align-items-center w-auto">
            
                  <span class="d-none d-lg-block">Gestionnaire VLA</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Connectez-vous!</h5>
                    <p class="text-center small"></p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Veillez renseigner votre nom d'utilisateur.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Veillez renseigner votre mot de passe!</div>
                    </div>

                   <!--     <div class="col-12">
                      <div class="form-check">
                     <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> -->
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="login">Connexion</button>
                    </div>
        <!--             <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="pages-register.html">Create an account</a></p>
                    </div> -->
                  </form>

                </div>
              </div>

   

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

</body>

</html>