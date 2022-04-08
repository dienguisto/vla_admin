<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include 'config.php';
//include 'insert_stats.php';
## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = $_POST['search']['value']; // Search value

## Search date_stat,lead_id,nom_lead,agent,phone,status,duree,date_notif,notifier
$searchQuery = " ";
if($searchValue != ''){
	$searchQuery = " and (id_candidat like '%".$searchValue."%' or 
        nom like '%".$searchValue."%' or 
        prenom like'%".$searchValue."%' or 
        telephone like'%".$searchValue."%' or 
        email like'%".$searchValue."%' or 
        status like'%".$searchValue."%' or 
        experience like'%".$searchValue."%' or 
        cv like'%".$searchValue."%' or
        canal_digital like'%".$searchValue."%'  or

        status_par like'%".$searchValue."%'   or
        
        date_status like'%".$searchValue."%'  or
        
        date_inscription like'%".$searchValue."%'   or
        
        action like'%".$searchValue."%' ) ";
}

## Total number of records without filtering
$sel = mysqli_query($con,"select count(*) as allcount from candidats");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

## Total number of records with filtering
$sel = mysqli_query($con,"select count(*) as allcount from candidats WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];

## Fetch records`id_candidat`, `nom`, `prenom`, `telephone`, `email`, `experience`, `cv`, `date_inscription`, `adresse_ip`, `canal_digital`
$empQuery = "select * from candidats WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($con, $empQuery);
$data = array();
//date_stat,lead_id,nom_lead,agent,phone,status,duree,date_notif,notifier
while ($row = mysqli_fetch_assoc($empRecords)) {
$id_candidat = $row['id_candidat'];
$nom = $row['nom'];
$prenom = $row['prenom'];
$telephone = $row['telephone'];
$status = $row['status'];
$email = $row['email'];
$experience = $row['experience'];
$cv = '<a class="button btn-primary" target="_blank" href="https://recrutement.rightplacecall.com/candidature/'.$row['cv'].'"> <i class="fa fa-eye"></i> VISUALISER </a>';
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


    $data[] = array(
    		"id_candidat"=>$id_candidat,
    		"nom"=>$nom,
    		"prenom"=>$prenom,
    		"telephone"=>$telephone,
            "email"=>$email,
            "experience"=>$experience,
            "cv"=>$cv,
    		"canal_digital"=>$canal_digital,
            "date_inscription"=>$date_inscription,
            "status"=>'<button class="button btn-warning"><b>'.$status.'</b></button>',
            "status_par"=>$status_par,
            "date_status"=>$date_status,
            "action"=>$action1

    	);
}

## Response
$response = array(
    "draw" => intval($draw),
    "iTotalRecords" => $totalRecords,
    "iTotalDisplayRecords" => $totalRecordwithFilter,
    "aaData" => $data
);

echo json_encode($response);
