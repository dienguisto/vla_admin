<?php

session_start();
$_SESSION['username'];
$_SESSION['nom'];
$_SESSION['valid'];
if ($_SESSION['valid'] == true)
{

  if($_SESSION['username']  == 'srachad' || $_SESSION['username']  == 'jakli' ){
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include '../config.php';
mysqli_query($con,"SET NAMES 'utf8'");

/*if($_SESSION['username'] == 'shachad'){
  $where = "where canal_digital='FACEBOOK'  GROUP BY telephone ORDER BY `id_candidat` DESC  ";

}else{
  $where='  GROUP BY telephone ORDER BY `id_candidat` DESC ';
}*/

if($_SESSION['username']  == 'srachad'){
  $wherein = "'srachad2','salwatik','ioujik'";
}elseif($_SESSION['username']  == 'jakli'){
  $wherein = "'jakli2','smouhim','bboutlast'";
}elseif($_SESSION['username']  == 'sophia'){
  $wherein = "'yharcha'";
}else{
  $wherein = $_SESSION['username'];
}
$where=" WHERE user_status in (".$wherein.")  GROUP BY telephone ORDER BY `id_candidat` DESC";
  ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
  <title>RIGHTPLACECALL MOROCCO - RECRUTEMENT ADMINISTRATION</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" type="text/css"  href="../flat/css/smart-forms-version=4.2.css">
    <link rel="stylesheet" type="text/css"  href="../flat/css/font-awesome.min.css">

      <link href="../style/css/bootstrap.min.css" rel="stylesheet">
  <link href="../style/css/mdb.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script type="text/javascript" src="../style/js/jquery-3.4.1.min.js"></script>
   <link href='../dataTables.bootstrap4.min.css' rel='stylesheet' type='text/css'>
    <!--[if lte IE 9]>
        <script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>    
        <script type="text/javascript" src="js/jquery.placeholder.min.js"></script>
    <![endif]-->    
    
    <!--[if lte IE 8]>
        <link type="text/css" rel="stylesheet" href="css/smart-forms-ie8.css">
    <![endif]--> 

<link href="../style/rpc.css" rel="stylesheet">
</head>

<body class="woodbg">
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark primary-color">
  <a class="navbar-brand" href="#"><img src="../login/images/logo_mini_white.png" width="85"></a>
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
          <a class="dropdown-item" href="../deconnexion.php"><i class="fa fa-sign-out"></i> Déconnexion</a>
       
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
                <h4 style="text-align:center;text-decoration-line: underline;"><i class="fa fa-users"></i><b style="text-transform: uppercase;">Listes des candidatures reçues</b></h4>
            </div> -->
        <div class="row" style="background: #e6e6e6;margin: auto;border: 2px solid #4285f4;border-radius: 8px;text-align: center;">
 <div class="form-header header-primary" style="padding: 7px 21px;">
                    <h4 style="font-size: 25px; text-align: center;"><i style="font-size: 25px;" class="fa fa-filter"></i>FILTRE DES STATISTIQUES</h4>
              </div>
              <div class="spacer-b30"></div>
              <div>
<div class="frm-row">
                           <div class="section colm colm6">
                            <span style="float: left;">Date début : </span>
                            <label class="field prepend-icon">
              <input type="date" id="from" name="from" value="<?php echo date("Y-m-d");?>" class="gui-input hasDatepicker">
                                <span class="field-icon"><i class="fa fa-calendar"></i></span>  
                            </label>
                        </div>
                        
                        <div class="section colm colm6">
                          <span style="float: left;">Date fin : </span>
                            <label class="field prepend-icon">
                              <input type="date" id="to" name="to" class="gui-input hasDatepicker">
                                <span class="field-icon"><i class="fa fa-calendar"></i></span>  
                            </label>
                        </div>

                        <div class="section colm colm4">
                          <span style="float: left;">Équipe : </span>
                            <label class="field select"><select class="form-control" name="user_status"  id="user_status">
    <?php
if($_SESSION['username']  == 'srachad'  ){
echo '<option value="srachad">Soumia Rachad</option>';
}elseif($_SESSION['username']  == 'jakli'  ){
echo '<option value="jakli">Jihad Akli</option>';

}else{
  echo '<option value="">Aucune Équipe</option>';

}
    ?>
  

</select><i class="arrow"></i></label>
                        </div>
                        <div class="section colm colm4">
                          <span style="float: left;">Catégorie : </span>
                            <label class="field select"><select class="form-control" name="cat"  id="cat">
    <option value="">Catégorie...</option>
    <option value="3647d9cb5e68fafdb887b6c1ecdc6f3b">ASSURANCE</option>
    <option value="a86101b14746dd8fbfa3631814c2b1c0">TELECOM</option>

</select><i class="arrow"></i></label>
                        </div>
                        <div class="section colm colm4">
                          <span style="float: left;">Statut : </span>
                            <label class="field select">
                              <select class="form-control" name="stat"  id="stat">
      <option value="">Statut...</option>
    
        <option value="Ne repond pas1">Ne répond pas 1</option>
    <option value="Ne repond pas2">Ne répond pas 2</option>
    <option value="Français KO">Français KO</option>
    <option value="Doublon">Doublon</option>
    <option value="Administratif KO">Administratif KO</option>
    <option value="Abs entretien physique">Abs à l’entretien physique.</option>
    <option value="1er Entretien">1er Entretien</option>
    <option value="2eme Entretien">2eme Entretien</option>
    <option value="Validé">Validé</option>
    <option value="Refusé">Refusé</option>

</select><i class="arrow"></i></label>
                        </div>
                      
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
                   <div class="row" style="margin: auto;"  id="filter-row">

                     
<?php
      
include('compteurs.php');

        ?>
  
             <div class="spacer-b30"></div>

 <div class="form-header header-primary" style="padding: 7px 21px;">
                    <h4 style="font-size: 25px; text-align: center;"><i style="font-size: 25px;" class="fa fa-address-book"></i>LISTE DES CANDIDATS</h4>
              </div>
              <div class="spacer-b30"></div>
         <div class="table-responsive"> 
    <table id='candidats' class="table table-striped table-bordered" style="width:100%;text-align: center;">
                <thead>
                <tr>
          <th>CIN/CARTE SEJOUR</th>
                    <th>NOM</th>
                    <th>PRENOM</th>
                    <th>TELEPHONE</th>
                    <th>EMAIL</th>
                    <th>EXPERIENCE</th>
                    <th>CURRICULUM VITAE</th>
                    <th>CATEGORIE</th>
                    <th>DATE DEPOT</th>
                    <th>STATUT</th>
                     <th>EQUIPE</th>
                     <th>STAFF</th>
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
$cin = $row['cin'];

$nom = $row['nom'];
$prenom = $row['prenom'];
$telephone = $row['telephone'];
$status = $row['status'];
$email = $row['email'];
$experience = $row['experience'];
$cv = '<a class="button btn-primary" target="_blank" href="https://recrutement.rightplacecall.com/candidature/'.$row['cv'].'">  VISUALISER </a>';
$categorie = $row['categorie'];
$canal_digital = $row['canal_digital'];
$date_inscription = $row['date_inscription'];
$status_par = $row['user_status'];

if($status_par  == 'srachad2' || $status_par  == 'salwatik' || $status_par  == 'ioujik' ){
  $status_par = 'srachad';
}elseif($status_par  == 'jakli2' || $status_par  == 'smouhim' || $status_par  == 'bboutlast'){
  $status_par = 'jakli';
}else{
  $status_par = '-';
}

$staff = $row['staff_aff'];

$date_status = $row['date_status'];

if($categorie == '3647d9cb5e68fafdb887b6c1ecdc6f3b'){
$categorie = "ASSURANCE";
}
if($categorie == 'a86101b14746dd8fbfa3631814c2b1c0'){
$categorie = "TELECOM";
}

if($status == 'Nouveau' || $status == '1er Entretien'  || $status == '2eme Entretien' || $status == 'Abs entretien physique'  || $status == 'Ne repond pas1' || $status == 'Ne repond pas2'){

$action1 = '<label class="field select" style="width:225px;"><select class="form-control" name="update_status"  id="'.$id_candidat.'" required>
    <option>--Sélectionnez un status--</option>
    
        <option value="Ne repond pas1">Ne répond pas 1</option>
    <option value="Ne repond pas2">Ne répond pas 2</option>
    <option value="Français KO">Français KO</option>
    <option value="Doublon">Doublon</option>
    <option value="Administratif KO">Administratif KO</option>
    <option value="Abs entretien physique">Abs à l’entretien physique.</option>
    <option value="1er Entretien">1er Entretien</option>
    <option value="2eme Entretien">2eme Entretien</option>
    <option value="Validé">Validé</option>
    <option value="Refusé">Refusé</option>
</select><i class="arrow"></i></label>';

}else{
$action1 = '<label class="field select"><select class="form-control" name="update_status" id="'.$id_candidat.'" required>
    <option value="'.$status.'">'.$status.'</option>
</select><i class="arrow"></i></label>';
}

if($status_par == ''){

    $status_par = 'Systèm';
}
if($date_status == ''){

    $date_status = '--';
}


?>
<tr>
  <th><?php echo $cin; ?> </th>
<th><?php echo $nom; ?> </th>
<th><?php echo $prenom; ?> </th>
<th><?php echo $telephone; ?> </th>
<th><?php echo $email; ?> </th>
<th><?php echo $experience; ?> </th>
<th><?php echo $cv; ?> </th>
<th><?php echo $categorie; ?> </th>
<th><?php echo $date_inscription; ?> </th>
<th><?php echo $status;?></th>
<th><?php echo $status_par; ?> </th>
<th><?php echo $staff; ?> </th>
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
              </div>
                        <div class="spacer-b30"></div>

        </div>
    </div>


        <!-- Datatable JS -->
<script src="../DataTables/datatables.min.js"></script>
 <script src="../jquery.dataTables.min.js"></script>
  <script src="../dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){

          function refreshPage() {
    location.reload(true);
}


$('#candidats').DataTable({
  "order": [[ 6, "desc" ]],
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


       });
        </script>
<script>
  $('select[name="update_status"]').on('change', function() {

  var CandidatID = $(this).attr("id");
  var UserSession = '<?php echo $_SESSION['username'];?>';
  var actions = $(this).val();

  $.ajax({
    url:'../action_candidat.php',
    method:"POST",
    data:{CandidatID:CandidatID,UserSession:UserSession,action:actions},
    success:function(data){
      alert('Le candidat a été statué avec succés !');
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
  var cat = $('#cat').val();
  var stat = $('#stat').val();
  var user_status = $('#user_status').val();
  $.ajax({
    url:'filter.php',
    method:"POST",
    data:{from:from,UserSessionFilter:UserSessionFilter,to:to,user_status:user_status,cat:cat,stat:stat},
    success:function(data){
      $('#filter-row').html('<center><img src="../preloader.gif"/></center>');
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
       header('Location: ../403/index.html');

}
}else{
      header('Location: ../login/index.php');

}
?>