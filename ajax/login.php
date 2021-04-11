<?php
include '../connection/db.php';
function login(){
    GLOBAL $db;
    if($_GET['login'] && $_GET['login'] == 'true'){
       $email = $_POST['login-email'];
       $password = $_POST['login-password'];
       $query = $db->prepare("SELECT * FROM users WHERE email=?;");
       $query->execute(array($email));
       if($query->rowCount()!=0){
        $row = $query->fetch(PDO::FETCH_OBJ);
        $db_password = $row->password;
        if (password_verify($password, $db_password)) {
         $id = $row->id;
         $_SESSION['user_id'] = $id;
         echo json_encode(['error'=> 'success', 'msg'=>'profile/index.php']);
        }else{
            echo json_encode(['error'=> 'Password_error', 'msg'=>'Incorrect Password']); 
        }
       }else {
           echo json_encode(['error'=> 'No_Email', 'msg'=>'This email is not registered']);
       }
    }
}
login();
?>