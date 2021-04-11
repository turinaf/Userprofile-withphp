<?php
    include '../../connection/db.php';
   
    function bio()
    { 
        GLOBAL $db;
      if(isset($_GET['bio']) && $_GET['bio'] == 'true'){
          $bio = $_POST['bio'];
          $uid = $_SESSION['user_id'];
          $query = $db->prepare("SELECT * FROM users WHERE id=?;");
          $query->execute([$uid]);
          $row = $query->fetch(PDO::FETCH_OBJ);
          $bio_db = $row->bio;
          if(empty($bio_db)){
              $insert = $db->prepare("UPDATE users SET bio=? WHERE id=?");
              $insert->execute([$bio, $uid]);
              if($insert){
                  $_SESSION['add_bio'] = "<i class='fas fa-check-circle'></i> Your Bio added successfully!";
                  echo json_encode(array('error'=>'success'));
              }else{
                echo json_encode(array('error'=>'success'));
              }
          }else {
            $insert = $db->prepare("UPDATE users SET bio=? WHERE id=?");
            $insert->execute([$bio, $uid]);
            if($insert){
                $_SESSION['add_bio'] = "<i class='fas fa-check-circle'></i>Your Bio updated successfully!";
                echo json_encode(array('error'=>'success'));
            }else{
              echo json_encode(array('error'=>'success'));
            }
          }
      }
    }
    bio();
    function add_facebook(){
      GLOBAL $db;
      if(isset($_GET['facebook']) && $_GET['facebook']=='true'){
          $facebookLink = $_POST['facebook'];
          $uid = $_SESSION['user_id'];
          $query = $db->prepare("SELECT * FROM users WHERE id=?");
          $query->execute([$uid]);
          $row = $query->fetch(PDO::FETCH_OBJ);
          if(empty($row->facebook)){
              $insert = $db->prepare("UPDATE users SET facebook=? WHERE id=?;");
              $insert->execute([$facebookLink, $uid]);
              if($insert){
                  $_SESSION['add_facebook'] = "<i class='fas fa-check-circle'></i>Facebook successfully added";
                  echo json_encode(array('error'=>'success'));
              }else {
                  echo json_encode(array('error'=>'error'));
              }
          }else {
            $insert = $db->prepare("UPDATE users SET facebook=? WHERE id=?;");
            $insert->execute([$facebookLink, $uid]);
            if($insert){
                $_SESSION['add_facebook'] = "<i class='fas fa-check-circle'></i>Facebook successfully Updated";
                echo json_encode(array('error'=>'success'));
            }else {
                echo json_encode(array('error'=>'error'));
            }
          }
      }
    }
    add_facebook();
    function linkedin(){
      GLOBAL $db;
      if (isset($_GET['linkedin']) && $_GET['linkedin']=='true') {
        $linkedin = $_POST['linkedin'];
        $uid = $_SESSION['user_id'];
        $query = $db->prepare("SELECT * FROM users WHERE id=?");
        $query->execute([$uid]);
        $row = $query->fetch(PDO::FETCH_OBJ);
        if (empty($row->linkedin)) {
          $insert = $db->prepare("UPDATE users SET linkedin=? WHERE id=?;");
          $insert->execute([$linkedin, $uid]);
          if ($insert) {
            $_SESSION['add_linkedin'] = "<i class='fas fa-check-circle'></i>Linked in added successfully";
            echo json_encode(array('error'=>'success'));
          }else{
            echo json_encode(array('error'=>'error'));
          }
        }else {
          $insert = $db->prepare("UPDATE users SET linkedin=? WHERE id=?;");
          $insert->execute([$linkedin, $uid]);
          if ($insert) {
            $_SESSION['add_linkedin'] = "<i class='fas fa-check-circle'></i>Linkedin Updated successfully";
            echo json_encode(array('error'=>'success'));
          }else{
            echo json_encode(array('error'=>'error'));
          }
        }
      }
    }

    linkedin();
    function change_pwd(){
      GLOBAL $db;
      if (isset($_GET['changepwd']) && $_GET['changepwd']=='true') {
        $currentPwd = $_POST['current_pwd'];
        $newPwd = password_hash($_POST['new_pwd'], PASSWORD_DEFAULT) ;
        $uid = $_SESSION['user_id'];
        $query = $db->prepare("SELECT * FROM users WHERE id = ?;");
        $query->execute([$uid]);
        $row = $query->fetch(PDO::FETCH_OBJ);
        $db_pwd = $row->password;
        if (password_verify($currentPwd, $db_pwd)) {
          $q = $db->prepare("UPDATE users SET password =? WHERE id=?");
          $q->execute([$newPwd, $uid]);
          if ($q) {
            $_SESSION['pwd_ch'] = "<i class='fas fa-check-circle'></i>Your password updated successfully";
            echo json_encode(array('error'=>'success'));
          }else{
            echo json_encode(array('error'=>'error'));
          }
        }else{
          echo json_encode(array('error'=>'error'));
        }
      }
    }
    change_pwd();

    function change_name(){
      GLOBAL $db;
      if (isset($_GET['changen']) && $_GET['changen']=='true') {
        $currentName = $_POST['name'];
        $uid = $_SESSION['user_id'];
        $query = $db->prepare("UPDATE users SET name=? WHERE id=?");
        $query->execute([$currentName, $uid]);
        if ($query) {
          $_SESSION['update_name']="<i class='fas fa-check-circle'></i>Your name updated successfully!";
          echo json_encode(array('error'=>'success'));
        }else{
          echo json_encode(array('error'=>'success'));
        }
      }
    }
     change_name();

     function add_address(){
       GLOBAL $db;
       if (isset($_GET['address']) && $_GET['address'] == 'true') {
         $address = $_POST['address'];
         $uid = $_SESSION['user_id'];
         $query = $db->prepare("UPDATE users SET address=? WHERE id=?");
         $query->execute([$address, $uid]);
         if ($query) {
           $_SESSION['add_address']="<i class='fas fa-check-circle'></i>Your address added succefully!";
           echo json_encode(array('error'=>'success'));
         }else{
           echo json_encode(array('error'=>'error'));
         }
       }
     }
     add_address();
?>