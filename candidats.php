<?php

/*SELECT candidats.id_candidat, candidats.nom, candidats.prenom,candidats.telephone, candidats.email, candidats.experience, candidats.cv, candidats.date_inscription, candidats.adresse_ip, candidats.canal_digital, candidats.adresse_ip_status,historique_status.id_candidat,historique_status.status,historique_status.status_par,historique_status.date_status from candidats 
INNER JOIN historique_status ON candidats.id_candidat=historique_status.id_candidat 
WHERE historique_status.id_candidat = '152'
 GROUP BY `historique_status`.`id_candidat` 
 ORDER BY `historique_status`.`date_status` DESC
 
SELECT C.id_candidat, C.name, P.id_candidat, P.date
  FROM candidats AS C
  LEFT JOIN historique_status AS P ON 
    (
      P.id_candidat = C.id_candidat 
      AND P.id_histo IN (
        SELECT MAX(PP.id_histo) FROM historique_status AS PP GROUP BY PP.id_candidat
      )
    )
    */
   session_start();
  $_SESSION['username'];
  $_SESSION['nom'];
$_SESSION['valid'];
if ($_SESSION['valid'] == true)
{
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'config.php';
mysqli_query($con,"SET NAMES 'utf8'");
//echo $_SESSION['username'];
if($_SESSION['username'] == 'jakli'){
$where = "where user_status='".$_SESSION['username']."'  AND canal_digital='FACEBOOK'  GROUP BY telephone ORDER BY `id_candidat` DESC ";
}
elseif($_SESSION['username'] == 'srachad'){
  $where = "where user_status='".$_SESSION['username']."' AND canal_digital='FACEBOOK'   GROUP BY telephone ORDER BY `id_candidat` DESC  ";

}elseif($_SESSION['username'] == 'shachad'){
  $where = "where canal_digital='FACEBOOK'  GROUP BY telephone ORDER BY `id_candidat` DESC  ";

}else{
  $where='  GROUP BY telephone ORDER BY `id_candidat` DESC ';
}
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="style/js/jquery-3.4.1.min.js"></script>
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

/******************************

Stati - minimal statistical cards

*******************************/
.stati{
  background: #fff;
  height: 6em;
  padding:1em;
  margin:1em 0; 
    -webkit-transition: margin 0.5s ease,box-shadow 0.5s ease; /* Safari */
    transition: margin 0.5s ease,box-shadow 0.5s ease; 
  -moz-box-shadow:0px 0.2em 0.4em rgb(0, 0, 0,0.8);
-webkit-box-shadow:0px 0.2em 0.4em rgb(0, 0, 0,0.8);
box-shadow:0px 0.2em 0.4em rgb(0, 0, 0,0.8);
}
.stati:hover{ 
  margin-top:0.5em;  
  -moz-box-shadow:0px 0.4em 0.5em rgb(0, 0, 0,0.8); 
-webkit-box-shadow:0px 0.4em 0.5em rgb(0, 0, 0,0.8); 
box-shadow:0px 0.4em 0.5em rgb(0, 0, 0,0.8); 
}
.stati i{
  font-size:3.5em; 
} 
.stati div{
  width: calc(100% - 3.5em);
  display: block;
  float:right;
  text-align:right;
}
.stati div b {
  font-size:2.2em;
  width: 100%;
  padding-top:0px;
  margin-top:-0.2em;
  margin-bottom:-0.2em;
  display: block;
}
.stati div span {
font-size: 15px;
    width: 100%;
    color: #ffffff !important;
    display: block;
    line-height: 20px;;
  display: block;
}

.stati.left div{ 
  float:left;
  text-align:left;
}

.stati.bg-turquoise { background: rgb(26, 188, 156); color:white;} 
.stati.bg-emerald { background: rgb(46, 204, 113); color:white;} 
.stati.bg-peter_river { background: rgb(52, 152, 219); color:white;} 
.stati.bg-amethyst { background: rgb(155, 89, 182); color:white;} 
.stati.bg-wet_asphalt { background: rgb(52, 73, 94); color:white;} 
.stati.bg-green_sea { background: rgb(22, 160, 133); color:white;} 
.stati.bg-nephritis { background: rgb(39, 174, 96); color:white;} 
.stati.bg-belize_hole { background: rgb(41, 128, 185); color:white;} 
.stati.bg-wisteria { background: rgb(142, 68, 173); color:white;} 
.stati.bg-midnight_blue { background: rgb(44, 62, 80); color:white;} 
.stati.bg-sun_flower { background: rgb(241, 196, 15); color:white;} 
.stati.bg-carrot { background: rgb(230, 126, 34); color:white;} 
.stati.bg-alizarin { background: rgb(231, 76, 60); color:white;} 
.stati.bg-clouds { background: rgb(236, 240, 241); color:white;} 
.stati.bg-concrete { background: rgb(149, 165, 166); color:white;} 
.stati.bg-orange { background: rgb(243, 156, 18); color:white;} 
.stati.bg-pumpkin { background: rgb(211, 84, 0); color:white;} 
.stati.bg-pomegranate { background: rgb(192, 57, 43); color:white;} 
.stati.bg-silver { background: rgb(189, 195, 199); color:white;} 
.stati.bg-asbestos { background: rgb(127, 140, 141); color:white;} 
  

.stati.turquoise { color: rgb(26, 188, 156); } 
.stati.emerald { color: rgb(46, 204, 113); } 
.stati.peter_river { color: rgb(52, 152, 219); } 
.stati.amethyst { color: rgb(155, 89, 182); } 
.stati.wet_asphalt { color: rgb(52, 73, 94); } 
.stati.green_sea { color: rgb(22, 160, 133); } 
.stati.nephritis { color: rgb(39, 174, 96); } 
.stati.belize_hole { color: rgb(41, 128, 185); } 
.stati.wisteria { color: rgb(142, 68, 173); } 
.stati.midnight_blue { color: rgb(44, 62, 80); } 
.stati.sun_flower { color: rgb(241, 196, 15); } 
.stati.carrot { color: rgb(230, 126, 34); } 
.stati.alizarin { color: rgb(231, 76, 60); } 
.stati.clouds { color: rgb(236, 240, 241); } 
.stati.concrete { color: rgb(149, 165, 166); } 
.stati.orange { color: rgb(243, 156, 18); } 
.stati.pumpkin { color: rgb(211, 84, 0); } 
.stati.pomegranate { color: rgb(192, 57, 43); } 
.stati.silver { color: rgb(189, 195, 199); } 
.stati.asbestos { color: rgb(127, 140, 141); } 
  
   


</style>
</head>

<body class="woodbg">
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
  <a class="navbar-brand" href="#"><img src="login/images/logo_mini_white.png" width="85"></a>
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
          <a class="dropdown-item" href="deconnexion.php"><i class="fa fa-sign-out"></i> D??connexion</a>
       
        </div>
      </li>
    </ul>
  </div>
</nav>
<!--/.Navbar -->


    <div class="smart-wrap">
        <div class="smart-forms smart-container wrap-2">
                      <div class="spacer-b30"></div>
              <div class="spacer-b30"></div>

          <!--   <div class="form-header">
                <h4 style="text-align:center;text-decoration-line: underline;"><i class="fa fa-users"></i><b style="text-transform: uppercase;">Listes des candidatures re??ues</b></h4>
            </div> -->
        <div class="row" style="background: #e6e6e6;margin: auto;border: 2px solid #4285f4;border-radius: 8px;text-align: center;">
 <div class="form-header header-primary" style="padding: 7px 21px;">
                    <h4 style="font-size: 25px; text-align: center;"><i style="font-size: 25px;" class="fa fa-pie-chart"></i>FILTRE DES STATISTIQUES</h4>
              </div>
              <div class="spacer-b30"></div>
              <div>
<div class="frm-row">
       <div class="row" style="margin: auto;"  id="filter-row">
<?php
      
if($_SESSION['username'] == 'jakli' || $_SESSION['username'] =='srachad'){

$newstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$_SESSION['username']."' and status='Nouveau' AND canal_digital='FACEBOOK'";
$newstatsRecords = mysqli_query($con, $newstatsQuery);
$newstatsRow = mysqli_fetch_array($newstatsRecords);
$newcount_status_today = $newstatsRow['count'];


$statsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$_SESSION['username']."' AND canal_digital='FACEBOOK'";
$statsRecords = mysqli_query($con, $statsQuery);
$statsRow = mysqli_fetch_array($statsRecords);
$count_status_today = $statsRow['count'];


$valstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$_SESSION['username']."' and status='Valid??' AND canal_digital='FACEBOOK'";
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valstatsRow = mysqli_fetch_array($valstatsRecords);
$valcount_status_today = $valstatsRow['count'];


$refstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$_SESSION['username']."' and status='Refus??' AND canal_digital='FACEBOOK'";
$refstatsRecords = mysqli_query($con, $refstatsQuery);
$refstatsRow = mysqli_fetch_array($refstatsRecords);
$refcount_status_today = $refstatsRow['count'];


$entstatsQuery1 = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$_SESSION['username']."' and status='1er Entretien' AND canal_digital='FACEBOOK'";
$entstatsRecords1 = mysqli_query($con, $entstatsQuery1);
$entstatsRow1 = mysqli_fetch_array($entstatsRecords1);
$entcount_status_today1 = $entstatsRow1['count'];


$entstatsQuery2 = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$_SESSION['username']."' and status='2eme Entretien' AND canal_digital='FACEBOOK' ";
$entstatsRecords2 = mysqli_query($con, $entstatsQuery2);
$entstatsRow2 = mysqli_fetch_array($entstatsRecords2);
$entcount_status_today2 = $entstatsRow2['count'];

}elseif($_SESSION['username'] == 'shachad'){
  $newstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Nouveau' AND canal_digital='FACEBOOK'";
$newstatsRecords = mysqli_query($con, $newstatsQuery);
$newstatsRow = mysqli_fetch_array($newstatsRecords);
$newcount_status_today = $newstatsRow['count'];


$statsQuery = "SELECT count(`status`) as 'count' from `candidats`  where canal_digital='FACEBOOK'";
$statsRecords = mysqli_query($con, $statsQuery);
$statsRow = mysqli_fetch_array($statsRecords);
$count_status_today = $statsRow['count'];


$valstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Valid??' AND canal_digital='FACEBOOK'";
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valstatsRow = mysqli_fetch_array($valstatsRecords);
$valcount_status_today = $valstatsRow['count'];


$refstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Refus??' AND canal_digital='FACEBOOK'";
$refstatsRecords = mysqli_query($con, $refstatsQuery);
$refstatsRow = mysqli_fetch_array($refstatsRecords);
$refcount_status_today = $refstatsRow['count'];


$entstatsQuery1 = "SELECT count(`status`) as 'count' from `candidats` 
 where status='1er Entretien' AND canal_digital='FACEBOOK'";
$entstatsRecords1 = mysqli_query($con, $entstatsQuery1);
$entstatsRow1 = mysqli_fetch_array($entstatsRecords1);
$entcount_status_today1 = $entstatsRow1['count'];


$entstatsQuery2 = "SELECT count(`status`) as 'count' from `candidats` 
 where status='2eme Entretien'  AND canal_digital='FACEBOOK'";
$entstatsRecords2 = mysqli_query($con, $entstatsQuery2);
$entstatsRow2 = mysqli_fetch_array($entstatsRecords2);
$entcount_status_today2 = $entstatsRow2['count'];
}else{
  $newstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Nouveau'";
$newstatsRecords = mysqli_query($con, $newstatsQuery);
$newstatsRow = mysqli_fetch_array($newstatsRecords);
$newcount_status_today = $newstatsRow['count'];


$statsQuery = "SELECT count(`status`) as 'count' from `candidats` ";
$statsRecords = mysqli_query($con, $statsQuery);
$statsRow = mysqli_fetch_array($statsRecords);
$count_status_today = $statsRow['count'];


$valstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Valid??'";
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valstatsRow = mysqli_fetch_array($valstatsRecords);
$valcount_status_today = $valstatsRow['count'];


$refstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Refus??'";
$refstatsRecords = mysqli_query($con, $refstatsQuery);
$refstatsRow = mysqli_fetch_array($refstatsRecords);
$refcount_status_today = $refstatsRow['count'];


$entstatsQuery1 = "SELECT count(`status`) as 'count' from `candidats` 
 where status='1er Entretien'";
$entstatsRecords1 = mysqli_query($con, $entstatsQuery1);
$entstatsRow1 = mysqli_fetch_array($entstatsRecords1);
$entcount_status_today1 = $entstatsRow1['count'];


$entstatsQuery2 = "SELECT count(`status`) as 'count' from `candidats` 
 where status='2eme Entretien' ";
$entstatsRecords2 = mysqli_query($con, $entstatsQuery2);
$entstatsRow2 = mysqli_fetch_array($entstatsRecords2);
$entcount_status_today2 = $entstatsRow2['count'];
}


$OK_CL = ($valcount_status_today / 100) * $count_status_today;

        ?>
          <div class="col-md-2">
        <div class="stati bg-midnight_blue">
          <i class="fa fa-address-book"></i>
          <div>
            <b><?php echo  $count_status_today;?></b>
            <span>Total Candidats</span>
          </div> 
        </div>
      </div> 
        <div class="col-md-2">
        <div class="stati bg-sun_flower ">
          <i class="fa fa-hand-pointer-o"></i>
          <div>
            <b><?php echo  $entcount_status_today1;?></b>
            <span>1er Entretien</span>
          </div> 
        </div>
      </div>
        <div class="col-md-2">
        <div class="stati bg-carrot ">
          <i class="fa fa-hand-peace-o"></i>
          <div>
            <b><?php echo  $entcount_status_today2;?></b>
            <span>2??me Entretien</span>
          </div> 
        </div>
      </div>
        <div class="col-md-2">
        <div class="stati bg-nephritis ">
          <i class="fa fa-check-square"></i>
          <div>
            <b><?php echo  $valcount_status_today;?></b>
            <span>Candidats Valid??s</span>
          </div> 
        </div>
      </div>
      <div class="col-md-2">
        <div class="stati bg-pumpkin ">
          <i class="fa fa-times-rectangle"></i>
          <div>
            <b><?php echo  $refcount_status_today;?></b>
            <span>Candidats Refus??s</span>
          </div> 
        </div>
      </div>
      <div class="col-md-2">
        <div class="stati bg-pomegranate ">
          <i class="fa fa-clock-o"></i>
          <div>
            <b><?php echo  $newcount_status_today;?> </b>
            <span>Non Statu??s</span>
          </div> 
        </div>
      </div>
       </div>
<div class="spacer-b30"></div>
                        <div class="section colm colm6">
                            <label class="field prepend-icon">
                              <input type="date" id="from" name="from" class="gui-input hasDatepicker">
                                <span class="field-icon"><i class="fa fa-calendar"></i></span>  
                            </label>
                        </div><!-- end section -->
                        
                        <div class="section colm colm6">
                            <label class="field prepend-icon">
                              <input type="date" id="to" name="to" class="gui-input hasDatepicker">
                                <span class="field-icon"><i class="fa fa-calendar"></i></span>  
                            </label>
                        </div>

                        <?php
                        if($_SESSION['username'] <> 'jakli' || $_SESSION['username'] <> 'srachad'){
                          ?>
   
                        <div class="section colm colm6">
                            <label class="field select"><select class="form-control" name="user_status"  id="user_status">
    <option></option>
    <option value="jakli">Jihad Akli</option>
    <option value="srachad">Soumia Rachad</option>

</select><i class="arrow"></i></label>
                        </div>
                          <?php
                        }
                        ?>
                    </div>
                  </div>
<div class="section colm colm12">
<br>
  <button style="color:#fff;padding: 0px 20px;height: 35px;" class="button btn-dark" style="color:#fff;" id="filter"> <i class="fa fa-filter"></i> FILTRER</button>
</div>
<div class="spacer-b30"></div>
      

</div>
            <div id="loader"></div>

            
         
         
         <div class="spacer-b30"></div>
                 <div class="row" style="background: #ffffff;margin: auto;border: 2px solid #4285f4;border-radius: 8px;">
 <div class="form-header header-primary" style="padding: 7px 21px;">
                    <h4 style="font-size: 25px; text-align: center;"><i style="font-size: 25px;" class="fa fa-address-book"></i>LISTE DES CANDIDATS</h4>
              </div>
              <div class="spacer-b30"></div>
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
                    <th>DATE DEPOT</th>
                   <?php 
                if($_SESSION['username'] <> 'jakli' || $_SESSION['username'] <> 'srachad' || $_SESSION['username'] <> 'shachad'){ 

echo '<th>CANAL</th>';
       }else{

       } ?>
                    <th>STATUT</th>
                     <th>STATUT PAR</th>
                      <th>DATE STATUT</th>
                    <th style="width: 223px;">ACTION</th>
                </tr>
                </thead>
                <tbody>
<?php

$empQuery = "SELECT * FROM candidats ".$where;
$empRecords = mysqli_query($con, $empQuery);
while ($row = mysqli_fetch_array($empRecords)) {
$id_candidat = $row['id_candidat'];
$nom = $row['nom'];
$prenom = $row['prenom'];
$telephone = $row['telephone'];
$status = $row['status'];
$email = $row['email'];
$experience = $row['experience'];
$cv = '<a class="button btn-primary" target="_blank" href="https://recrutement.rightplacecall.com/candidature/'.$row['cv'].'">  VISUALISER </a>';
$canal_digital = $row['canal_digital'];
$date_inscription = $row['date_inscription'];
$status_par = $row['user_status'];
$date_status = $row['date_status'];

if($status == 'Nouveau' || $status == '1er Entretien'  || $status == '2eme Entretien' ){

$action1 = '<label class="field select"><select class="form-control" name="update_status"  id="'.$id_candidat.'" required>
    <option>--S??lectionnez un status--</option>

        <option value="Ne r??pond pas1">Ne r??pond pas 1</option>
    <option value="Ne r??pond pas2">Ne r??pond pas 2</option>
    <option value="Fran??ais KO">Fran??ais KO</option>
    <option value="Doublon">Doublon</option>
    <option value="Administratif KO">Administratif KO</option>
    <option value="Abs entretien physique">Abs ?? l???entretien physique.</option>

    <option value="1er Entretien">1er Entretien</option>
    <option value="2eme Entretien">2eme Entretien</option>
    <option value="Valid??">Valid??</option>
    <option value="Refus??">Refus??</option>
</select><i class="arrow"></i></label>';

}else{
$action1 = '<label class="field select"><select class="form-control" name="update_status" id="'.$id_candidat.'" required>
    <option value="'.$status.'">'.$status.'</option>
</select><i class="arrow"></i></label>';
}

if($status_par == ''){

    $status_par = 'Syst??m';
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
<th><?php echo $date_inscription; ?> </th>
<?php if($_SESSION['username'] <> 'jakli' || $_SESSION['username'] <> 'srachad' || $_SESSION['username'] <> 'shachad'){ 

  echo '<th>'.$canal_digital.'</th>';

  }else{
        
       } ?>
<th style="font-weight: bold;"><?php echo $status;?></th>
<th><?php echo $status_par; ?> </th>
<th><?php echo $date_status; ?> </th>
<th style="width: 223px;"><?php echo $action1; ?> </th>

</tr>

<?php
}
?>
                </tbody>

            </table>
                          <div class="spacer-b30"></div>
 
            </div>       
          </div>
                        <div class="spacer-b30"></div>

        </div>
    </div>


        <!-- Datatable JS -->
<script src="DataTables/datatables.min.js"></script>
 <script src="jquery.dataTables.min.js"></script>
  <script src="dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){

          function refreshPage() {
    location.reload(true);
}


$('#candidats').DataTable({
/*  "order": [[ 6, "desc" ]],
*/                "language": {
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


       });
        </script>
<script>
  $('select[name="update_status"]').on('change', function() {

  var CandidatID = $(this).attr("id");
  var UserSession = '<?php echo $_SESSION['username'];?>';
  var actions = $(this).val();

  $.ajax({
    url:'action_candidat.php',
    method:"POST",
    data:{CandidatID:CandidatID,UserSession:UserSession,action:actions},
    success:function(data){
      alert('Le candidat a ??t?? statu?? avec succ??s !');
   window.location.reload();

    }
  })

});
</script>
<script>
  //FILTRE


$('#filter').on('click', function() {

  var UserSessionFilter = '<?php echo $_SESSION['username'];?>';
  var from = $('#from').val();
  var to = $('#to').val();
  var user_status = $('#user_status').val();
  $.ajax({
    url:'filter.php',
    method:"POST",
    data:{from:from,UserSessionFilter:UserSessionFilter,to:to,user_status:user_status},
    success:function(data){
      $('#filter-row').html('<center><img src="preloader.gif"/></center>');
$('#filter-row').fadeOut('slow', function(){
                $('#filter-row').fadeIn('slow').html(data);
                          });
                }

  
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