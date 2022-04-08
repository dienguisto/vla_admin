<?php

$servername = "46.105.105.22";
$username = "root";
$password = "iszkVcxLz6tE";
$dbname = "recrutement_rpc";
//include("firewall/project-security.php");

// Connections
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {
    die("Erreur de Connexion à la Base de données!! : " . $con->connect_error);
}

echo md5('61tXCwM2pv');

      $req1=mysqli_query($con,"SELECT  ordre FROM historique_status ORDER BY id_histo DESC LIMIT 1");

    if (!$req1) {
                $erreur .= '--'.mysqli_error($con);
            }
            $res1= mysqli_fetch_array($req1);

            $ordre = $res1['ordre'];
            echo $ordre;



if ($ordre==8)



    $empQuery = "SELECT * from historique_status WHERE status='Nouveau' ORDER BY id_candidat DESC limit 0,10";
$empRecords = mysqli_query($con, $empQuery);
while($row = mysqli_fetch_array($empRecords)){
$user_st = $row['status_par'];
$staff_aff = $row['staff_aff'];



echo $row['status_par'];
echo '///////////';



$rows[] = $row['staff_aff'];
echo $row['staff_aff'];
echo '*****';
//Equipe
if($user_st == 'jakli'){
$user_stx = 'srachad';
$array1 = array('srachad2','salwatik','ioujik','aalami');
$array2 = $rows;
$result = array_diff($array1, $array2);

foreach ($result as $key => $val) {
   $staff = $val;
}

}
if($user_st == 'srachad'){
$user_stx = 'jakli';
$array1 = array('jakli2','bboutlast','smouhim','yhayate');
$array2 = $rows;
$result = array_diff($array1, $array2);
//print_r($rows);

foreach ($result as $key => $val) {
   $staff = $val;
}

}

}
