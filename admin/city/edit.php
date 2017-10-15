<?php  
						
	
	$conditions['where'] = array(
        'id'=>$_GET['id']
    );
    $conditions['return_type'] = 'single';
	$results= $db->select('city',$conditions);
	
	if(empty($results)){
		    $sessData['status']['type'] = 'error';
			$sessData['status']['msg'] = 'Some problem occurred, please try again.';
			$_SESSION['sessData'] = $sessData;
		header('Location:city.php');
	}
?>
						<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                	
                                    <h3>Edit City</h3>
                                    <form role="form"  action="classes/city.php" method="post">

                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="<?=$results['name']?>" />                                           
                                        </div>
                                                                           
                                        <input type="hidden" name="action" value="edit">
                                        <input type="hidden" name="id" value="<?=$results['id']?>">
                                        <button type="submit" class="btn btn-success" name="city_submit">Submit</button>
                                        <a type="reset" class="btn btn-primary" href="<?=$_SERVER['PHP_SELF']; ?>">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>