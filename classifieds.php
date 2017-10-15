<?php
	include 'init.php';
	$category = $db->select('category',array('order_by'=>'name ASC'));	
	$city = $db->select('city',array('order_by'=>'name ASC'));

	$conditions['where'] = array('category_id'=>(int)$_GET['category']);


	$listings = $db->listings();
?>

<div class="total-ads main-grid-border">
		<div class="container">
			<div class="select-box">
				<div class="select-city-for-local-ads ads-list">
					<label>Select your city to see local ads</label>
						<select>
						<option data-tokens="" >All</option>
						 <?php foreach ($city as $res): ?>
					 	 <option data-tokens="<?=$res['id'] ?>" <?php #if((int)$_GET['city'] == (int)$res['id']) echo 'selected'; ?> ><?=$res['name'] ?></option>
					  	 <?php endforeach; ?>
			            </select>
				</div>
				<div class="browse-category ads-list">
					<label>Browse Categories</label>					
					<select class="selectpicker show-tick" data-live-search="true" tabindex="-98">
					  <option data-tokens="" >All</option>
					  <?php foreach ($category as $res): ?>
					 	<option data-tokens="<?=$res['id'] ?>" <?php if((int)$_GET['category'] == (int)$res['id']) echo 'selected'; ?> ><?=$res['name'] ?></option>
					  <?php endforeach; ?>					
					</select>
				</div>
				<div class="search-product ads-list">
					<label>Search for a specific product</label>
					<div class="search">
						<div id="custom-search-input">
						<div class="input-group">
							<input type="text" class="form-control input-lg" placeholder="Buscar">
							<span class="input-group-btn">
								<button class="btn btn-info btn-lg" type="button">
									<i class="glyphicon glyphicon-search"></i>
								</button>
							</span>
						</div>
					</div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="all-categories">
				<h3> Select your category and find the perfect ad</h3>
				<ul class="all-cat-list">
					<?php foreach ($category as $res):
						$conditions['where'] = array('category_id'=>$res['id']);
						$subcategory = $db->select('subcategory',$conditions)
					 ?>
						<li><a href="classifieds.php?category=<?=$res['id']; ?>"><?=$res['name'] ?><span class="num-of-ads">(<?=count($subcategory) ?>)</span></a></li>
					<?php endforeach; ?>
				</ul>
			</div>
			<ol class="breadcrumb" style="margin-bottom: 5px;">
			  <li><a href="index.html">Home</a></li>
			  <li class="active">All Ads</li>
			</ol>
			<!---728x90--->
			<div class="ads-grid">
				<div class="side-bar col-md-3">
					<div class="search-hotel">
					<h3 class="sear-head">Name contains</h3>
					<form>
						<input type="text" value="Product name..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Product name...';}" required="">
						<input type="submit" value=" ">
					</form>
				</div>
				
				<div class="range">
					<h3 class="sear-head">Price range</h3>
							<ul class="dropdown-menu6">
								<li>
									                
									<div id="slider-range" class="ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"><div class="ui-slider-range ui-widget-header" style="left: 0.555556%; width: 66.1111%;"></div><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 0.555556%;"></a><a class="ui-slider-handle ui-state-default ui-corner-all" href="#" style="left: 66.6667%;"></a></div>							
										<input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;">
									</li>			
							</ul>
							<!---->
							<script type="text/javascript" src="assets/js/jquery-ui.js"></script>
							<script type="text/javascript">//<![CDATA[ 
							$(window).load(function(){
							 $( "#slider-range" ).slider({
										range: true,
										min: 0,
										max: 9000,
										values: [ 50, 6000 ],
										slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
										}
							 });
							$( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

							});//]]>  

							</script>
							
				</div>
				<!-- <div class="featured-ads">
					<h2 class="sear-head fer">Featured Ads</h2>
					<div class="featured-ad">
						<a href="single.php">
							<div class="featured-ad-left">
								<img src="assets/images/f1.jpg" title="ad image" alt="">
							</div>
							<div class="featured-ad-right">
								<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
								<p>$ 450</p>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<div class="featured-ad">
						<a href="single.php">
							<div class="featured-ad-left">
								<img src="assets/images/f2.jpg" title="ad image" alt="">
							</div>
							<div class="featured-ad-right">
								<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
								<p>$ 380</p>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<div class="featured-ad">
						<a href="single.php">
							<div class="featured-ad-left">
								<img src="assets/images/f3.jpg" title="ad image" alt="">
							</div>
							<div class="featured-ad-right">
								<h4>Lorem Ipsum is simply dummy text of the printing industry</h4>
								<p>$ 560</p>
							</div>
							<div class="clearfix"></div>
						</a>
					</div>
					<div class="clearfix"></div>
				</div> -->
				</div>
				<div class="ads-display col-md-9">
					<div class="wrapper">					
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					  <ul id="myTab" class="nav nav-tabs nav-tabs-responsive" role="tablist">
						<li role="presentation" class="active">
						  <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
							<span class="text">All Ads</span>
						  </a>
						</li>						
					  </ul>
					  <div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						   <div>
												<div id="container">
								<div class="view-controls-list" id="viewcontrols">
									<label>view :</label>
									<a class="gridview"><i class="glyphicon glyphicon-th"></i></a>
									<a class="listview active"><i class="glyphicon glyphicon-th-list"></i></a>
								</div>
								<div class="sort">
								   <div class="sort-by">
										<label>Sort By : </label>
										<select>
														<option value="">Most recent</option>
														<option value="">Price: Rs Low to High</option>
														<option value="">Price: Rs High to Low</option>
										</select>
									   </div>
									 </div>
								<div class="clearfix"></div>
							<ul class="list">

								<?php if(!empty($listings)):?>
                    			<?php foreach ($listings as $res): ?>

                    			<?php 



                    			?>

								<a href="single.php">
									<li>
									<img src="assets/images/m1.jpg" title="" alt="">
									<section class="list-left">
									<h5 class="title"><?=$res['title']?></h5>
									<span class="adprice">$<?=$res['price']?></span>
									<p class="catpath"><?=$res['category']?> » <?=$res['subcategory']?></p>
									</section>
									<section class="list-right">
									<span class="date">Today, 17:55</span>
									<span class="cityname"></span>
									</section>
									<div class="clearfix"></div>
									</li> 
								</a>
								  <?php endforeach; ?>  
                    				<?php endif; ?>   
							</ul>
						</div>
							</div>
						</div>
						
						<ul class="pagination pagination-sm">
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">5</a></li>
							<li><a href="#">6</a></li>
							<li><a href="#">7</a></li>
							<li><a href="#">8</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					  </div>
					</div>
				</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>	
	</div>