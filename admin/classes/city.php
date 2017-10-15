<?php

//start session
session_start();
//load and initialize user class
include $_SERVER['DOCUMENT_ROOT'].'/frm//admin/db/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/admin/db/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/admin/db/functions.php';

	if(isset($_POST['city_submit'])){

		if(!empty($_POST['name'])) {

			$prevCon['where'] = array('name'=>$_POST['name']);			
            $prevCon['return_type'] = 'count';
            $prevcity = $db->select('city',$prevCon);

            $Citydata = array(
                'name' => $func->test_input($_POST['name'])                                
            );


            if($prevcity > 0){

            	if($_POST['action'] == 'edit'){
            		
            		 $prevCon['return_type'] = 'single';
					 $prevcity = $db->select('city',$prevCon);
					 

					 if((int)$prevcity['id']!=(int)$_POST['id']){
					 	$sessData['status']['type'] = 'error';
                		$sessData['status']['msg'] = 'Name already exists, please use another name.';                		
					 }else{
					 	$conditions['where'] = array('id'=>$_POST['id']);	
            			$query = $db->update('city',$Citydata,$conditions);

            			if($query){
		                    $sessData['status']['type'] = 'success';
		                    $sessData['status']['msg'] = 'You have updated successfully';
		                }else{
		                    $sessData['status']['type'] = 'error';
		                    $sessData['status']['msg'] = 'Some problem occurred, please try again..';
		                }
					 }

				}else{
					$sessData['status']['type'] = 'error';
                	$sessData['status']['msg'] = 'Name already exists, please use another name.';
				}
                                
            }else{


            	if($_POST['action'] == 'edit'){
            		$conditions['where'] = array('id'=>$_POST['id']);	
            		$query = $db->update('city',$Citydata,$conditions);
            	}elseif($_POST['action'] == 'add'){
            		$query = $db->insert('city',$Citydata);
            	}
                
                if($query){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'You have entred successfully';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again...';
                }
            }
             
		}else{
				 $sessData['status']['type'] = 'error';
	             $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 	           		
		}
	}elseif(!empty($_GET['action']) && $_GET['action']=='delete') {
			
			$prevCon['where'] = array('id'=>$_GET['id']);			
            $prevCon['return_type'] = 'count';           
            $prevcity = $db->select('city',$prevCon);
            if($prevcity > 0){
            	$conditions['where'] = array('id'=>$_GET['id']);	
            	$query = $db->delete('city',$conditions);
            	if($query){
                    $sessData['status']['type'] = 'success';
                    $sessData['status']['msg'] = 'You have deleted successfully';
                }else{
                    $sessData['status']['type'] = 'error';
                    $sessData['status']['msg'] = 'Some problem occurred, please try again..';
                }
            }else{
            	$sessData['status']['type'] = 'error';
                $sessData['status']['msg'] = 'Some problem occurred, please try again...';
            }

			

	}	else{
			 $sessData['status']['type'] = 'error';
             $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.';                       
	}

	$_SESSION['sessData'] = $sessData;  
	if ($_POST['action'] == 'edit' && $sessData['status']['type'] == 'error') {
		header('location:../city.php?action='.$_POST['action'].'&id='.$_POST['id']);
	}elseif($sessData['status']['type'] == 'error'){
		header('location:../city.php?action='.$_POST['action']);
	}	else{
		header("location:../city.php");
	}
?>