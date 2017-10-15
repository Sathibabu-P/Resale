<?php
	
	include 'init.php';	
	$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
	if(!empty($sessData['status']['msg'])){
	    $statusMsg = $sessData['status']['msg'];
	    $statusMsgType = $sessData['status']['type'];
	    unset($_SESSION['sessData']['status']);
	}
?>
 <section>	
 		
 		<form name="register" action="classes/users.php" method="post"> 	
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-up">
						<h1>Create an account</h1>				
						
						<h2>Personal Information</h2>

						<?php echo !empty($statusMsg)?'<h4 class="'.$statusMsgType.'">'.$statusMsg.'</h4>':''; ?>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>First Name* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="firstname" placeholder=" " required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Last Name* :</h4>
							</div>
							<div class="sign-up2">
							
									<input type="text" name="lastname" placeholder=" " required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Email Address* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="text" name="email" placeholder=" " required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Password* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="password" placeholder=" " required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sign-u">
							<div class="sign-up1">
								<h4>Confirm Password* :</h4>
							</div>
							<div class="sign-up2">
								
									<input type="password" name="cpassword"  placeholder=" " required=" "/>
								
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="sub_home">
							<div class="sub_home_left">
								
									<input type="submit" value="Create" name="signupSubmit">
							
							</div>
							<div class="sub_home_right">
								<p>Go Back to <a href="/frm">Home</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
			</div>
		</form>
		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">&copy 2016 Resale. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
			</footer>
        <!--footer section end-->
	</section>