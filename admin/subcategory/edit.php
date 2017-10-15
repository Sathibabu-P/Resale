<?php  
						
	 $category = $db->select('category',array('order_by'=>'name ASC'));
	$conditions['where'] = array(
        'id'=>$_GET['id']
    );
    $conditions['return_type'] = 'single';
	$results= $db->select('subcategory',$conditions);
	
	if(empty($results)){
		    $sessData['status']['type'] = 'error';
			$sessData['status']['msg'] = 'Some problem occurred, please try again.';
			$_SESSION['sessData'] = $sessData;
		header('Location:subcategory.php');
	}
?>
						<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                	
                                    <h3>Add SubCategory</h3>
                                    <form role="form"  action="classes/subcategory.php" method="post">

                                        <div class="form-group">
                                         <label>Category Name</label> 

                                            <select class="form-control" name="category_id">                      
                                              <?php foreach ($category as $res): ?>
                                                <option value="<?=$res['id'] ?>" <?php if($res['id']==$results['category_id']) echo 'selected'?> ><?=$res['name'] ?></option>
                                              <?php endforeach; ?>                  
                                            </select>

                                        </div>


                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="<?=$results['name']?>" />                                           
                                        </div>
                                                                           
                                        <input type="hidden" name="action" value="edit">
                                        <input type="hidden" name="id" value="<?=$results['id']?>">
                                        <button type="submit" class="btn btn-success" name="subcategory_submit">Submit</button>
                                        <a type="reset" class="btn btn-primary" href="<?=$_SERVER['PHP_SELF']; ?>">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>