<?php
	include 'init.php';
	$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
    if(!empty($sessData['status']['msg'])){
        $statusMsg = $sessData['status']['msg'];
        $statusMsgType = $sessData['status']['type'];
        unset($_SESSION['sessData']['status']);
    }
	$category= $db->select('category',array('order_by'=>'name ASC'));
	$subcategory= $db->select('subcategory',array('order_by'=>'name ASC'));
?>

	
	<!-- Submit Ad -->
	<div class="submit-ad main-grid-border">
		<div class="container">
			<h2 class="head">Post an Ad</h2>
			<center><?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?></center>
			<div class="post-ad-form">
				<form name="listings" action="classes/listing.php" method="post" enctype="multipart/form-data">
					<label>Select Category <span>*</span></label>
					 <select class="form-control" name="category_id">                      
                      <?php foreach ($category as $res): ?>
                        <option value="<?=$res['id'] ?>"  ><?=$res['name'] ?></option>
                      <?php endforeach; ?>                  
                    </select>

					<div class="clearfix"></div>
					<label>Select SubCategory <span>*</span></label>
					 <select class="form-control" name="subcategory_id">                      
                      <?php foreach ($subcategory as $res): ?>
                        <option value="<?=$res['id'] ?>"  ><?=$res['name'] ?></option>
                      <?php endforeach; ?>                  
                    </select>
					<div class="clearfix"></div>

					<label>Ad Title <span>*</span></label>
					<input type="text" class="phone" placeholder="" name="title">
					<div class="clearfix"></div>

					<label>Ad Description <span>*</span></label>
					<textarea class="mess" placeholder="Write few lines about your product" name="description"></textarea>
					<div class="clearfix"></div>
				<div class="upload-ad-photos">
				<label>Photos for your ad :<span>*</span></label>	
					<div class="photos-upload-view">						

							<input type="file" name="img[]" multiple class="form-control">
						

					</div>
					<div class="clearfix"></div>
						
				</div>
					<div class="personal-details">					
						<label>Show Your Name </label>
						<input type="checkbox" name="show_name"  class="form-control-input" value="1">
						<div class="clearfix"></div>
						<label>Show Your Mobile No </label>
						<input type="checkbox" name="show_phno"  class="form-control-input" value="1">
						<div class="clearfix"></div>
						<label>Show Your Email Address</label>
						<input type="checkbox" name="show_email"  class="form-control-input" value="1">
						<div class="clearfix"></div>
						<p class="post-terms">By clicking <strong>post Button</strong> you accept our <a href="terms.html" target="_blank">Terms of Use </a> and <a href="privacy.html" target="_blank">Privacy Policy</a></p>
					   <input type="submit" value="POST" name="listing_submit">					
					<div class="clearfix"></div>
					</form>
					</div>
			</div>
		</div>	
	</div>
	<!-- // Submit Ad -->

<?php
	include 'views/footer.php';
?>