<?php 
	include "Connect.php";
	session_start();
	
	if(!empty($_POST['TextBio']) /*&& !empty($_POST['titelT'])*/)
	{

	    $Bio = $_POST['TextBio'];
	    $username = $_SESSION['Username'];
    	
    	$registerquery = "UPDATE anvandare SET Beskrivning = '$Bio' Where Anvandarnamn = '$username'";
 		
 		if($bleh = $sldb->query($registerquery))
       	{
	 		//echo "<p>Texten är uppdaterad</p>";

       	}
       	else
    	{
        	echo "<h1>Error</h1>";
        	echo "<p>Texten misslyckades</p>";
  
   		} 
	    
	}
?>
