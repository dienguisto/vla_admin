<?php

include 'config.php';
      function get_client_ip_server() {
    $ipaddress = '';
    if($_SERVER['REMOTE_ADDR'])
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
 
    return $ipaddress;
}


$action = $_POST['action'];
$CandidatID = $_POST['CandidatID'];
$user = $_POST['UserSession'];
$ip = get_client_ip_server();
$date_candidature = date("Y-m-d H:i:s");

if($action == 'Accept'){

mysqli_query($con, "UPDATE candidats SET status = 'Acceptée',user_status='$user',adresse_ip_status='$ip' WHERE id_candidat = '$CandidatID' and status = 'Nouveau'  ");


     $candidatures = mysqli_query($con,"SELECT * FROM candidats WHERE id_candidat = '$CandidatID'");
          
            $candidatures_array = mysqli_fetch_array($candidatures);

            $nom=$candidatures_array['nom'];
            $prenom=$candidatures_array['prenom'];
            $telephone=$candidatures_array['telephone'];

//ADD CANDIDATE SUGARCRM

function salt($leng = 22) {
    return substr(sha1(mt_rand()), 0, $leng);  
}

function serial(){
    $hash = md5($email . salt());

    for ($i = 0; $i < 1000; $i++) {
        $hash = md5($hash);
    }

    return implode('-', str_split(substr($hash, 0, 25), 5));
}

$id_cand = serial();

$con2 = mysqli_connect("10.10.11.43","root","pipo94","sugarcrm");
if (mysqli_connect_errno($con2))
  {
  echo "Erreur de Connexion à la Base de données " . mysqli_connect_error($con2);
  }
mysqli_query($con2, "INSERT INTO `gaur_candidates` (
  `id`,
  `date_entered`,
  `date_modified`,
  `modified_user_id`,
  `created_by`,
  `first_name`,
  `last_name`,
  `phone_mobile`) VALUES
  (
    '$id_cand',
    '$date_candidature',
    '$date_candidature',
    '1',
    '1',
    '$nom',
    '$prenom',
    '$telephone'

  )");



}elseif($action == 'Reject'){

mysqli_query($con, "UPDATE candidats SET status = 'Rejetée',user_status='$user',adresse_ip_status='$ip' WHERE id_candidat = '$CandidatID' and status = 'Nouveau'  ");


}else{
	echo 'ERROR';
}








?>
