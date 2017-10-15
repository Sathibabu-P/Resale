<?php 
  if(empty($_SESSION['AdminData']['adminID'])){
    header("location:login.php");
  }
?>    
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><?php echo $_SESSION['AdminData']['adminEmail']; ?></a> 
            </div>
  <div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> <form method="post" action="classes/admin.php" name="logoutSubmit"> <input type="submit" name="logoutSubmit" class="btn btn-danger square-btn-adjust" value="Logout"></form>  </div>
 </nav> 
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a class="active-menu"  href="index.html"><i class="fa fa-dashboard fa-2x"></i> Dashboard</a>
                    </li>
                      <li>
                        <a  href="city.php"><i class="fa fa-desktop fa-2x"></i> City</a>
                    </li>
                     <li>
                        <a  href="category.php"><i class="fa fa-desktop fa-2x"></i> Category</a>
                    </li>
                    <li>
                        <a  href="subcategory.php"><i class="fa fa-qrcode fa-2x"></i> SubCategory</a>
                    </li>
						   <li  >
                        <a   href="chart.html"><i class="fa fa-bar-chart-o fa-2x"></i> Morris Charts</a>
                    </li>	
                      <li  >
                        <a  href="table.html"><i class="fa fa-table fa-2x"></i> Table Examples</a>
                    </li>
                    <li  >
                        <a  href="form.html"><i class="fa fa-edit fa-2x"></i> Forms </a>
                    </li>				
					 <li  >
                        <a   href="login.html"><i class="fa fa-bolt fa-2x"></i> Login</a>
                    </li>	
                     <li  >
                        <a   href="registeration.html"><i class="fa fa-laptop fa-2x"></i> Registeration</a>
                    </li>	
					                   
                   
                  <li  >
                        <a  href="blank.html"><i class="fa fa-square-o fa-2x"></i> Blank Page</a>
                    </li>	
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->