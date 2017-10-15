<?php

//start session
session_start();
//load and initialize user class
include $_SERVER['DOCUMENT_ROOT'].'/frm/db/config.php';
include $_SERVER['DOCUMENT_ROOT'].'/frm/db/db.php';

if(isset($_POST['catid']) && $_POST['catid'] > 0 ) {
			
	$conditions['where'] = array('category_id'=>(int)$_POST['catid']);	           
    $results = $db->select('subcategory',$conditions);
    echo '<option value="">Select Subcategory</option>';
    if(!empty($results)):
	    foreach ($results as $res):
	    	echo '<option value="'.$res['id'].'">'.$res['name'].'</option>';
	    endforeach;
	endif;
}