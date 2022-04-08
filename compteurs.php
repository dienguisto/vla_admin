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
 where user_status = '".$_SESSION['username']."' and status='Validé' AND canal_digital='FACEBOOK'";
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valstatsRow = mysqli_fetch_array($valstatsRecords);
$valcount_status_today = $valstatsRow['count'];


$refstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$_SESSION['username']."' and status='Refusé' AND canal_digital='FACEBOOK'";
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


//NEW

$rep1statsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Ne repond pas1' and user_status = '".$_SESSION['username']."'";
$rep1statsRecords = mysqli_query($con, $rep1statsQuery);
$rep1statsRow = mysqli_fetch_array($rep1statsRecords);
$rep1count_status_today = $rep1statsRow['count'];

$rep2statsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Ne repond pas2' and user_status = '".$_SESSION['username']."'";
$rep2statsRecords = mysqli_query($con, $rep2statsQuery);
$rep2statsRow = mysqli_fetch_array($rep2statsRecords);
$rep2count_status_today = $rep2statsRow['count'];


$fkostatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Français KO' and user_status = '".$_SESSION['username']."'";
$fkostatsRecords = mysqli_query($con, $fkostatsQuery);
$fkostatsRow = mysqli_fetch_array($fkostatsRecords);
$fkocount_status_today = $fkostatsRow['count'];


$dblstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Doublon' and user_status = '".$_SESSION['username']."'";
$dblstatsRecords = mysqli_query($con, $dblstatsQuery);
$dblstatsRow = mysqli_fetch_array($dblstatsRecords);
$dblcount_status_today = $dblstatsRow['count'];


$adkostatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Administratif KO' and user_status = '".$_SESSION['username']."'";
$adkostatsRecords = mysqli_query($con, $adkostatsQuery);
$adkostatsRow = mysqli_fetch_array($adkostatsRecords);
$adkocount_status_today = $adkostatsRow['count'];


$aphystatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Abs entretien physique' and user_status = '".$_SESSION['username']."'";
$aphystatsRecords = mysqli_query($con, $aphystatsQuery);
$aphystatsRow = mysqli_fetch_array($aphystatsRecords);
$aphycount_status_today = $aphystatsRow['count'];

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
 where status='Validé'";
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valstatsRow = mysqli_fetch_array($valstatsRecords);
$valcount_status_today = $valstatsRow['count'];


$refstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Refusé'";
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

//NEW

$rep1statsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Ne repond pas1'";
$rep1statsRecords = mysqli_query($con, $rep1statsQuery);
$rep1statsRow = mysqli_fetch_array($rep1statsRecords);
$rep1count_status_today = $rep1statsRow['count'];

$rep2statsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Ne repond pas2'";
$rep2statsRecords = mysqli_query($con, $rep2statsQuery);
$rep2statsRow = mysqli_fetch_array($rep2statsRecords);
$rep2count_status_today = $rep2statsRow['count'];


$fkostatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Français KO'";
$fkostatsRecords = mysqli_query($con, $fkostatsQuery);
$fkostatsRow = mysqli_fetch_array($fkostatsRecords);
$fkocount_status_today = $fkostatsRow['count'];


$dblstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Doublon'";
$dblstatsRecords = mysqli_query($con, $dblstatsQuery);
$dblstatsRow = mysqli_fetch_array($dblstatsRecords);
$dblcount_status_today = $dblstatsRow['count'];


$adkostatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Administratif KO'";
$adkostatsRecords = mysqli_query($con, $adkostatsQuery);
$adkostatsRow = mysqli_fetch_array($adkostatsRecords);
$adkocount_status_today = $adkostatsRow['count'];


$aphystatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Abs entretien physique'";
$aphystatsRecords = mysqli_query($con, $aphystatsQuery);
$aphystatsRow = mysqli_fetch_array($aphystatsRecords);
$aphycount_status_today = $aphystatsRow['count'];
}

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

      