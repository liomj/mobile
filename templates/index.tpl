<html>
<head>
<title>XOOPS Mobile App Proof of Concept</title>
<meta charset="UTF-8">
<meta name="description" content="XOOPS Mobile App Proof of Concept">
<meta name="keywords" content="XOOPS, Mobile, App, Proof, Concept">
<meta name="author" content="XOOPS">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style/bootstrap.min.css">
<link href="<{$xoops_url}>/mobile/favicon.ico" rel="shortcut icon">
<link rel="stylesheet" href="style/font-awesome.min.css">
<script src="style/jquery-3.5.1.min.js"></script>
<script src="style/popper.min.js"></script>
<script src="style/bootstrap.min.js"></script>
<link rel="stylesheet" href="style/login.css">
</head>

<body>
<div class="login-form">
    <form action="<{$xoops_url}>/mobile/user.php" method="post">
        <div class="form-group">
		<img src ="<{$xoops_url}>/images/logo.png" class="mx-auto d-block">
		</div>
		<h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" name="uname" class="form-control" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
			<input type="hidden" name="xoops_redirect" value="/mobile/main.php" />
			<input type="hidden" name="op" value="login" />
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <!--<div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>-->   
    </form>
    <!--<p class="text-center"><a href="#">Create an Account</a></p>-->
</div>

</body>
</html>


