<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'config.php';
mysqli_query($con,"SET NAMES 'utf8'");
$user_status = $_POST['user_status'];
$from = $_POST['from'];
$to = $_POST['to'];
$to = str_replace('-', '/', $to);
$to = date('Y-m-d',strtotime($to . "+1 days"));
$user = $_POST['UserSessionFilter'];
$date_candidature = date("Y-m-d H:i:s");
if($user == 'jakli' || $user =='srachad'){

if($from == ''){
$query_where = '';
}
if($to == ''){
$query_where = '';
}
if($to == ''){
$query_where = '';
}


if($from <> ''){
$query_where = "and date_inscription like '$from%' ";
}
if($to <> ''){
$query_where = "and date_inscription like '$to%' ";
}
if($to <> '' && $from <> ''){
$query_where = "and date_inscription between '".$from."' and '".$to."' ";
}
if($from <> ''){
$query_where2 = " date_inscription like '$from%' ";
}
if($to <> ''){
$query_where2 = " date_inscription like '$to%' ";
}
if($to <> '' && $from <> ''){
$query_where2 = " date_inscription between '".$from."' and '".$to."' ";
}
$newstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$user."' and status='Nouveau' ".$query_where;
$newstatsRecords = mysqli_query($con, $newstatsQuery);
$newstatsRow = mysqli_fetch_array($newstatsRecords);
$newcount_status_today = $newstatsRow['count'];

$statsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$user."' ".$query_where;
$statsRecords = mysqli_query($con, $statsQuery);
$statsRow = mysqli_fetch_array($statsRecords);
$count_status_today = $statsRow['count'];

$valstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$user."' and status='Validé' ".$query_where;
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valstatsRow = mysqli_fetch_array($valstatsRecords);
$valcount_status_today = $valstatsRow['count'];


$refstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$user."' and status='Refusé' ".$query_where;
$refstatsRecords = mysqli_query($con, $refstatsQuery);
$refstatsRow = mysqli_fetch_array($refstatsRecords);
$refcount_status_today = $refstatsRow['count'];


$entstatsQuery1 = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$user."' and status='1er Entretien' ".$query_where;
$entstatsRecords1 = mysqli_query($con, $entstatsQuery1);
$entstatsRow1 = mysqli_fetch_array($entstatsRecords1);
$entcount_status_today1 = $entstatsRow1['count'];


$entstatsQuery2 = "SELECT count(`status`) as 'count' from `candidats` 
 where user_status = '".$user."' and status='2eme Entretien' ".$query_where;
$entstatsRecords2 = mysqli_query($con, $entstatsQuery2);
$entstatsRow2 = mysqli_fetch_array($entstatsRecords2);
$entcount_status_today2 = $entstatsRow2['count'];



}else{

if($from == ''){
$query_where = '';
}
if($to == ''){
$query_where = '';
}

if($user_status == ''){
$query_where = '';
}

if($from <> ''){
$query_where = "and date_inscription like '$from%' ";
}
if($to <> ''){
$query_where = "and date_inscription like '$to%' ";
}
if($user_status <> ''){
$query_where = "and user_status='".$user_status."'  ";
}
if($to <> '' && $from <> ''){
$query_where = "and date_inscription between '".$from."' and '".$to."' ";
}
if($to <> '' && $user_status <> ''){
$query_where = "and date_inscription like '".$to."%' and user_status='".$user_status."'  ";
}
if($from <> '' && $user_status <> ''){
$query_where = "and date_inscription like '".$from."%' and user_status='".$user_status."'  ";
}
if($from <> '' && $user_status <> '' && $to <> ''){
$query_where = "and date_inscription between '".$from."' and '".$to."'  and user_status='".$user_status."'  ";
}

//FILTER 2

if($from <> ''){
$query_where2 = " date_inscription like '$from%' ";
}
if($to <> ''){
$query_where2 = " date_inscription like '$to%' ";
}
if($user_status <> ''){
$query_where2 = " user_status='".$user_status."'  ";
}
if($to <> '' && $from <> ''){
$query_where2 = " date_inscription between '".$from."' and '".$to."' ";
}
if($to <> '' && $user_status <> ''){
$query_where2 = " date_inscription like '".$to."%' and user_status='".$user_status."'  ";
}
if($from <> '' && $user_status <> ''){
$query_where2 = " date_inscription like '".$from."%' and user_status='".$user_status."'  ";
}
if($from <> '' && $user_status <> '' && $to <> ''){
$query_where2 = "date_inscription between '".$from."' and '".$to."'  and user_status='".$user_status."'  ";
}





$newstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Nouveau' ".$query_where;
$newstatsRecords = mysqli_query($con, $newstatsQuery);
$newstatsRow = mysqli_fetch_array($newstatsRecords);
$newcount_status_today = $newstatsRow['count'];

$statsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where ".$query_where2;
$statsRecords = mysqli_query($con, $statsQuery);
$statsRow = mysqli_fetch_array($statsRecords);
$count_status_today = $statsRow['count'];

$valstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Validé' ".$query_where;
$valstatsRecords = mysqli_query($con, $valstatsQuery);
$valstatsRow = mysqli_fetch_array($valstatsRecords);
$valcount_status_today = $valstatsRow['count'];


$refstatsQuery = "SELECT count(`status`) as 'count' from `candidats` 
 where status='Refusé' ".$query_where;
$refstatsRecords = mysqli_query($con, $refstatsQuery);
$refstatsRow = mysqli_fetch_array($refstatsRecords);
$refcount_status_today = $refstatsRow['count'];


$entstatsQuery1 = "SELECT count(`status`) as 'count' from `candidats` 
 where status='1er Entretien' ".$query_where;
$entstatsRecords1 = mysqli_query($con, $entstatsQuery1);
$entstatsRow1 = mysqli_fetch_array($entstatsRecords1);
$entcount_status_today1 = $entstatsRow1['count'];


$entstatsQuery2 = "SELECT count(`status`) as 'count' from `candidats` 
 where status='2eme Entretien' ".$query_where;
$entstatsRecords2 = mysqli_query($con, $entstatsQuery2);
$entstatsRow2 = mysqli_fetch_array($entstatsRecords2);
$entcount_status_today2 = $entstatsRow2['count'];
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
            <b><?php echo  $newcount_status_today;?></b>
            <span>Non Statués</span>
          </div> 
        </div>
      </div>