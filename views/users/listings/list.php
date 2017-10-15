<?php 

    $conditions['where'] = array(
        'user_id'=>(int)$_SESSION['UserData']['userID']
    );
    
    $listings= $db->select('listings',$conditions);
    $count = 0; 

    
?>
<div class="panel panel-default">
    <div class="panel-heading">
        Listings                       
        <a class="btn btn-success" href="<?=$_SERVER['PHP_SELF']; ?>?page=listings&action=add"><i class="fa fa-plus"></i>ADD</a>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table" id="dataTables-example">
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($listings)):?>
                    <?php foreach ($listings as $res): ?>
                    <tr class="odd gradeX">
                        <td><?=$count = $count+1;?></td>
                        <td><?=$res['title']?></td>
                        <td><?=$res['price']?></td>
                         <td><?=$res['description']?></td>
                        
                        <td> 
                             <a href="<?=$_SERVER['PHP_SELF']; ?>?page=listings&action=edit&id=<?=base64_encode($res['id'])?>"> <i class="fa fa-edit fa-2x"></i></a>  
                             <a href="classes/listing.php?page=listings&action=delete&id=<?=base64_encode($res['id'])?>"  onclick="return confirm('Are you sure?')" name="category_delete"><i class="fa fa-trash fa-2x"></i></a>
                        </td>
                    </tr> 
                    <?php endforeach; ?>  
                    <?php endif; ?>                                      
                </tbody>
            </table>
        </div>                
    </div>
</div>