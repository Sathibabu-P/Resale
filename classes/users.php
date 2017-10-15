<?php

//start session
session_start();

//load and initialize user class
include $_SERVER['DOCUMENT_ROOT'].'/frm/db/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/db/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/db/functions.php';

if(isset($_POST['signupSubmit'])){
   
    //check whether user details are empty
   // print_r($_POST);
   // exit;
    if(!empty($_POST['firstname']) && !empty($_POST['lastname']) && !empty($_POST['email'])  && !empty($_POST['password']) && !empty($_POST['cpassword'])){
        //password and confirm password comparison
        if($_POST['password'] !== $_POST['cpassword']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }else{
            //check whether user exists in the database
            $prevCon['where'] = array('email'=>$_POST['email']);
            $prevCon['return_type'] = 'count';
            $prevUser = $db->select('users',$prevCon);
            if($prevUser > 0){
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Email already exists, please use another email.';
            }else{
                //insert user data in the database
                $userData = array(
                    'firstname' => $func->test_input($_POST['firstname']),
                    'lastname' => $func->test_input($_POST['lastname']),
                    'email' => $func->test_input($_POST['email']),
                    'password' => md5($func->test_input($_POST['password'])),
                    'phone' => $func->test_input($_POST['phone'])
                );
                $insert = $db->insert('users',$userData);
                //set status based on data insert
                if($insert){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'You have registered successfully, log in with your credentials.';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again.';
                }
            }
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
    }
    //store signup status into the session
    $_SESSION['sessData'] = $sessData;
    $redirectURL = ($sessData['status']['type'] == 'success')?'/frm/login.php': '/frm/register.php';

    //redirect to the home/registration page
    header('Location:'.$redirectURL);
}

if(isset($_POST['loginSubmit'])){

    // print_r($_POST);
    //exit;
    //check whether login details are empty
    if(!empty($_POST['email']) && !empty($_POST['password'])){
    	 //get user data from user class
        $conditions['where'] = array(
            'email' => $func->test_input($_POST['email']),
            'password' => md5($func->test_input($_POST['password'])),
            'status' => '1'
        );
        $conditions['return_type'] = 'single';
        $userData = $db->select('users',$conditions);
        //set user data and status based on login credentials
        if($userData){
            $sessData['userLoggedIn'] = TRUE;
            $sessData['userID'] = $userData['id'];
            $sessData['status']['type'] = 'success';
            $sessData['status']['msg'] = 'Welcome '.$userData['firstname'].'!';
            $_SESSION['UserData'] = $sessData;
        }else{
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Wrong email or password, please try again.'; 
        }
    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'Enter email and password.';       
    }
    //store login status into the session
    $_SESSION['sessData'] = $sessData;
    //redirect to the home page
    ($sessData['status']['type'] == 'error') ?  header("Location:/frm/login.php") : header("Location:/frm/user.php");
}

if(isset($_GET['action']) && $_GET['action'] == 'logout'){
    //remove session data
    unset($_SESSION['sessData']);
    session_destroy();
    //store logout status into the ession
    $sessData['status']['type'] = 'success';
    $sessData['status']['msg'] = 'You have logout successfully from your account.';
    $_SESSION['sessData'] = $sessData;
    //redirect to the home page
    header("Location:../index.php");
}

if (isset($_POST['userUpdate'])){

    if(!empty($_POST['firstname'])  && !empty($_POST['email']) ){


        if($_POST['password'] !== $_POST['cpassword']){
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Confirm password must match with the password.'; 
        }else{
             //check whether user exists in the database
            $prevCon['where'] = array('email'=>$_POST['email'],'id !' => base64_decode($_POST['id']));
            $prevCon['return_type'] = 'count';
            $prevUser = $db->select('users',$prevCon);

            if($prevUser > 0){
                $sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Email already exists, please use another email.';
            }else{

                $userData = array(
                    'firstname' => $func->test_input($_POST['firstname']),
                    'lastname' => $func->test_input($_POST['lastname']),
                    'email' => $func->test_input($_POST['email']),
                    'password' => md5($func->test_input($_POST['password'])),
                    'phone' => $func->test_input($_POST['phone'])
                );

                 $conditions['where'] = array(                  
                    'id' => base64_decode($_POST['id'])
                 );


                $update = $db->update('users',$userData,$conditions);

                if($update){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'successfully updated..';
                }else{
                     $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'fail to update data.';
                }               
            } //if($prevUser > 0){
        }

    }else{
        $sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = '*fileds are required.'; 
    }
     $_SESSION['sessData'] = $sessData;
     header("Location:../user.php");
}


 
   // header("Location:index.php");
