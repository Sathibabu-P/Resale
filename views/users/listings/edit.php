<?php
$city= $db->select('city',array('order_by'=>'name ASC'));
$category= $db->select('category',array('order_by'=>'name ASC'));
$subcategory= $db->select('subcategory',array('order_by'=>'name ASC'));

    $conditions['where'] = array(
        'id'=>base64_decode($_GET['id'])
    );
     $conditions['return_type'] = 'single';
    $listing= $db->select('listings',$conditions);

 	$listing_images_conditions['where'] = array(
        'listing_id'=>$listing['id']
    );
    
 	$listing_images= $db->select('listing_images',$listing_images_conditions);

?>
<h2 class="head">Post an Ad</h2>
<div class="post-ad-form">
	<form name="listings" action="classes/listing.php" method="post" enctype="multipart/form-data">

		<input type="hidden" name="id" value="<?=base64_encode($listing['id'])?>">

		<label>Select City <span>*</span></label>
		 <select class="form-control" name="city_id">                      
		  <?php foreach ($city as $res): ?>
		    <option value="<?=$res['id'] ?>" <?php if($res['id']==$listing['city_id']) echo 'selected'?> > <?=$res['name'] ?></option>
		  <?php endforeach; ?>                  
		</select>

		<label>Select Category <span>*</span></label>
		 <select class="form-control" name="category_id"  onchange="change_subcategory();" id="category_id">                      
		  <?php foreach ($category as $res): ?>
		    <option value="<?=$res['id'] ?>" <?php if($res['id']==$listing['category_id']) echo 'selected'?> ><?=$res['name'] ?></option>
		  <?php endforeach; ?>                  
		</select>

		<div class="clearfix"></div>
		<label>Select SubCategory <span>*</span></label>
		 <select class="form-control" name="subcategory_id" id="subcategory_id">                      
		  <?php foreach ($subcategory as $res): ?>
		    <option value="<?=$res['id'] ?>"  <?php if($res['id']==$listing['subcategory_id']) echo 'selected'?>><?=$res['name'] ?></option>
		  <?php endforeach; ?>                  
		</select>
		<div class="clearfix"></div>

		<label>Ad Title <span>*</span></label>
		<input type="text" class="phone" placeholder="" name="title" value="<?=$listing['title']?>">
		<div class="clearfix"></div>

		<label>Ad Description <span>*</span></label>
		<textarea class="mess" placeholder="Write few lines about your product" name="description"><?=$listing['description']?></textarea>
		<div class="clearfix"></div>

		<label>Price <span>*</span></label>
		<input type="text" class="phone" placeholder="" name="price" value="<?=$listing['price']?>">
		<div class="clearfix"></div>

			<div class="container">
				<?php if(!empty($listing_images)):?>
                <?php foreach ($listing_images as $limg): ?>
				<div class="col-md-2 focus-grid">
						<div class="focus-image">
							<img src="<?=$limg['path']?>" alt="image"/>
							<span><a href="classes/listing.php?action=delimg&mid=<?=$limg['id']?>&lid=<?=$listing['id']?>" style="font-size: 18px;font-weight: bold;">X</a></span>
						</div>								
			    </div>
			<?php endforeach; endif;?>
				
			</div>	

		<div class="upload-ad-photos">
		<label>Photos for your ad :<span>*</span></label>	
			<div class="photos-upload-view">						
					<input type="file" name="img[]" multiple class="form-control">
			</div>
			<div class="clearfix"></div>
				
		</div>
		<div class="personal-details">					
			<label>Show Your Name </label>
			<input type="checkbox" name="show_name"  class="form-control-input" value="1" <?php if($listing['show_name']==1) echo 'checked'?>>
			<div class="clearfix"></div>
			<label>Show Your Mobile No </label>
			<input type="checkbox" name="show_phno"  class="form-control-input" value="1" <?php if($listing['show_phno']==1) echo 'checked'?>>
			<div class="clearfix"></div>
			<label>Show Your Email Address</label>
			<input type="checkbox" name="show_email"  class="form-control-input" value="1" <?php if($listing['show_email']==1) echo 'checked'?>>
			<div class="clearfix"></div>
		
		   <input type="submit" value="UPDATE" name="listing_update">			
		   <a href="/frm/user.php?page=listings" name="back" >BACK</a>					
		<div class="clearfix"></div>
		</div>
	</form>
</div>

			