<?php
  	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
  	$url = trim($actual_link, '/');
  	$page_name1 = substr($url, strrpos($url, '/')+1);
	$page_name2 = substr($page_name1, count($page_name1)-1, -4); 
?>
<header>
<!-- 	<nav>
		<ul class="nav-menu">
			<li><a href="index.php" class="nav-class">Home</a></li>
			<li><a href="#">Hello</a></li>
			<li><a href="#">World</a></li>
		</ul>
	</nav> -->
	<nav class="navBar">
	  <nav class="wrapper">
	    <div class="logo"><a href="../index.php" class="home-button"></a></div><!-- Logo -->
	    <input type="checkbox" id="menu-toggle">
	      <label for="menu-toggle" class="label-toggle"></label>
	    </input>
	    <ul>
	      <a href="index.php"><li>Home</li></a>
	      <a href="register.php"><li>Register</li></a>
	      <a href="login.php"><li>Login</li></a>
	    </ul>
	  </nav>
	</nav>
</header>
<div class="content-wrap">
	<h3 align="center">THIS WEBSITE IS UNDER CONSTRUCTION!</h3>