<?php session_start(); ?>

<?php
	function LogIn()
	{
		
		include "connect.php";
		
		if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))		
		{
				?>
				
			<div class="userControl">
				<form id='userButtons'>	
					<input type='button' value='Logga ut' id='LogOut' onClick="parent.location='logout.php'">
					<input type='button' value='Profil' id='ProfilPage' onClick="parent.location='Profil.php'" >
				</form>
			</div>	


		     <?php
		}
		elseif(!empty($_POST['username']) && !empty($_POST['password']))
		{
		    $username = $_POST['username'];
		    $password = $_POST['password'];
		     
		    $checklogin = $sldb->query("SELECT * FROM anvandare WHERE Anvandarenamn = '$username' AND Losenord = '$password' ");


		    if($checklogin->num_rows == 1)
		    {
		         
		        $_SESSION['Username'] = $username;
		        $_SESSION['LoggedIn'] = 1;
		         
		        echo "<meta http-equiv='refresh' content=1>";
		    }
		    else
		    {
		        echo "<h1>Felaktigt lösenord eller användarnamn</h1>";
		    }
			
		}
		else
		{
		    ?>
			<div class="userControl">
				<form method="post" name="login" id='login'>
					<input type='text' placeholder='Användarnamn' name='username' id='username'>
					<input type='password' placeholder='Lösenord' name='password' id='password'>	
					<input type='submit' value='Logga in' id='LogIn'>
					<input type='button' value='Registrera' id='Register'onClick="parent.location='Reg.php'">
				</form>
			</div>	
		<?php
		}
	}
?>