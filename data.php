<?php 
	// et saada ligi sessioonile
	require("functions.php");
	
	//ei ole sisseloginud, suunan login lehele
	if(!isset ($_SESSION["userId"])) {
		header("Location: login.php");
	}
	
	
	//kas kasutaja tahab v�lja logida
	// kas aadressireal on logout olemas
	if (isset($_GET["logout"])) {
		
		session_destroy();
		
		header("Location: login.php");
		
	}
	
	if (	isset($_POST["note"]) && 
			isset($_POST["color"]) && 
			!empty($_POST["note"]) && 
			!empty($_POST["color"]) 
	) {
		saveNote($_POST["note"], $_POST["color"]);
		
	}
?>

<h1>Data</h1>
<p>
	Tere tulemast <?=$_SESSION["userEmail"];?>!
	<a href="?logout=1">Logi v�lja</a>
</p>
<h2>M�rkmed</h2>
<form method="POST">
			
	<label>M�rkus</label><br>
	<input name="note" type="text">
	
	<br><br>
	
	<label>V�rv</label><br>
	<input name="color" type="color">
				
	<br><br>
	
	<input type="submit">

</form>