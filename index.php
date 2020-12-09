<?php session_start();?>
<html>		
<head>
<title>Login</title>
<link rel=Stylesheet href=Style.css type="text/css">
</head>
<body>
<center>
<div class="box">
<h1>Login</h1>
<form method="POST" action="login.php">
<div id="user">
Username : <input type="text" name=  "useradmin" placeholder="Useradmin">
</div>
<div id="pass">
Password : <input type="password" name="password" placeholder="Password">
</div>
<input type="submit" value="LOGIN" id="button-ok">
</div>
</body>
</html>