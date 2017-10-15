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
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<h1>Log in</h1>
						</div>
						
						<div class="signin">
							<?php echo !empty($statusMsg)?'<h4 class="'.$statusMsgType.'">'.$statusMsg.'</h4>':''; ?>
							<form name="login" method="post" action="classes/users.php">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" class="user" name="email" placeholder="Your Email" />
								</div>							
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" placeholder="YourPassword" name="password"/>
								</div>								
								<div class="clearfix"> </div>
							</div>
							<input type="submit" value="Log in" name="loginSubmit">
						</form>	
						<br>
						<div class="signin-rit">								
								<p><a href="#">Forgot Password ?</a> </p>
								<div class="clearfix"> </div>
							</div> 
						</div>
						<div class="new_people">
							<h2>For New People</h2>
							<br>
							<p><a href="register.php">Register Now!</a></p>
							
						</div>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer class="diff">
			   <p class="text-center">&copy 2016 Resale. All Rights Reserved | Design by <a href="https://w3layouts.com/" target="_blank">w3layouts.</a></p>
			</footer>
        <!--footer section end-->
	</section>