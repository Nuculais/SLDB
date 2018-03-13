<?php include "Connect.php";?>
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
		
		<div class="container">
			<form name="bokuppladdning" id="bokupp" method='post' action='AddBook.php'>
				<h3>Lägg till bok</h3>
		
				<p><label for="isbnTxt">ISBN:</label></p> 
				<p><input type="text" id="isbnTxt" name="isbnT"></p>
			
				<p><label for="titelTxt">Titel:</label></p> 
				<p><input type="text" id="titelTxt" name="titelT"></p>
				
				<p><label for="authTxt">Författare:</label></p> 
				<p><input type="text" id="authTxt" name="authT"></p>
			
				<p><label for="omslagBild">Omslag:</label></p> 
				<p><input type="file" id="omslagBild" name="omslagB"></p>
				
				<p><label for="subjectTxt">Huvudämne:</label></p>
					<select name='subject'>
						<option value="fek">Företagsekonomi</option>
						<option value="human">Humaniora</option>
						<option value="juri">Juridik</option>
						<option value="medi">Medicin</option>
						<option value="mate">Matematik</option>
						<option value="nat">Naturvetenskap</option>
						<option value="naek">Nationalekonomi</option>
						<option value="orgled">Organisation och Ledarskap</option>
						<option value="omvard">Omvårdnad och Vård</option>
						<option value="psyk">Psykologi</option>
						<option value="peda">Pedagogik</option>
						<option value="socarb">Socialt arbete och Omsorg</option>
						<option value="sprak">Språk och Kommunikation</option>
						<option value="tekit">Teknik och IT</option>
					</select>
			
				<p><label for="langTxt">Språk:</label></p>
				<p><input type="text" id="langTxt" name="langT"></p>
			
				<p><label for="infoTxt">Beskrivning:</label></p>
				<p><textarea id="infoTxt" name="infoT" cols="45" rows="7"></textarea></p>
			
				<input type="submit" value="Skicka" id="bokKnp">
			</form>
		</div>
	</body>
</html>