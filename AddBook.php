<?php include "connect.php";?>
<?php include "LogIn.php"; ?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'/>
		<link rel="stylesheet" type="text/css" href="bokuppladdning.css"/>
	</head>
	<body>
		<div id='header'> 
			<div id='headerBox'>
				<h1>Studentlitteraturdatabasen</h1>	
				<?php LogIn(); ?>
			</div>
		</div>


		<?php 

		
			if(!empty($_POST['isbnT']) /*&& !empty($_POST['titelT'])*/)
			{

			    $ISBN = $_POST['isbnT'];
			    $titel = $_POST['titelT'];
			    $author = $_POST['authT'];
			     
			    $checisbn = $sldb->query("SELECT * FROM books WHERE ISBN = '$ISBN'");

			    if($checisbn->num_rows == 1)
			    {
			       echo "<h1>Error</h1>";
			       echo "<p>Den boks ISBN är redan inlagd</p>";
			       //sleep(4);
			       //header("Location:leggtillbok.php");
			    }
			    else
			    {
	 			    //$pic = $_POST['omslagBild'];
			   		$subject = $_POST['subject'];
			    	$lang = $_POST['langT'];
			    	$info = $_POST['infoT'];
			    	


			    	$registerquery = "INSERT INTO books(ISBN, Titel, Forfattare, Sprak, Huvudamne, Beskrivning  ) VALUES('$ISBN','$titel', '$author', '$lang', '$subject', '$info' )";
			 		
					if($bleh = $sldb->query($registerquery))
			       {
				 		echo "<p>Denna bok är nu inlagd</p>";
				       	//sleep(4);
				       	//header("Location:leggtillbok.php");


			       }
			       else
		        	{
		            	echo "<h1>Error</h1>";
		            	echo "<p>Din registrering misslyckades</p>";
		            	//echo "<meta http-equiv='refresh' content=3>";    
			   		} 
			    }
			}
		?>
	</body>
</html>