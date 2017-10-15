<?php
	
	include 'init.php';
	$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
    if(!empty($sessData['status']['msg'])){
        $statusMsg = $sessData['status']['msg'];
        $statusMsgType = $sessData['status']['type'];
        unset($_SESSION['sessData']['status']);
    }

?>
	
  	<div id="page-wrapper" >
        <div id="page-inner">
            <div class="row">
            	<center><?php echo !empty($statusMsg)?'<h4 class="'.$statusMsgType.'">'.$statusMsg.'</h4>':''; ?></center>
                <div class="col-md-12">
					<?php  
						
						if (isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action']=='edit')) {
						$conditions['where'] = array(
		                    'id'=>$_GET['id']
		                );
		                $conditions['return_type'] = 'single';
						$results= $db->select('category',$conditions);
						
						if(empty($results)){
							$sessData['status']['type'] = 'error';
                   			$sessData['status']['msg'] = 'Some problem occurred, please try again.';
                   			$_SESSION['sessData'] = $sessData;
							header('Location:category.php');
						}
					?>
						<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">
                                	
                                    <h3>Add Category</h3>
                                    <form role="form"  action="classes/category.php" method="post">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name" value="<?=$results['name']?>" />                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Fa-Icon</label>
                                            <input class="form-control" name="fa_icon" value="<?=$results['fa_icon']?>"/>
                                        </div>                                      
                                        <input type="hidden" name="action" value="edit">
                                        <input type="hidden" name="id" value="<?=$results['id']?>">
                                        <button type="submit" class="btn btn-success" name="category_submit">Submit</button>
                                        <a type="reset" class="btn btn-primary" href="<?=$_SERVER['PHP_SELF']; ?>">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					

					<?php }elseif (isset($_GET['action']) && !empty($_GET['action']) && ($_GET['action']=='add')) {?>
							
						<div class="panel-body">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3">                                	
                                    <h3>Add Category</h3>
                                    <form role="form"  action="classes/category.php" method="post">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="name"/>                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Fa-Icon</label>
                                            <input class="form-control" name="fa_icon" />
                                        </div>                                      
                                        <input type="hidden" name="action" value="add">
                                        <button type="submit" class="btn btn-success" name="category_submit">Submit</button>
                                        <a type="reset" class="btn btn-primary" href="<?=$_SERVER['PHP_SELF']; ?>">Back</a>
                                    </form>
                                </div>
                            </div>
                        </div>
					<?php }else{ 

						$results= $db->select('category',array('order_by'=>'name ASC'));

						?>
						<div class="panel panel-default">
                        <div class="panel-heading">
                             Categories
                            
                             <a class="btn btn-success" href="<?=$_SERVER['PHP_SELF']; ?>?action=add"><i class="fa fa-plus fa-2x"></i>ADD</a>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Fa-Icon</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $count = 0; foreach ($results as $res): ?>
                                        <tr class="odd gradeX">
                                            <td><?=$count = $count+1;?></td>
                                            <td><?=$res['name']?></td>
                                            <td><?=$res['fa_icon']?></td>
                                            <td> 
                                            	 <a href="<?=$_SERVER['PHP_SELF']; ?>?action=edit&id=<?=$res['id']?>"> <i class="fa fa-edit fa-2x"></i></a>  
                                            	 <a href="classes/category.php?action=delete&id=<?=$res['id']?>"  onclick="return confirm('Are you sure?')" name="category_delete"><i class="fa fa-trash fa-2x"></i></a>
                                            </td>
                                        </tr> 
                                        <?php endforeach; ?>                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
					<?php }?>
								
				</div>
			</div>
		</div>
	</div>
 <?php include 'shared/footer.php'; ?>
