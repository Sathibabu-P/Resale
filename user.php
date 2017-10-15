<?php	
	
	
	include 'init.php';

	if(empty($_SESSION['UserData']['userLoggedIn'])){
    	header("location:login.php");
  	}	

	$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
	if(!empty($sessData['status']['msg'])){
	    $statusMsg = $sessData['status']['msg'];
	    $statusMsgType = $sessData['status']['type'];
	    unset($_SESSION['sessData']['status']);
	}

	isset($_GET['page']) ? $page = $_GET['page'] : '';
	
?>
<div class="container">
	<div class="ads-grid">
		<div class="row side-bar" style="min-height: 700px;">
			<div class="col-md-2">
				 <?php  include 'views/users/navigation.php';?>
			</div>
			<div class="col-md-10">
				<div class="wrapper">					
					 <div id="myTabContent" class="tab-content">
					   <center><?php echo !empty($statusMsg)?'<h4 class="'.$statusMsgType.'">'.$statusMsg.'</h4>':''; ?></center>
					
						 <?php (!empty($page)) ? include 'views/users/'.$page.'.php' :  include 'views/users/profile.php';?>						
						
					  </div>
				</div>
			</div>
		</div>	
	</div>	
</div>

<?php
	include 'views/footer.php';
?>