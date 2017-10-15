<?php

//start session
session_start();
//load and initialize user class
include $_SERVER['DOCUMENT_ROOT'].'/frm//admin/db/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/admin/db/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/admin/db/functions.php';
	
	if(isset($_POST['subcategory_submit']) && !empty($_POST['action'])){

		if(!empty($_POST['name'])  && !empty($_POST['category_id'])) {

			$prevCon['where'] = array('name'=>$_POST['name'], 'category_id'=>$_POST['category_id']);			
            $prevCon['return_type'] = 'count';
            $prevCategory = $db->select('subcategory',$prevCon);

            $SubcategoryData = array(
                'name' => $func->test_input($_POST['name']),
                'category_id' => (int)$func->test_input($_POST['category_id'])                   
            );

            if($prevCategory > 0){



            	if($_POST['action'] == 'edit'){
            		
            		 $prevCon['return_type'] = 'single';
					 $prevCategory = $db->select('subcategory',$prevCon);
					 

					 if((int)$prevCategory['id']!=(int)$_POST['id']){
					 	$sessData['status']['type'] = 'error';
                		$sessData['status']['msg'] = 'Name already exists, please use another name.';                		
					 }else{
					 	$conditions['where'] = array('id'=>$_POST['id']);	

            			$query = $db->update('subcategory',$SubcategoryData,$conditions);

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


            } else{

            	if($_POST['action'] == 'edit'){
            		$conditions['where'] = array('id'=>$_POST['id']);	
            		$query = $db->update('subcategory',$SubcategoryData,$conditions);
            	}elseif($_POST['action'] == 'add'){
            		$query = $db->insert('subcategory',$SubcategoryData);
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

	} elseif(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'delete'){


			$prevCon['where'] = array('id'=>$_GET['id']);			
            $prevCon['return_type'] = 'count';           
            $prevCategory = $db->select('subcategory',$prevCon);
            if($prevCategory > 0){
            	$conditions['where'] = array('id'=>$_GET['id']);	
            	$query = $db->delete('subcategory',$conditions);
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



	} else{

		$sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.';       
	}

	$_SESSION['sessData'] = $sessData;  
	if ($_POST['action'] == 'edit' && $sessData['status']['type'] == 'error') {
		header('location:../subcategory.php?action='.$_POST['action'].'&id='.$_POST['id']);
	}elseif($sessData['status']['type'] == 'error'){
		header('location:../subcategory.php?action='.$_POST['action']);
	}	else{
		header("location:../subcategory.php");
	}
?>