	<div class="header">
		<div class="container">
			<div class="logo">
				<a href="/frm/index.php"><span>Re</span>sale</a>
			</div>
			<div class="header-right">

			<?php if(empty($_SESSION['UserData']['userLoggedIn'])): ?>	
			<a class="account" href="login.php">Login</a>
			<?php endif;?>
			<?php if(!empty($_SESSION['UserData']['userLoggedIn'])): ?>	
			<a class="account" href="user.php">My Acoount</a>
			<a class="account" href="classes/users.php?action=logout">Logout</a>
			<?php endif;?>
	<!-- Large modal -->
			
		</div>
		</div>
	</div>

	<!-- <div class="main-banner banner text-center">
	  <div class="container">    
			<h1>Sell or Advertise   <span class="segment-heading">    anything online </span> with Resale</h1>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>
			<a href="add_post.php">Post Free Ad</a>
	  </div>
	</div> -->