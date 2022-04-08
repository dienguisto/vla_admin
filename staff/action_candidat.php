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

if($action <> ''){
    
mysqli_query($con, "UPDATE candidats SET status = '$action', staff_aff = '$user', date_status = '$date_candidature', adresse_ip_status = '$ip' where id_candidat='$CandidatID' ");

mysqli_query($con, "INSERT INTO historique_status (`id_candidat`, `status`, `status_par`, `date_status`, `adresse_ip`) VALUES ('$CandidatID','$action','$user','$date_candidature','$ip') ");


     $candidatures = mysqli_query($con,"SELECT * 
      FROM candidats WHERE id_candidat = '$CandidatID'");
          
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

if($user == 'jakli' || $user == 'jakli2'){
$id_staff = "9d1a69d5-5cc3-cbca-7e7f-55c242042914";
}
elseif($user == 'srachad' || $user == 'srachad2'){
  $id_staff = "9650262c-8a15-bc29-bee7-51acc194b174";

}elseif($user== 'shachad'){
  $id_staff="f159a315-7ce0-3bb1-48c0-4ed3bb5619ae";
}
elseif($user== 'bboutlast'){
  $id_staff="52a87720-1f7a-09b3-fc61-5cc069680b16";
}elseif($user== 'ioujik'){
  $id_staff="75979520-fc8b-8061-7402-5f579915886f";
}elseif($user== 'salwatik'){
  $id_staff="89b85e2d-62d6-358e-9a5d-5e13022c59d1";
}elseif($user== 'smouhim'){
  $id_staff="ec80a337-4e36-9e2a-80da-60d0788463e3";
}
if($action <> 'Nouveau' || $action <> '1er Entretien'  || $action <> '2eme Entretien' || $action <> 'Abs entretien physique'  || $action <> 'Ne repond pas1' || $action <> 'Ne repond pas2'){



}

}else{
  echo 'ERROR';
}








?>
