<?php

    require_once '../class/Worker.php';
    require_once '../class/Robot.php';
    require_once '../class/system_config.php';

   $GLOBALS['sistem_config'] = new follows\cls\system_config();
   $Robot = new follows\cls\Robot();
   $cookies = json_decode(urldecode($_POST['cookies']));    
   $profile_name = urldecode($_POST['profile_name']);
   $dumbu_id_profile = urldecode($_POST['dumbu_id_profile']);
   $user_id =  urldecode($_POST['user_id']);
   if($dumbu_id_profile=="")
      $dumbu_id_profile = NULL;
        
    $result = $Robot->get_insta_geolocalization_data_from_client($cookies, $profile_name, $dumbu_id_profile, $user_id);
    echo json_encode($result);
    
 ?>
