<!DOCTYPE html>
<html>
<head>
	<title>KIOS MALASNGODING</title>
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?= BASEURL; ?>/js/jquery-ui/jquery-ui.css">
	<script type="text/javascript" src="<?= BASEURL; ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?= BASEURL; ?>/js/bootstrap.js"></script>
	<script type="text/javascript" src="<?= BASEURL; ?>/js/jquery-ui/jquery-ui.js"></script>
	<style type="text/css">
	.kotak{	
		margin-top: 150px;
	}

	.kotak .input-group{
		margin-bottom: 20px;
	}
	</style>
</head>
<body>

	<div class="container">
		<div class="panel panel-default">
		
			<form action="<?= BASEURL; ?>/Login/auth" method="post">
				<div class="col-md-4 col-md-offset-4 kotak">
				
					<h3>Login</h3>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
						<input type="text" class="form-control" placeholder="Username" name="user">
					</div>
					<div class="input-group">
						<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
						<input type="password" class="form-control" placeholder="Password" name="pass">
					</div>
					<div class="input-group">			
						<input type="submit" class="btn btn-primary" value="Login">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>