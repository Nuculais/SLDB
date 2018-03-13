<?php include "connect.php";?>
<?php include "LogIn.php"; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="SökCss.css"/>
	</head>


	<body>
		<!-- Opens header -->
		<div id='header'> 
			<div id='headerBox'>
				<h1>Studentlitteraturdatabasen</h1>	
				<?php LogIn(); ?>
			</div>
		</div>


				 
		<div class="container">
			<?php
			if(!empty($_POST['aname']) && !empty($_POST['losenord']))
			{
			    $aname = $_POST['aname'];
			    $losenord = $_POST['losenord'];
			    $email = $_POST['email'];
			     
			    $checkusername = $sldb->query("SELECT * FROM anvandare WHERE Anvandarenamn = '$aname'");
			    $checkemail = $sldb->query("SELECT * FROM anvandare WHERE Email = '$email'");
			    $Valid = true;
	 
			    if($checkusername->num_rows == 1)
			    {
			       echo "<h1>Error</h1>";
			       echo "<p>Det namnet är redan taget.</p>";
			       echo "<meta http-equiv='refresh' content=3>";
			       $Valid = false;

			    }

			    if($checkemail->num_rows == 1)
			    {
			       echo "<h1>Error</h1>";
			       echo "<p>Den Mailadressen är redan taget.</p>";
			       echo "<meta http-equiv='refresh' content=3>";
			       $Valid = false;
			    }

			    if($Valid)
			    {
			       $registerquery = "INSERT INTO anvandare(Anvandarenamn, Email, Losenord) VALUES('$aname', '$email', '$losenord');";
			       
			    
			       if($bleh = $sldb->query($registerquery))
			       {
			           echo "<h1>Success</h1>";
			           echo "<p>Ditt konto har nu skapats!.<br>Du kan nu logga in ovan.</p>";


			       }
			       else
		        	{
		            	echo "<h1>Error</h1>";
		            	echo "<p>Din registrering misslyckades</p>";
		            	echo "<meta http-equiv='refresh' content=3>";    
			   		} 
			    }
	    	}

			else
			{
			    ?>
			   	<form class='Regform' action='Reg.php' method='post'>
				   	<h3>Registrera dig!</h3>
				     
				   	<p>Var vänlig skriv in din information nedan.</p>

					<p><label for='aname' >Användarnamn: </label></p>
					<p><input type='text' name='aname' id='aname'></p>



					<p><label for='email' >E-Mail:</label></p>
					<p><input type='text' name='email' id='email' ></p>



					<p><label for='losenord' >Lösenord:</label></p>
					<p><input type='password' name='losenord' id='losenord'></p>



					<p><input type='submit' name='Submit' value='Submit' ></p>
				</form>
			    <?php
			}
			?>
		</div>
	</body>
</html>