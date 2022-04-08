<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include '../config.php';
mysqli_query($con,"SET NAMES 'utf8'");
$user_status = $_POST['user_status'];
$from = $_POST['from'];
$to = $_POST['to'];
$cat = $_POST['cat'];
$stat = $_POST['stat'];
//$to = str_replace('-', '/', $to);
//$to = date('Y-m-d',strtotime($to . "+1 days"));
$user = $_POST['UserSessionFilter'];
$date_candidature = date("Y-m-d H:i:s");

if($from == ''){
$query_where= '';
}
if($to == ''){
$query_where= '';
}
if($cat == ''){
$query_where= '';
}
if($stat == ''){
$query_where= '';
}

if($user_status == ''){
$query_where= '';
}

if($from <> ''){
$query_where= "and date_inscription like '$from%' ";
}
if($to <> ''){
$query_where= "and date_inscription between '".$from."' and '".$to."' ";
}
if($user_status <> ''){
$query_where.= "and user_status='".$user_status."'  ";
}
if($cat <> ''){
$query_where.= "and categorie like '$cat%' ";
}
if($stat <> ''){
$query_where.= "and status like '$stat%' ";
}


/*if($to <> '' && $from <> ''){
$query_where= "and date_inscription between '".$from."' and '".$to."' ";
}
if($to <> '' && $user_status <> ''){
$query_where= "and date_inscription like '".$to."%' and user_status='".$user_status."'  ";
}
if($from <> '' && $user_status <> ''){
$query_where= "and date_inscription like '".$from."%' and user_status='".$user_status."'  ";
}
if($from <> '' && $user_status <> '' && $to <> ''){
$query_where= "and date_inscription between '".$from."' and '".$to."'  and user_status='".$user_status."'  ";
}
*/


//FILTER 2

if($from <> ''){
$query_where2= "and date_inscription like '$from%' ";
}
if($to <> ''){
$query_where2= "and date_inscription between '".$from."' and '".$to."' ";
}
if($user_status <> ''){
$query_where2.= "and user_status='".$user_status."'  ";
}
if($cat <> ''){
$query_where2.= "and categorie like '$cat%' ";
}
if($stat <> ''){
$query_where2.= "and status like '$stat%' ";
}
$groupby = 'GROUP BY `telephone` ';
$newstatsQuery = "SELECT * from `candidats` 
 where status='Nouveau'  AND user_status = '$user_status' ".$query_where." ".$groupby;
$newstatsRecords = mysqli_query($con, $newstatsQuery);
$newcount_status_today = mysqli_num_rows($newstatsRecords);


$statsQuery = "SELECT * from `candidats` where user_status = '$user_status'  ".$query_where2." ".$groupby;
$statsRecords = mysqli_query($con, $statsQuery);
$count_status_today = mysqli_num_rows($statsRecords);


$valstatsQuery = "SELECT * from `candidats` 
 where status='Validé'  AND user_status = '$user_status' ".$query_where." ".$groupby;
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valcount_status_today = mysqli_num_rows($valstatsRecords);


$refstatsQuery = "SELECT * from `candidats` 
 where status='Refusé'  AND user_status = '$user_status' ".$query_where." ".$groupby;
$refstatsRecords = mysqli_query($con, $refstatsQuery);
$refcount_status_today = mysqli_num_rows($refstatsRecords);


$entstatsQuery1 = "SELECT * from `candidats` 
 where status='1er Entretien'  AND user_status = '$user_status' ".$query_where." ".$groupby;
$entstatsRecords1 = mysqli_query($con, $entstatsQuery1);
$entcount_status_today1 = mysqli_num_rows($entstatsRecords1);


$entstatsQuery2 = "SELECT * from `candidats` 
 where status='2eme Entretien'  AND user_status = '$user_status'  ".$query_where." ".$groupby;
$entstatsRecords2 = mysqli_query($con, $entstatsQuery2);
$entcount_status_today2 = mysqli_num_rows($entstatsRecords2);

//NEW

$rep1statsQuery = "SELECT * from `candidats` 
 where status='Ne repond pas1' AND user_status = '$user_status'  ".$query_where." ".$groupby;
$rep1statsRecords = mysqli_query($con, $rep1statsQuery);
$rep1count_status_today = mysqli_num_rows($rep1statsRecords);

$rep2statsQuery = "SELECT * from `candidats` 
 where status='Ne repond pas2' AND user_status = '$user_status'  ".$query_where." ".$groupby;
$rep2statsRecords = mysqli_query($con, $rep2statsQuery);
$rep2count_status_today = mysqli_num_rows($rep2statsRecords);


$fkostatsQuery = "SELECT * from `candidats` 
 where status='Français KO' AND user_status = '$user_status'  ".$query_where." ".$groupby;
$fkostatsRecords = mysqli_query($con, $fkostatsQuery);
$fkocount_status_today = mysqli_num_rows($fkostatsRecords);


$dblstatsQuery = "SELECT * from `candidats` 
 where status='Doublon' AND user_status = '$user_status'  ".$query_where." ".$groupby;
$dblstatsRecords = mysqli_query($con, $dblstatsQuery);
$dblcount_status_today = mysqli_num_rows($dblstatsRecords);


$adkostatsQuery = "SELECT * from `candidats` 
 where status='Administratif KO' AND user_status = '$user_status'  ".$query_where." ".$groupby;
$adkostatsRecords = mysqli_query($con, $adkostatsQuery);
$adkocount_status_today = mysqli_num_rows($adkostatsRecords);


$aphystatsQuery = "SELECT * from `candidats` 
 where status='Abs entretien physique' AND user_status = '$user_status'  ".$query_where." ".$groupby;
$aphystatsRecords = mysqli_query($con, $aphystatsQuery);
$aphycount_status_today = mysqli_num_rows($aphystatsRecords);




        ?>
          <div class="spacer-b30"></div>

<div class="form-header header-primary" style="padding: 7px 21px;">
                    <h4 style="font-size: 25px; text-align: center;"><i style="font-size: 25px;" class="fa fa-pie-chart"></i> STATISTIQUES</h4>
              </div>
            <div class="row" style="background: #ffffff;margin: auto;border: 2px solid #4285f4;">
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
            <span>2ème Entretien</span>
          </div> 
        </div>
      </div>
        <div class="col-md-2">
        <div class="stati bg-nephritis ">
          <i class="fa fa-check-square"></i>
          <div>
            <b><?php echo  $valcount_status_today;?></b>
            <span>Candidats Validés</span>
          </div> 
        </div>
      </div>
      <div class="col-md-2">
        <div class="stati bg-pumpkin ">
          <i class="fa fa-times-rectangle"></i>
          <div>
            <b><?php echo  $refcount_status_today;?></b>
            <span>Candidats Refusés</span>
          </div> 
        </div>
      </div>
      <div class="col-md-2">
        <div class="stati bg-pomegranate ">
          <i class="fa fa-clock-o"></i>
          <div>
            <b><?php echo  $newcount_status_today;?> </b>
            <span>Non Statués</span>
          </div> 
        </div>
      </div>
      <!-- NEW -->

         <div class="col-md-2">
        <div class="stati bg-emerald ">
          <i class="fa fa-volume-down"></i>
          <div>
            <b><?php echo  $rep1count_status_today;?> </b>
            <span>Ne Répond pas 1</span>
          </div> 
        </div>
      </div>
         <div class="col-md-2">
        <div class="stati bg-peter_river ">
          <i class="fa fa-volume-off"></i>
          <div>
            <b><?php echo  $rep2count_status_today;?> </b>
            <span>Ne Répond pas 2</span>
          </div> 
        </div>
      </div>
         <div class="col-md-2">
        <div class="stati bg-concrete ">
          <i class="fa fa-thumbs-o-down"></i>
          <div>
            <b><?php echo  $fkocount_status_today;?> </b>
            <span>Français KO</span>
          </div> 
        </div>
      </div>
         <div class="col-md-2">
        <div class="stati bg-alizarin ">
          <i class="fa fa-hand-scissors-o"></i>
          <div>
            <b><?php echo  $dblcount_status_today;?> </b>
            <span>Doublon</span>
          </div> 
        </div>
      </div>
         <div class="col-md-2">
        <div class="stati bg-amethyst ">
          <i class="fa fa-university"></i>
          <div>
            <b><?php echo  $adkocount_status_today;?> </b>
            <span>Administratif KO</span>
          </div> 
        </div>
      </div>
         <div class="col-md-2">
        <div class="stati bg-wet_asphalt ">
          <i class="fa fa-user-times"></i>
          <div>
            <b><?php echo  $aphycount_status_today;?> </b>
            <span>Abs Entretien </span>
          </div> 
        </div>
      </div>

      </div>

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

$empQuery = "SELECT * FROM candidats where user_status = '$user_status'  ".$query_where2." ".$groupby;

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


        <!-- Datatable JS -->
<script src="../DataTables/datatables.min.js"></script>
 <script src="../jquery.dataTables.min.js"></script>
  <script src="../dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){

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