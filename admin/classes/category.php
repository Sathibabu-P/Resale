<?php

//start session
session_start();
//load and initialize user class
include $_SERVER['DOCUMENT_ROOT'].'/frm//admin/db/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/admin/db/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/admin/db/functions.php';

	if(isset($_POST['category_submit'])){

		if(!empty($_POST['name'])  && !empty($_POST['fa_icon'])) {

			$prevCon['where'] = array('name'=>$_POST['name']);			
            $prevCon['return_type'] = 'count';
            $prevCategory = $db->select('category',$prevCon);

            $CategoryData = array(
                'name' => $func->test_input($_POST['name']),
                'fa_icon' => $func->test_input(strtolower($_POST['fa_icon']))                   
            );


            if($prevCategory > 0){

            	if($_POST['action'] == 'edit'){
            		
            		 $prevCon['return_type'] = 'single';
					 $prevCategory = $db->select('category',$prevCon);
					 

					 if((int)$prevCategory['id']!=(int)$_POST['id']){
					 	$sessData['status']['type'] = 'error';
                		$sessData['status']['msg'] = 'Name already exists, please use another name.';                		
					 }else{
					 	$conditions['where'] = array('id'=>$_POST['id']);	
            			$query = $db->update('category',$CategoryData,$conditions);

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
            		$query = $db->update('category',$CategoryData,$conditions);
            	}elseif($_POST['action'] == 'add'){
            		$query = $db->insert('category',$CategoryData);
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
            $prevCategory = $db->select('category',$prevCon);
            if($prevCategory > 0){
            	$conditions['where'] = array('id'=>$_GET['id']);	
            	$query = $db->delete('category',$conditions);
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
		header('location:../category.php?action='.$_POST['action'].'&id='.$_POST['id']);
	}elseif($sessData['status']['type'] == 'error'){
		header('location:../category.php?action='.$_POST['action']);
	}	else{
		header("location:../category.php");
	}
?>