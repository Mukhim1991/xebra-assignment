
<!DOCTYPE html>
<html lang="en">
   <head>
	<link rel="shortcut icon" type="image/icon" href="<?php echo base_url();?>/assets/images/logo.jpg">
      <title>Login Page</title>
	   <!-- The fav icon -->
		
      <!-- Meta tags -->
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="keywords" content=""/>
      <script>
         addEventListener("load", function () { setTimeout(hideURLbar, 0); }, false); function hideURLbar() { window.scrollTo(0, 1); }
      </script>
      <!-- Meta tags -->
      <!--stylesheets-->
      <link href="<?php echo base_url();?>assets/login/css/style.css" rel='stylesheet' type='text/css' media="all">
      <!--//style sheet end here-->
      <link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700" rel="stylesheet">
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	   
	   <style>
		@media (max-width: 1366px)
		.popup {
			margin: 1em auto !important;
		}
	   </style>
   </head>
   <body>
		<?php
			  if(isset($_SESSION['success_message'])){
			?>
			  <div class="alert alert-danger" role="alert">
				<h2 style="text-align:center; padding:30px; color:#fff">
				<?php
				  echo $_SESSION['success_message'];
				  unset($_SESSION['success_message']);
				?>
				</h2>
			  </div>
			<?php   
			  }
			?>
      <div class="mid-class">
         <div class="art-right-grids">
            <h2>Sign In </h2>
			<?php
			  if(isset($_SESSION['error_message'])){
			?>
			  <div class="alert alert-danger" role="alert" style="font-weight:bolder; color:red">
				<?php
				  echo $_SESSION['error_message'];
				  unset($_SESSION['error_message']);
				?>
			  </div>
			<?php   
			  }
			?>
            <form action="<?php echo base_url('index.php/login/submit_login');?>" method="post">
               <div class="main">
                  <div class="form-left-to-mids">
                     <input type="email" name="email" placeholder="Username" value="<?php echo set_value('email'); ?>" required="">
					 <span style="color:red;"><?php echo form_error('email'); ?></span>
                  </div>
                  <div class="form-left-to-mids ">
                     <input type="password" name="password" placeholder="Password" required="">
                     <div class="clear"></div>
                  </div>
               </div>

               <div class="clear"></div>
               <div class="btnn">
                  <button type="submit" >Sign In</button>
               </div>
            </form>

			<!--================== Signup ====================-->
			<div class="lay_more-buttn">
               <h3>
                  <a href="#signup">Click Here for Signup
                  </a>
               </h3>
            </div>	
	
            <div id="signup" class="popup-effect" style="margin-top:-3%">
               <div class="popup">
                  <div class="letter-grids">
                     <form action="<?php echo base_url('index.php/login/signup');?>" method="post">
                        <div class="form-left-to-mids">
                           <input type="text" name="first_name" placeholder="First Name" value="<?php echo set_value('first_name'); ?>" title="First Name" required="">
						   <span style="color:red;"><?php echo form_error('first_name'); ?></span>
                        </div>
						<div class="form-left-to-mids">
                           <input type="text" name="last_name" placeholder="Last Name" value="<?php echo set_value('last_name'); ?>" title="Last Name" required>
						   <span style="color:red;"><?php echo form_error('last_name'); ?></span>
                        </div>
                        <div class="form-left-to-mids">
                           <input type="text" name="phone" placeholder="Mobile Number" value="<?php echo set_value('phone'); ?>" maxlength="10" minlength="10" title="Mobile Number" onkeypress="return isNumber(event)" required="">
							<span style="color:red;"><?php echo form_error('phone'); ?></span>
						</div>
                        <div class="form-left-to-mids">
                           <input type="email" name="email" placeholder="Email Id" value="<?php echo set_value('email'); ?>" title="Email Id" required>
						   <span style="color:red;"><?php echo form_error('email'); ?></span>
                        </div>
                        <div class="form-left-to-mids">
                           <input type="text" name="address" placeholder="Address" value="<?php echo set_value('address'); ?>" title="Address" required>
						   <span style="color:red;"><?php echo form_error('address'); ?></span>
                        </div>
						<div class="form-left-to-mids">
                           <input type="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" title="Password" required>
						   <span style="color:red;"><?php echo form_error('password'); ?></span>
                        </div>
                        <div class="btnn" style="margin-top:-12%">
                           <button type="submit" >Submit</button>
                           <br>
                        </div>
                     </form>
                     <div class="clear"></div>
                  </div>
                  <a class="close" href="#">&times;</a>
               </div>
            </div>
  
         </div>
         
      </div>

	
   </body>
</html>