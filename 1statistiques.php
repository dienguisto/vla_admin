<?php
   session_start();
  $_SESSION['username'];
$_SESSION['valid'];
if ($_SESSION['valid'] == true)
{

  ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
  <title>RIGHTPLACECALL MOROCCO - RECRUTEMENT ADMINISTRATION</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css"  href="flat/css/smart-forms-version=4.2.css">
    <link rel="stylesheet" type="text/css"  href="flat/css/font-awesome.min.css">

      <link href="style/css/bootstrap.min.css" rel="stylesheet">
  <link href="style/css/mdb.min.css" rel="stylesheet">
   <link href='dataTables.bootstrap4.min.css' rel='stylesheet' type='text/css'>
    <!--[if lte IE 9]>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>    
        <script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
    <![endif]-->    
    
    <!--[if lte IE 8]>
        <link type="text/css" rel="stylesheet" href="css/smart-forms-ie8.css">
    <![endif]--> 

       <style>

.progress-bar
{
  display:none; 

}
.bar 
{ 
  background-color: #B4F5B4; 
  width:0%; 
  height:20px; 
  border-radius: 3px; 
}
.percent 
{ 
  position:absolute; 
  display:inline-block; 
  top:3px; 
  left:48%; 
}
#loader{
    display: none;
}

</style>
</head>

<body class="woodbg">
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
  <a class="navbar-brand" href="#"><img src="login/images/logo_mini_white.png" width="120"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-333"
    aria-controls="navbarSupportedContent-333" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-333">
  
    <ul class="navbar-nav ml-auto nav-flex-icons">
   
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">

          <i class="fa fa-user"></i>
          <b><?php echo strtoupper($_SESSION['nom']);?></b>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-default"
          aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="deconnexion.php"><i class="fa fa-sign-out"></i> Déconnexion</a>
       
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->
    <div class="smart-wrap">
        <div class="smart-forms smart-container wrap-2">
        
            <div class="form-header">
                <h4 style="text-align:center;text-decoration-line: underline;"><i class="fa fa-users"></i><b style="text-transform: uppercase;">Listes des candidatures reçues</b></h4>
            </div>
        
            <div id="loader"></div>
       
         <div class="float-right"><button onClick="window.location.reload();" class="button btn-dark" style="color:#fff;"> <i class="fa fa-circle-o-notch fa-spin"></i> SYNCHRONISATION DES DONNEES</button></div>
         <br><br> <br><br>
         <div class="table-responsive"> 
    <table id='candidats' class="table table-striped table-bordered" style="width:100%;text-align: center;">
                <thead>
                <tr>
          
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>TELEPHONE</th>
                    <th>EMAIL</th>
                    <th>EXPERIENCE</th>
                    <th>CURRICULUM VITAE</th>
                    <th>CANAL DIGITAL</th>
                    <th>DATE DEPOT</th>
                    <th>STATUT</th>
                     <th>STATUT PAR</th>
                      <th>DATE STATUT</th>
                    <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                          <?php
                          ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
                          include 'config.php';
                $empQuery = "select * from candidats ORDER BY id_candidat DESC";
$empRecords = mysqli_query($con, $empQuery);
while ($row = mysqli_fetch_assoc($empRecords)) {
$id_candidat = $row['id_candidat'];
$nom = $row['nom'];
$prenom = $row['prenom'];
$telephone = $row['telephone'];
$status = $row['status'];
$email = $row['email'];
$experience = $row['experience'];
$cv = '<a class="button btn-primary" target="_blank" href="https://recrutement.rightplacecall.com/candidature/'.$row['cv'].'">  VISUALISER </a>';
$canal_digital = '<i class="fa fa-facebook-official" style="font-size: 30px;color: #0f57ce;"></i>';
$date_inscription = $row['date_inscription'];
$status_par = $row['user_status'];
$date_status = $row['date_status'];

if($status == 'Nouveau'){
$action1 = '<button type="button" name="update" id="'.$row["id_candidat"].'" class="button btn-primary accept"><i class="fa fa-check"></i> Accepter</button>&nbsp;<button type="button" name="accept" id="'.$row["id_candidat"].'" class="button btn-danger reject"><i class="fa fa-times"></i> Rejeter</button>';

}else{
$action1 = '<button type="button" name="update" class="button btn-primary" disabled><i class="fa fa-check"></i> Accepter</button>&nbsp;<button type="button" name="reject" class="button btn-danger" disabled><i class="fa fa-times"></i> Rejeter</button>';
}

if($status_par == ''){

    $status_par = 'Systèm';
}
if($date_status == ''){

    $date_status = '--';
}
?>
<tr>
<th><?php echo $nom; ?> </th>
<th><?php echo $prenom; ?> </th>
<th><?php echo $telephone; ?> </th>
<th><?php echo $email; ?> </th>
<th><?php echo $experience; ?> </th>
<th><?php echo $cv; ?> </th>
<th><?php echo $canal_digital; ?> </th>
<th><?php echo $date_inscription; ?> </th>
<th><button class="button btn-warning"><b><?php echo $status;?></b></button> </th>
<th><?php echo $status_par; ?> </th>
<th><?php echo $date_status; ?> </th>
<th><?php echo $action1; ?> </th>

</tr>
<?php
}
?>
                </tbody>
            </table> 
            </div>       
          </div>
    </div>

      <script type="text/javascript" src="style/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="style/js/popper.min.js"></script>
  <script type="text/javascript" src="style/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="style/js/mdb.min.js"></script>        
        <!-- Datatable JS -->
<script src="DataTables/datatables.min.js"></script>
 <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function(){

          function refreshPage() {
    location.reload(true);
}


$('#candidats').DataTable({
                "language": {
      "sProcessing":     '<i class="fa fa-refresh fa-spin"></i> CHARGEMENT DES DONNEES...',
    "sSearch":         "Rechercher&nbsp;:",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
    "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sLoadingRecords": "Chargement en cours...",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "oPaginate": {
        "sFirst":      "Premier",
        "sPrevious":   "Pr&eacute;c&eacute;dent",
        "sNext":       "Suivant",
        "sLast":       "Dernier"
    }
    }

               
                

        
            });


          $("#candidats").on('click', '.accept', function(){
  var CandidatID = $(this).attr("id");
  var UserSession = '<?php echo $_SESSION['nom'];?>';
  $.ajax({
    url:'action_candidat.php',
    method:"POST",
    data:{CandidatID:CandidatID,UserSession:UserSession,action:'Accept'},
    success:function(data){
      alert('CANDIDAT ACCEPTER AVEC SUCCES !');
    window.location.reload();

    }
  })
});

          $("#candidats").on('click', '.reject', function(){
  var CandidatID = $(this).attr("id");
  var UserSession = '<?php echo $_SESSION['nom'];?>';
  $.ajax({
    url:'action_candidat.php',
    method:"POST",
    data:{CandidatID:CandidatID,UserSession:UserSession,action:'Reject'},
    success:function(data){
      alert('CANDIDAT REJETER AVEC SUCCES !');
    window.location.reload();

    }
  })
});

        });



      
        </script>

</body>
</html>
<?php

}else{
      header('Location: login/index.php');

}
?>