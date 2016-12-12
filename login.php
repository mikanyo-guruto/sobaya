<html>
<head>
<title></title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
<div class="wrap">
    <div class="main">
       <p>
		<?php
			session_start();
			if(!empty($_SESSION['msg'])) {
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			};
		?>
	   </p>
       <h1>ログイン</h1>
       <form action="loginController.php" method="post">
           <p>ID:<input type="text" name="id"></p>
           <p>PASS:<input type="password" name="ps"></p>
           <input type="hidden" name="action" value="login">
           <input type="submit" value="ログイン" class="btn btn-primary">
       </form>
    </div>
</div>
</body>
</html>