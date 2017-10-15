<?php
    $category = $db->select('category',array('order_by'=>'name ASC'));
?>

<div class="panel-body">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">                                	
            <h3>Add Category</h3>
            <form role="form"  action="classes/subcategory.php" method="post">
                <div class="form-group">
                    <label>Category Name</label> 

                    <select class="form-control" name="category_id">                      
                      <?php foreach ($category as $res): ?>
                        <option value="<?=$res['id'] ?>"  ><?=$res['name'] ?></option>
                      <?php endforeach; ?>                  
                    </select>

                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" />
                </div>                                      
                <input type="hidden" name="action" value="add">
                <button type="submit" class="btn btn-success" name="subcategory_submit">Submit</button>
                <a type="reset" class="btn btn-primary" href="<?=$_SERVER['PHP_SELF']; ?>">Back</a>
            </form>
        </div>
    </div>
</div>