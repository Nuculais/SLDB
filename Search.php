<?php

	require_once 'connect.php';
	include('LogIn.php');

	
	?>


<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;" charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="css/search.css"/>
		<title>Söksida</title>
	</head>
	<body>
		
		<!--Sidhuvudet-->
		<div id='header'> 
			<div id='headerBox'>
				<a href="index.php"><h1>Studentlitteraturdatabasen</h1></a>	
					<?php LogIn(); ?>
				</div>
			</div>
		</div>
		
		<!--SökningsFiltrering-->


		<!--Sökboxen-->
		<div class='searchBox'>			


			<!--Sökinput-->


			<div class='searchBar'>
				<form id='basicSearch' method='get'>
					<input type='text' placeholder='Sök boktitel / författare / ämne' class='searchText' name='search'>
					<input type='submit' value='Sök' class='searchButton'>
				</form>
			</div>	
			<?php

			if(isset($_GET['search'])){

				$keywords = $sldb->escape_string($_GET['search']);

				$query = $sldb->query("SELECT Titel, Forfattare, ISBN, Betyg, Beskrivning, Huvudamne, Bildnamn FROM ( SELECT b.Titel, b.Forfattare, b.ISBN, b.Betyg, b.Beskrivning, b.Huvudamne, b.Omslag, a.AmneID, a.AmneNamn, o.OmslagsID, o.Bildnamn FROM omslag as o, books as b JOIN amne as a WHERE a.AmneID = b.Huvudamne AND o.OmslagsID = b.Omslag) AS Bocker WHERE Titel LIKE '%{$keywords}%' OR Forfattare LIKE '%{$keywords}%'");
			
				 echo $query->num_rows;
			
				if($query->num_rows){

					echo "<div class=\"items\"><ul>";
					while ($r = $query->fetch_object()) {
						$a = 1;
						// echo $r ->Titel, "<h1>" . $r->Forfattare ."</h1>",$r->Forfattare, $r->AmneNamn;
						echo "<li><div class=\"recoBook\">
							<img class=\"omslag\" src=\"". $r -> Bildnamn . "\">
						</div>
						<h2><a href=\"boksida.php?bok=" . $r -> ISBN . "\">" . $r -> Titel. "</a></h2> 
						<h4>" . $r -> Forfattare . "</h4>
						<h4 class=\"kurs\">" . $r -> Huvudamne . "</h4><p> " . $r -> Beskrivning . " <p> " . $r -> Betyg . "</li>" ;

					}
					echo "</ul></div>";

				}

			}

			?>		
			
		</div>
	</body>
</html>