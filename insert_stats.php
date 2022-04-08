<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$date=date("Y-m-d");
$date_stat = date("Y-m-d H:i:s");

//CLEAN TABLE JOUR 
$cleanQuery = "DELETE from stats_gui_notify WHERE date_stat like '$date%' ";
mysqli_query($con, $cleanQuery);

## Fetch records
$empQuery = "select distinct(lead_id),date_local,vicidial_notif from notify WHERE date_local like '$date%' ";
$empRecords = mysqli_query($con, $empQuery);
$data = array();

while ($row = mysqli_fetch_array($empRecords)) {
$lead_id = $row['lead_id'];
$date_notif = $row['date_local'];
$notifier = $row['vicidial_notif'];
$viciQuery = "SELECT vicidial_list.lead_id,vicidial_list.first_name,vicidial_list.last_name,vicidial_list.phone_number,vicidial_agent_log.event_time,vicidial_agent_log.user,vicidial_agent_log.status,vicidial_agent_log.talk_sec,vicidial_agent_log.wait_sec FROM vicidial_agent_log 
INNER JOIN vicidial_list ON 
vicidial_agent_log.lead_id =vicidial_list.lead_id WHERE vicidial_agent_log.lead_id = '".$lead_id."'
ORDER BY vicidial_agent_log.event_time DESC LIMIT 1 ";
$viciRecords = mysqli_query($con1, $viciQuery);
$row_vici = mysqli_fetch_array($viciRecords);

$lead_id = $row_vici['lead_id'];
$event_time = $row_vici['event_time'];
$first_name = $row_vici['first_name'];
$last_name = $row_vici['last_name'];
$status = $row_vici['status'];
$talk_sec = $row_vici['talk_sec'];
$wait_sec = $row_vici['wait_sec'];
$user = $row_vici['user'];
$phone =  $row_vici['phone_number'];
$dure_appel = $talk_sec + $wait_sec;
$lead_name = $first_name.' '.$last_name;
    
    $status_vici = "select * from status where code_status = '$status' ";
    $vicistatus = mysqli_query($con, $status_vici);
$row_status = mysqli_fetch_array($vicistatus);
    $detail_status = $row_status['detail_status'];

$insert = "INSERT INTO stats_gui_notify(date_stat,lead_id,nom_lead,agent,phone,status,duree,date_notif,date_appel,notifier) VALUES ('$date_stat','$lead_id','$lead_name','$user','$phone','$detail_status','$dure_appel','$date_notif','$event_time','$notifier'); ";    
        mysqli_query($con, $insert);


}
