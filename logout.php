<?php
session_start();
if(isset($_SESSION['id'])!=""){
	session_destroy();

	echo "<script>
	
	setTimeout(function(){
		window.location.href='login.php';
		},3000);

	</script>

	<img src = 'img/Loading.gif' 
	style ='  position: fixed;
  			  z-index: 999;
  			  height: 5em;
  		      width: 5em;
  			  overflow: visible;
  			  margin: auto;
  			  top: 0;
  			  left: 0;
  			  bottom: 0;
  			  right: 0;'>
	";}
else if(isset($_SESSION['id1'])!=""){
	session_destroy();

	echo "<script>
	
	setTimeout(function(){
		window.location.href='login.php';
		},3000);

	</script>

	<img src = 'img/Loading.gif' 
	style ='  position: fixed;
  			  z-index: 999;
  			  height: 5em;
  		      width: 5em;
  			  overflow: visible;
  			  margin: auto;
  			  top: 0;
  			  left: 0;
  			  bottom: 0;
  			  right: 0;'>
	";}
?>