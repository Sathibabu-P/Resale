<?php

//start session
session_start();

//load and initialize user class
include $_SERVER['DOCUMENT_ROOT'].'/frm/db/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/db/db.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/db/functions.php';

if(isset($_POST['listing_submit']) || isset($_POST['listing_update'])){
	if(!empty($_POST['category_id']) && !empty($_POST['subcategory_id']) && !empty($_POST['title'])  && !empty($_POST['description']) && !empty($_FILES['img'])){

		$img_desc =  $func->reArrayFiles($_FILES['img']);
        
        $show_email = isset($_POST['show_email']) ? $_POST['show_email'] : 0;
        $show_phno = isset($_POST['show_phno']) ? $_POST['show_phno'] : 0;
        $show_name = isset($_POST['show_name']) ? $_POST['show_name'] : 0;

		$Data = array(
            'user_id' => (int)$func->test_input($_SESSION['UserData']['userID']),
            'city_id' => (int)$func->test_input($_POST['city_id']),
            'category_id' => (int)$func->test_input($_POST['category_id']),
            'subcategory_id' => (int)$func->test_input($_POST['subcategory_id']),
            'description' => $func->test_input(strtolower($_POST['description'])),
            'price' => $func->test_input(strtolower($_POST['price'])),
            'title' => $func->test_input(strtolower($_POST['title'])),
            'show_email' => $show_email,
            'show_phno' =>  $show_phno,
            'show_name' =>  $show_name                  
        );

        if(isset($_POST['id']) && !empty($_POST['id'])){
            $id = base64_decode($_POST['id']);
            $conditions['where'] = array(
                'id' => $id
            );
            $query = $db->update('listings',$Data,$conditions);
            $query = $id;
        } else{
            $query = $db->insert('listings',$Data);
        }
        


        if($query){


        	$upload_dir = '../assets/uploads/'.$query;
        	if (!file_exists($upload_dir)) {
        		mkdir($upload_dir, 0777, true);  //create directory if not exist
    		}

        	foreach($img_desc as $val)
		    {
		       // $newname = date('YmdHis',time()).mt_rand().'.jpg';
		        $newname = $val['name'];
                if(!empty($newname)){
                    move_uploaded_file($val['tmp_name'],'../assets/uploads/'.$query.'/'.$newname);
                    $ImgData['listing_id'] = $query;
                    $ImgData['path'] = '/frm/assets/uploads/'.$query.'/'.$newname;
                    $listing_images = $db->insert('listing_images',$ImgData);
                }
		        
		    }

            $sessData['status']['type'] = 'success';
            $sessData['status']['msg'] = 'You have submited successfully';
        }else{
            $sessData['status']['type'] = 'error';
            $sessData['status']['msg'] = 'Some problem occurred, please try again...';
        }

	}else{
		$sessData['status']['type'] = 'error';
        $sessData['status']['msg'] = 'All fields are mandatory, please fill all the fields.'; 
	}



    $_SESSION['sessData'] = $sessData;  
    if($sessData['status']['type'] == 'error'){
        header('location:/frm/user.php?page=listings&action=add');
    }   else if($sessData['status']['type'] == 'success'){
        ($id > 0) ? header('location:/frm/user.php?page=listings&action=edit&id='.base64_encode($id)) : header('location:/frm/user.php?page=listings');
    }

}






if(isset($_GET['action']) && $_GET['action']=='delete'){
    
    $id =  base64_decode($_GET['id']);
    $conditions['where'] = array(
        'id' => $id
    );
   
    $res = $db->delete('listings',$conditions);

    if($res){


         $ImgData['where'] = array(
            'listing_id' => $id
         );
      
        $imgres = $db->select('listing_images',$ImgData);
           


         foreach ($imgres as $img):

            $img['path'] = str_replace("/frm","..",$img['path']);
            if (file_exists($img['path'])) {  
                unlink($img['path']);
                  $Imgconditions['where'] = array(
                        'id'=>$img['id']
                   );
                 $listing_images = $db->delete('listing_images',$Imgconditions);

            }

         endforeach;


        $upload_dir = '../assets/uploads/'.$id;
        if (file_exists($upload_dir)) {
            rmdir($upload_dir);  //remove directory if  exist
        }         

       $sessData['status']['type'] = 'success';
       $sessData['status']['msg'] = 'You have deleted successfully';
    }
    else{
       $sessData['status']['type'] = 'error';
       $sessData['status']['msg'] = 'Some problem occurred, please try again.';
    }
    header('location:/frm/user.php?page=listings');
}


if(isset($_GET['action']) && $_GET['action']=='delimg'){
    $mid =  (int) $func->test_input($_GET['mid']);
    $ImgData['where'] = array(
            'id' => $mid
            );
    $ImgData['return_type'] = 'single';
    $res = $db->select('listing_images',$ImgData);

    if($res){
        $res['path'] = str_replace("/frm","..",$res['path']);
        if (file_exists($res['path'])) {           
            unlink($res['path']); 

              $Imgconditions['where'] = array(
                    'id'=>$res['id']
                );
             $listing_images = $db->delete('listing_images',$Imgconditions);

        }
    }
    header('location:/frm/user.php?page=listings&action=edit&id='.base64_encode($_GET['lid']));
}


?>