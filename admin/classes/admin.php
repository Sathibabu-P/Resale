<?php
//start session
session_start();

//load and initialize user class
include $_SERVER['DOCUMENT_ROOT'].'/frm//admin/db/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/admin/db/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/admin/db/functions.php';

$email = $_POST['email']; //Set UserName
$password = $_POST['password']; //Set Password
if(isset($_POST['adminLogin'])){

    if(isset($email, $password) && !empty($_POST['email'])  && !empty($_POST['password'])) {
        ob_start();
       // include(DOC_ROOT.'/config.php'); //Initiate the MySQL connection
        // To protect MySQL injection (more detail about MySQL injection)

                $email = $func->test_input($email);
                $mypassword = $func->test_input($password);
               

                $conditions['where'] = array(
                    'email'=>$email,
                    'password' => md5($func->test_input($mypassword))

                );
                $conditions['return_type'] = 'single';
                $adminData = $db->select('users',$conditions);

                if($adminData){
                    $sessData['adminLoggedIn'] = TRUE;
                    $sessData['adminID'] = $adminData['id'];
                    $sessData['adminEmail'] = $adminData['email'];
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'Welcome '.$adminData['email'].'!';
                    $_SESSION['AdminData'] = $sessData;
                    header("location:../index.php");
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Wrong email or password, please try again.';                     
                    header("location:../login.php");
                }           
                
      
                 ob_end_flush();
    }
    else {
             $sessData['status']['type'] = 'error';
             $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
             $_SESSION['sessData'] = $sessData;
             header("location:../login.php");
    }
}elseif(!empty($_REQUEST['logoutSubmit'])){
    //remove session data
    unset($_SESSION['AdminData']);
    //session_destroy();
    //store logout status into the ession
    $sessData['status']['type'] = 'success';
    $sessData['status']['msg'] = 'You have logout successfully from your account.';
    $_SESSION['AdminData'] = $sessData;
    //redirect to the home page
    header("location:../login.php");
}else {
         $sessData['status']['type'] = 'error';
         $sessData['status']['msg'] = 'Enter email and password.';
         $_SESSION['AdminData'] = $sessData;
         header("location:../login.php");
}

?>