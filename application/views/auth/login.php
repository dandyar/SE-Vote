<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>SE - VOTE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        echo link_tag('assets/fa/css/font-awesome.min.css');
        echo link_tag('assets/bootstrap/css/bootstrap.min.css');
        echo link_tag('assets/fui/css/flat-ui.min.css');
    ?>
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/534fbfa4a5.css"> -->
    <style>
    	html, body{
    		background-color: #fff;
    		height: 100%;
    	}
    	
			#overlay{
				width: 100%;
				height: 100%;
				background: #fff;
				padding-top: 150px;
				position: fixed;
				top: 0;
				left: 0;
				z-index: 9999;
			}
			#loading-frame{
				width: 70px;
				height: 70px;
				margin: auto;
				position: relative;

			}
			.loader1, .loader2{
				position: absolute;
				border: 5px solid transparent;
				border-radius: 50%;
			}
			.loader1{
				width: 70px;
				height: 70px;
				border-top: 5px solid #ccc;
				border-bottom: 5px solid #ccc;
				animation: animation1 2s linear infinite;
			}
			.loader2{
				width: 55px;
				height: 55px;
				border-left: 5px solid darkturquoise;
				border-right: 5px solid darkturquoise;
				top: 7px; left: 7px;
				animation: animation2 2s linear infinite;

			}
			@keyframes animation1 {
				from {transform: rotate(0deg);}
				to {transform: rotate(360deg);}
			}
			@keyframes animation2 {
				from {transform: rotate(360deg);}
				to {transform: rotate(0deg);}
			}
		@media(max-width: 768px){
		    #login{
				margin-top: 30%;
			}
			#about-us{
				margin-top: 30%;
			}
			div.media .media-body h4{
				font-size: 18px;
			}
			div.media .media-body p{
				font-size: 12px;	
			}
		}
		
    	.navbar{
    		border-radius: 0;
    	}
    	#header{
    		margin-top: 5%;
    	}
        #infoMessage{
            max-width: 350px;
            margin: 0 auto;
            height: 50px;
        }

    	form{
    		max-width: 350px;
            margin: 0 auto;
    		margin-bottom: 50px;
    	}
    	footer{
    		position: fixed;
    		bottom: 0;
    		width: 100%;
    	}
    	footer p{
    		margin: 15px 0;
    	}

    </style>

</head>
<body>
	
	<div id="overlay">
		<div id="loading-frame">
			<div class="loader1"></div>
			<div class="loader2"></div>
		</div>
		<p class="text-center">Loading</p>
	</div>

	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top visible-xs">
			<div class="container-fluid">
				<div class="navbar-header">

					<a id="beranda" href="" class="navbar-brand">SE-Vote</a>
				</div>

			</div>
		</nav>
		<div class="container">
			<div id="login">
				<div id="header" class="text-center hidden-xs">
					<h3>SE-Vote<small>&nbsp; Halaman Login</small></h3>
					<span class="fa fa-sign-in fa-5x"></span>
				</div>
				<div id="infoMessage" class="text-center"><?php echo $message;?></div>
				<?php echo form_open('auth/login'); ?>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fui fui-user"></i>
							</span>
							<?php echo form_input($identity) ?>

						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">
								<i class="fui fui-lock"></i>
							</span>
							<?php echo form_input($password) ?>

						</div>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary btn-block" value="Masuk" name="login">
					</div>
				<?php echo form_close(); ?>
			</div>

		</div>
		<footer class="text-center">
			<div class="container">
				<p>Copyright &copy; 2017 SMKN Situraja</p>
			</div>
		</footer>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js'); ?>"></script>
  <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script>
		$(function(){
			$("#about-us").hide();
			$("#overlay").delay(500).fadeOut();

			$("#beranda").click(function(e){
				e.preventDefault();
				$("#mainNav").removeClass("in");
				$("#about-us").hide();
				$("#login").fadeIn();
			});

			$("#pg2").click(function(e){
				e.preventDefault();
				$("#mainNav").removeClass("in");
				$("#login").hide();
				$("#about-us").fadeIn();
			});
		});
	</script>
	<script src="<?php echo base_url('assets/fui/js/flat-ui.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/application.js'); ?>"></script>
</body>
</html>
