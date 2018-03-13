<?php 
	include('connect.php');
	include('Login.php');
 ?>

<!DOCTYPE html>
	<html lang='en'> <!-- Opens html -->
		<head> <!-- Opens head -->
			<link rel='stylesheet' type='text/css' href='css/style.css' />
			<meta charset='utf-8' />
			<meta name='description' content='Databas över kurslitteratur som används vid Uppsala Universitet' />
			<meta name='keywords' content='Kurslitteratur, databas, rankining' />
			<title> Studentlitteraturdatabasen </title>
		</head> <!-- Ends head -->

		<body>
			<div id='wrap'>
				<div id='header'> <!-- Opens header -->
					<div id='headerBox'>
						<?php LogIn(); ?>	
					</div>
				</div> <!-- Ends header -->

				<div id='main'> <!-- Opens main -->
					<div id='items'>

						<div id='reks'>
							<div id='row1'>
							<h2>Välkommen till studentlitteraturdatabasen</h2>
							<p>Studentlitteraturdatabasen är en sida där studenter, lärare och nyfikna personer kan söka efter kurslitteratur som används vid Uppsala Universitets kurser, läsa recensioner 
							på dessa och skriva sina egna recensioner. </p>
							<a href="Search.php"><button type="button">Klicka här för att starta din sökning!</button></a>
							</div>
						</div>
					</div>				
				</div> <!-- Ends main -->

				<div id='footer'> <!-- Opens footer -->
					<div id='footerBox'> <!-- Opens footerBox -->
						<p> Studentlitteraturdatabasen <br> Uråldersgatan 23 <br> kontakt@SLDB.se <br> </p>
						<p> Samarbetspartners </p>
						<a href="kontakt.html"><p> Kontakt <a href="Integritetspolicy.html">Intergitetspolicy</a></p></a>

					</div> <!-- Ends footerBox -->
				</div> <!-- Ends footer -->
			</div>
		</body>


	</html> <!-- Ends html -->