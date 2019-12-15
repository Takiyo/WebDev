
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Halaman Login | Aplikasi Penjualan WARKOP Cantha Pratala</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/lib/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/lib/bootstrap/css/bootstrap-responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/theme.css">
    <link rel="stylesheet" href="<?php echo base_url();?>public/lib/font-awesome/css/font-awesome.css">
    <script src="<?php echo base_url();?>public/lib/jquery-1.8.1.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>public/lib/jquery.validate.min.js"></script>
 </head>

  <body> 
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container-fluid">
                <ul class="nav pull-right">
                    
                </ul>
                <a class="brand" href="#"><span class="first">Aplikasi Penjualan </span> <span class="second">WARKOP Cantha Pratala</span></a>
            </div>
        </div>
    </div>
    

    <div class="container-fluid">
        
        <div class="row-fluid">
    <div class="dialog span4">
        <div class="block">
            <div class="block-heading">Silahkan Login</div>
            <div class="block-body">
		<?php echo "<center style='color:red'>".$error."</center>"; ?>	
                <form method="post" action="<?php echo base_url();?>index.php/clogin/masuk" id="loginform">
				
                    <label>Username</label>
                    <input type="text" id="user" name="username" class="required span12" required>
                    
                    <label>Password</label>
                    <input type="password" id="pass" name="password" class="span12" required>
					
		    <input type="submit" name="submit" value="Login" id="masuk" class="btn btn-primary pull-right"/>
					      
					<div class="clearfix"></div>
                </form>
				
            </div>
        </div>

    </div>
</div>

  </body>
</html>



