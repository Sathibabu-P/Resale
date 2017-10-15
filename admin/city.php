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
					if(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'add'){
						      include 'city/add.php';
					} elseif(isset($_GET['action']) && !empty($_GET['action']) && $_GET['action'] == 'edit'){
							  include 'city/edit.php';
					} else {  include 'city/list.php';	}
			    ?>
				</div>
        	</div>
    	</div>
	</div>
 <?php include 'shared/footer.php'; ?>	