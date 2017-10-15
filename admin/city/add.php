
<div class="panel-body">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">                                	
            <h3>Add City</h3>
            <form role="form"  action="classes/city.php" method="post">                
                <div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" />
                </div>                                      
                <input type="hidden" name="action" value="add">
                <button type="submit" class="btn btn-success" name="city_submit">Submit</button>
                <a type="reset" class="btn btn-primary" href="<?=$_SERVER['PHP_SELF']; ?>">Back</a>
            </form>
        </div>
    </div>
</div>