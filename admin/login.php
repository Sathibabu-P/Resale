<?php
	include 'shared/header.php';

    $sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
    if(!empty($sessData['status']['msg'])){
        $statusMsg = $sessData['status']['msg'];
        $statusMsgType = $sessData['status']['type'];
        unset($_SESSION['sessData']['status']);
    }
	//include 'shared/sidebar.php';
?>
<div class="container">
        <div class="row text-center ">
            <div class="col-md-12">
                <br /><br />
                <h2>Admin : Login</h2>
                
                <h5>( Login yourself to get access )</h5>
                 <br />
            </div>
        </div>
         <div class="row ">
               
                  <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>   Enter Details To Login </strong>  

                            </div>
                            <div class="panel-body">
                                <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':''; ?>
                                <form role="form" name="adminLogin" method="post" action="classes/admin.php">
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control" placeholder="Your Email " name="email" />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control"  placeholder="Your Password" name="password"/>
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                           <!--  <span class="pull-right">
                                                   <a href="#" >Forget password ? </a> 
                                            </span> -->
                                        </div>
                                        <input type="submit" name="adminLogin" value="Login Now" class="btn btn-primary "> 
                                     
                                    
                                    
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
    <?php include 'shared/footer.php'; ?>