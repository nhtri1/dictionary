<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="../css/login.css" rel="stylesheet" id="bootstrap-css">

<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="../js/login.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
<form name="form1" method="post" action="../controller/checklogin.php">
	<div id="login-box">
		<div class="logo">
			<img src="../images/logo.png" style="left: 0px;width:150px;height:81px" class="img img-responsive img-circle center-block"/>
			<h1 class="logo-caption"><span class="tweak">L</span>ogin</h1>
		</div><!-- /.logo -->
		<div class="controls">
			<input type="text" name="myusername" placeholder="Tài Khoản" class="form-control" id="myusername"/>
			<input type="text" name="mypassword" placeholder="Mật Khẩu" class="form-control" id="mypassword"/>
			<button type="submit" class="btn btn-default btn-block btn-custom">Login</button>
		</div><!-- /.controls -->
	</div><!-- /#login-box -->
</form>
</div><!-- /.container -->
<div id="particles-js"></div>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/particles.js/2.0.0/particles.min.js"></script>-->