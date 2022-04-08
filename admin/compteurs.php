<?php 
 if($_SESSION['username']  == 'mbejbouji' || $_SESSION['username']  == 'shachad' || $_SESSION['username']  == 'ffaty' || $_SESSION['username']  == 'amessaoudi' || $_SESSION['username']  == 'fouad' || $_SESSION['username']  == 'mnacir'){

  $newstatsQuery = "SELECT * from `candidats` 
 where status='Nouveau'  GROUP BY telephone";
$newstatsRecords = mysqli_query($con, $newstatsQuery);
$newcount_status_today = mysqli_num_rows($newstatsRecords);


$statsQuery = "SELECT * from `candidats` GROUP BY telephone ";
$statsRecords = mysqli_query($con, $statsQuery);
$count_status_today = mysqli_num_rows($statsRecords);
//$count_status_today = $statsRow['count'];


$valstatsQuery = "SELECT * from `candidats` 
 where status='Validé' GROUP BY telephone";
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valcount_status_today = mysqli_num_rows($valstatsRecords);


$refstatsQuery = "SELECT * from `candidats` 
 where status='Refusé' GROUP BY telephone";
$refstatsRecords = mysqli_query($con, $refstatsQuery);
$refcount_status_today = mysqli_num_rows($refstatsRecords);


$entstatsQuery1 = "SELECT * from `candidats` 
 where status='1er Entretien' GROUP BY telephone";
$entstatsRecords1 = mysqli_query($con, $entstatsQuery1);
$entcount_status_today1 = mysqli_num_rows($entstatsRecords1);


$entstatsQuery2 = "SELECT * from `candidats` 
 where status='2eme Entretien'  GROUP BY telephone";
$entstatsRecords2 = mysqli_query($con, $entstatsQuery2);
$entcount_status_today2 = mysqli_num_rows($entstatsRecords2);

//NEW

$rep1statsQuery = "SELECT * from `candidats` 
 where status='Ne repond pas1' GROUP BY telephone";
$rep1statsRecords = mysqli_query($con, $rep1statsQuery);
$rep1count_status_today = mysqli_num_rows($rep1statsRecords);

$rep2statsQuery = "SELECT * from `candidats` 
 where status='Ne repond pas2' GROUP BY telephone";
$rep2statsRecords = mysqli_query($con, $rep2statsQuery);
$rep2count_status_today = mysqli_num_rows($rep2statsRecords);


$fkostatsQuery = "SELECT * from `candidats` 
 where status='Français KO' GROUP BY telephone";
$fkostatsRecords = mysqli_query($con, $fkostatsQuery);
$fkocount_status_today = mysqli_num_rows($fkostatsRecords);


$dblstatsQuery = "SELECT * from `candidats` 
 where status='Doublon' GROUP BY telephone ";
$dblstatsRecords = mysqli_query($con, $dblstatsQuery);
$dblcount_status_today = mysqli_num_rows($dblstatsRecords);


$adkostatsQuery = "SELECT * from `candidats` 
 where status='Administratif KO' GROUP BY telephone";
$adkostatsRecords = mysqli_query($con, $adkostatsQuery);;
$adkocount_status_today = mysqli_num_rows($adkostatsRecords);


$aphystatsQuery = "SELECT * from `candidats` 
 where status='Abs entretien physique' GROUP BY telephone";
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

      <?php
      }else{
       header('Location: ../403/index.html');
      }

      ?>
