<?php 
$results= $db->select('city',array('order_by'=>'name ASC'));
$count = 0; 
?>
<div class="panel panel-default">
            <div class="panel-heading">
                Sub Categories                            
            	<a class="btn btn-success" href="<?=$_SERVER['PHP_SELF']; ?>?action=add"><i class="fa fa-plus fa-2x"></i>ADD</a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Name</th>                              
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($results)): ?>
                        	<?php foreach ($results as $res): ?>
                            <tr class="odd gradeX">
                                <td><?=$count = $count+1;?></td>
                                <td><?=$res['name']?></td>                              
                                <td> 
                                	 <a href="<?=$_SERVER['PHP_SELF']; ?>?action=edit&id=<?=$res['id']?>"> <i class="fa fa-edit fa-2x"></i></a>  
                                	 <a href="classes/city.php?action=delete&id=<?=$res['id']?>"  onclick="return confirm('Are you sure?')" name="category_delete"><i class="fa fa-trash fa-2x"></i></a>
                                </td>
                            </tr> 
                            <?php endforeach; ?>      
                             <?php endif; ?>                                   
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>