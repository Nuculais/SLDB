<?php 



require_once 'connect.php';
include('LogIn.php');


?>

<!DOCTYPE html>
<html>
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<head>
		<link rel="stylesheet" type="text/css" href="css/books.css"/>
	</head>
	<body>
		<div id='header'> 
			<div id='headerBox'>
				<a href="index.php"><h1>Studentlitteraturdatabasen</h1></a> 	
                <?php LogIn(); ?>

			</div>
		</div>
		<div class = "bokinfo">

            <?php

            $bok = $sldb-> escape_string($_GET['bok']);

            $query = $sldb->query("SELECT Titel, Forfattare, ISBN, Betyg, Beskrivning, AmneNamn, Bildnamn FROM ( SELECT b.Titel, b.Forfattare, b.ISBN, b.Betyg, b.Beskrivning, b.Huvudamne, b.Omslag, a.AmneID, a.AmneNamn, o.OmslagsID, o.Bildnamn FROM omslag as o, books as b JOIN amne as a WHERE a.AmneID = b.Huvudamne AND o.OmslagsID = b.Omslag) AS Bocker WHERE ISBN = $bok");

            $r = $query->fetch_object()

            ?>
            <img class="omslag" src="<?php echo $r -> Bildnamn;?> ">;
            <h3>Titel: <?php echo $r -> Titel;?></h3>
			<h4>Betyg: <?php echo $r -> Betyg;?></h4>
			<h4>Författare: <?php echo $r -> Forfattare;?></h4>
			<h3>Språk</p>
			<h4>Huvudämne: <?php echo $r -> AmneNamn;?></h4>
            <h4><?php echo $r -> Beskrivning;?></h4>
			<a<h4>Länkar</h4>
		</div>
		

        <?php 

        if(!empty($_SESSION['Username']))
        {
            ?>
            <form name="comment" method="post">
                <input type="text" name="commentText">
                <input type="submit" name="submitCmt" value="Skriv kommentar">
            </form>

            <?php

          if(isset($_POST['submitCmt']))
                    {  

                            $book = $_GET['bok'];
                            echo $book;

                            $uname = $_SESSION['Username'];
                            echo $uname;

                            $comment = $_POST['commentText'];
                            echo $comment;

                            $post = $sldb-> query("INSERT INTO comments (comment) VALUES ('$comment')");
                            $post;
                        
                    }
            
        }

        ?>

		<div class = "kommentarer">
		<!-- Rösträkning-->
		<div class="voting_wrapper" id="votes">
		<div class="voting_btn">
        <div class="up_button">&nbsp;</div><span class="up_votes">0</span>
		</div>
		<div class="voting_btn">
        <div class="down_button">&nbsp;</div><span class="down_votes">0</span>
		</div>
		</div>
		<!-- Rösträkning slut -->
		<div class = "kommentar">
		<p>Det här var nog den bästa boken jag någonsin läst</p>
		</div>
		</div>
	</body>
</html>

<script>
//####### jQuery. Hämta innehåll från databasen när sidan laddas
$.each( $('.voting_wrapper'), function(){
   
    //retrive unique id from this voting_wrapper element
    var unique_id = $(this).attr("id");
   
    //prepare post content
    post_data = {'unique_id':unique_id, 'vote':'fetch'};
   
    //send our data to "vote-process.php" using jQuery $.post()
    $.post('vote-process.php', post_data,  function(response) {
   
            //retrive votes from server, replace each vote count text
            $('#'+unique_id+' .up_votes').text(response.vote_up);
            $('#'+unique_id+' .down_votes').text(response.vote_down);
        },'json');
});

$(".voting_wrapper .voting_btn").click(function (e) {
   
    //get class name (down_button / up_button) of clicked element
    var clicked_button = $(this).children().attr('class');
   
    //get unique ID from voted parent element
    var unique_id   = $(this).parent().attr("id");
   
    if(clicked_button==='down_button') //användaren röstade ner kommentaren
    {
        //prepare post content
        post_data = {'unique_id':unique_id, 'vote':'down'};
       
        //send our data to "vote-process.php" using jQuery $.post()
        $.post('vote-process.php', post_data, function(data) {
           
            //replace vote down count text with new values
            $('#'+unique_id+' .down_votes').text(data);      
           
        }).fail(function(err) {
       
        //alert user about the HTTP server error
        alert(err.statusText);
        });
    }
    else if(clicked_button==='up_button') //användaren röstade upp kommentaren
    {
        //prepare post content
        post_data = {'unique_id':unique_id, 'vote':'up'};
       
        //send our data to "vote-process.php" using jQuery $.post()
        $.post('vote-process.php', post_data, function(data) {
       
            //replace vote up count text with new values
            $('#'+unique_id+' .up_votes').text(data);
           
        }).fail(function(err) {
       
        //alert user about the HTTP server error
        alert(err.statusText);
        });
    }
   
});
//end
</script>