<?php
  
  $condition['where'] =  array('id' => $_SESSION['UserData']['userID'] );
  $condition['return_type'] = 'single';
  $user = $db->select('users',$condition);



?>
    <h1>Edit Profile</h1>
  	<hr>
  <form class="form-horizontal" role="form" action="classes/users.php" enctype="multipart/form-data" method="post">  
  <input  type="hidden" value="<?=base64_encode($user['id']);?>" name="id">
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
          <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
          <h6>Upload a different photo...</h6>
          
          <input type="file" class="form-control">
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
       
        <h3>Personal info</h3>
        
         
          <div class="form-group">
            <label class="col-lg-3 control-label">First name:*</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['firstname']?>" name="firstname">
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['lastname']?>" name="lastname">
            </div>
          </div>
       
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:*</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" value="<?=$user['email']?>" name="email">
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-md-3 control-label">Phone No:*</label>
            <div class="col-md-8">
              <input class="form-control" type="text" value="<?=$user['phone']?>" name="phone">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="" name="password">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" value="" name="cpassword">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-success" value="Save Changes" name="userUpdate">
              <span></span>
              <input type="reset" class="btn btn-default" value="Cancel">
            </div>
          </div>
       
      </div>
  </div>
 </form>