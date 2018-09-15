<!DOCTYPE html>
<html>
  <head>
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="Admin/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="Admin/css/styles.css" rel="stylesheet">
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.html">Admin panel</a></h1>
	              </div>
	           </div>
	           <div class="col-md-5">
	              <div class="row">
	                <div class="col-lg-12">
	                  <div class="input-group form">
	                       <input type="text" class="form-control" placeholder="Search...">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary" type="button">Search</button>
	                       </span>
	                  </div>
	                </div>
	              </div>
	           </div>
	           <div class="col-md-2">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                         
	                          <li><a href="login.html">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="current"><a href="index.html"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="calendar.html"><i class="glyphicon glyphicon-cog"></i> Company Info</a></li>
                    <li><a href="stats.html"><i class="glyphicon glyphicon-cog"></i>Products</a></li>
                    <li><a href="tables.html"><i class="glyphicon glyphicon-cog"></i> Homepage</a></li>
                    <li><a href="buttons.html"><i class="glyphicon glyphicon-cog"></i>Product Details</a></li>
                    <li class="submenu">
                         <a href="#">
                            <i class="glyphicon glyphicon-list"></i> Pages
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li><a href="login.html">Homepage</a></li>
                            <li><a href="signup.html">Products</a></li>
                        </ul>
                    </li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-6">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
                                                    <div class="panel-title"><h3>Edit company info</h3></div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-hand-down"></i></a>
								
							</div>
						</div>
		  				<div class="panel-body">
                                                    <form action="" method="post"  enctype="multipart/form-data">
                                                    <label>Company Name:</label><br>
                                                    <input class="form-control" type="text" 
                                                           required name="company_name" value="<?php echo $business['Name'];?>" ><br>
                                                    
                                                    <label>Email Address:</label><br>
                                                    <input class="form-control" type="email" 
                                                           required name="company_email" value="<?php echo $business['Email'];?>" ><br>
                                                    
                                                    <label>Phone Number:</label><br>
                                                    <input class="form-control" type="text" 
                                                           required name="company_phone" value="<?php echo $business['Phone'];?>"><br>
                                                    
                                                    <label>Address Line 1:</label><br>
                                                    <input class="form-control" type="text" 
                                                           required name="company_add1" value="<?php echo $business['AddressLine1'];?>"><br>
                                                    
                                                    <label>Address Line 2:</label><br>
                                                    <input class="form-control" type="text" 
                                                           required name="company_add2" value="<?php echo $business['AddressLine2'];?>"><br>
                                                    
                                                    <label>City:</label><br>
                                                    <input class="form-control" type="text" 
                                                           required name="company_city" value="<?php echo $business['City'];?>"><br>
                                                    
                                                    <label>Province:</label><br>
                                                    <input class="form-control" type="text" 
                                                           required name="company_province" value="<?php echo $business['Province'];?>"><br>
                                                    
                                                    
                                                    <label>Facebook:</label><br>
                                                    <input class="form-control" type="url" 
                                                           required name="company_face"  value="<?php echo $business['Facebook'];?>"><br>
                                                    
                                                    <label>Instagram:</label><br>
                                                    <input class="form-control" type="url" 
                                                           required name="company_insta"  value="<?php echo $business['Instagram'];?>"><br>
                                                    
                                                   <label>Twitter:</label><br>
                                                    <input class="form-control" type="url" 
                                                           required name="company_twitter"  value="<?php echo $business['Twitter'];?>"><br>
                                                    
                                                    <label>Company Logo:</label><br>
                                                    <input  type="file" 
                                                          name="company_logo" ><br>
                                                    
                                                    <label>About us:</label><br>
                                                    <textarea class="form-control" name="company_about" ><?php echo $business['AboutUs'];?></textarea><br>
                                                    <input type="submit" class="btn btn-primary" value="Update company details">
                                                    <input type='hidden' name='username' value='<?php echo $business['username'] ;?>'>
                                                    <input type='hidden' name='password' value='<?php echo $business['password'];?>'>
                                                    <input type='hidden' name='old_path' value='<?php echo $business['LogoPath'];?>'>
                                                    <input type="hidden" name='action' value="update_business">
                                                    </form>
                                                </div>
		  			</div>
		  		</div>

		  	</div>

		  	
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2018 <a href='#'>Healing & Anathi & Sinobom</a>
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="Admin/bootstrap/js/bootstrap.min.js"></script>
    <script src="Admin/js/custom.js"></script>
  </body>
</html>