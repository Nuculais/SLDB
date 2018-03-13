<?php include "connect.php";?>
<?php include "LogIn.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="SökCss.css"/>
</head>

	<body>
		<div id='header'> <!-- Opens header -->
			<div id='headerBox'>
				<h1>Studentlitteraturdatabasen</h1>	
				<?php LogIn(); ?>
			</div>
		</div>
				
		<div class='profil'>
			<div class='personinfo'>
				<?php 
					 $username= $_SESSION['Username'];

					$checklogin = $sldb->query("SELECT * FROM anvandare WHERE Anvandarenamn = '$username'");
					$pInfo = $checklogin->fetch_assoc();
				 ?>
					<img src="källa">

					<input type="file" id="profilbild" name="profilbild">

					<p>Användarnamn:
					<?php echo $pInfo['Anvandarenamn'] ?></p>

					<p>E-mail:
					<?php echo $pInfo['Email'] ?></p>

					<p>Betyg:
					<?php echo $pInfo['Betyg'] ?></p>
					<?php 
						if($pInfo['Behorighet'] == 1)
						{
							?>
							<p>Inloggad som Admin
							<input type='button' value='Ny bok' id='Register'onClick="parent.location='leggtillbok.php'"></p>
							<?php
						}
					 ?>

			</div>


			<div class='bio'>
				<form action="Profil.php" method="post">
					<h2>Min Biografi!</h2>				
					<textarea name='TextBio'><?php echo $pInfo['Beskrivning'] ?></textarea>
					<input type='submit' name='submit' value='Uppdatera' >
				</form>
				
				<?php 
				
				if(!empty($_POST['TextBio']) /*&& !empty($_POST['titelT'])*/)
				{

				    $Bio = $_POST['TextBio'];
				    $username = $_SESSION['Username'];
			    	
			    	$registerquery = "UPDATE anvandare SET Beskrivning = '$Bio' Where Anvandarenamn = '$username'";
			 		
			 		if($bleh = $sldb->query($registerquery))
			       	{
				 		echo "<meta http-equiv='refresh' content=1>";
				 		echo "<p>Texten är uppdaterad</p>";

			       	}
			       	else
			    	{
			        	echo "<h1>Error</h1>";
			        	echo "<p>Texten misslyckades</p>";
			  
			   		} 
				    
				}
			?>

			</div>
		</div>

	</body>
</html>