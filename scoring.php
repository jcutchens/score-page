<?php 
	error_reporting(E_ALL);
	require_once('includes/config.php');
	
	if(@$_GET['p'])
	{
		$name = "'".$_GET['p']."%'";	
		$sql = "SELECT * FROM events WHERE l_name LIKE $name";
		$myData = $db->query($sql);
			
	}
	if(@$_GET['id'])
	{
		if(is_numeric($_GET['id']))
		{
			$user_id = $_GET['id'];
		}
	}
	if(@$_POST['submitted'])
	{
		$games = $_POST['games'];
		$score = $_POST['score'];
		$year = $_POST['year'];
		$id = $_POST['user_id'];
		
		$sql1 = "UPDATE events
			SET $games='$score',
			event_year='$year'
			WHERE user_id='$id'";
			$myData2 = $db->query($sql1);
			mysqli_close($db);
			header('Location: scoring.php');
					 
	}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Score Sheet</title>
<link rel="stylesheet" href="css/style.css?v=2">
</head>
<?php $mypage ="home"; ?>

<body id="scorecard">

	<div id="contact-form">
        <h1 id="escores">Event Scores</h1>
        <h2>Choose player (by last name) and then enter the correct score for each event.</h2>
            
      <div id="players">
            	<?php
					$players = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z');
					
					foreach($players as $letter)
					{
						echo "<a href='?p=$letter'>$letter</a>";			
					}
				 ?>
      </div><!-- players -->
          <div id="search_results">
          	<?php
			if(@$_GET['p'])
			{
				while($row = $myData->fetch_assoc())
				{
					echo "<a href='?id=".$row['user_id']."'>". $row['f_name'] .",". $row['l_name']."</a><br>";
				}	
			}
			  
			?>
          </div>
            	<?php
					if(! @$_GET['id'])
					{
						exit;		
					}
				?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">	
            		
                    <input type="hidden" name="year" value="<?php echo date('Y');?>">
                    
                    <input type="hidden" name="user_id" value="<?php echo @$user_id;?>">
                    
                <div id="container">
                
                <fieldset>
                    
               	  <label for="games">Choose Event:<span class="required">*</span></label><br>
                  
                  <label class="event_icons" for="Games_1">
                  	<input type="radio" name="games" value="putt_score" id="Games_1" class="radiofloat"/>
                  	<img src="i/putt.png" width="25" height="25" alt="Putt Putt Icon"><span class="game_name">Putt Putt</span>
                    
                  </label>
                <br>
                    
                  <label class="event_icons" for="Games_2">
                  	<input type="radio" name="games" value="derby_score" id="Games_2" class="radiofloat">
                  	<img src="i/derby.png" width="25" height="25" alt="Derby Icon"><span class="game_name">Homerun Derby</span>
                  </label>
                <br>
                
                <label class="event_icons" for="Games_3">
               	  <input type="radio" name="games" value="hshoes_score" id="Games_3" class="radiofloat">
                  	<img src="i/hshoes.png" width="25" height="25" alt="Derby Icon"><span class="game_name">Horseshoes</span>
                  </label>
                <br>
                
                <label class="event_icons" for="Games_4">
               	  <input type="radio" name="games" value="fthrows_score" id="Games_4" class="radiofloat">
                  	<img src="i/fthrow.png" width="25" height="25" alt="Derby Icon"><span class="game_name">Free Throws</span>
                  </label>
                <br>
                
                <label class="event_icons" for="Games_5">
               	  <input type="radio" name="games" value="washers_score" id="Games_5" class="radiofloat">
                  	<img src="i/washers.png" width="25" height="25" alt="Derby Icon"><span class="game_name">Washers</span>
                  </label>
                <br>
                
                <label class="event_icons" for="Games_6">
               	  <input type="radio" name="games" value="chole_score" id="Games_6" class="radiofloat">
                  	<img src="i/chole.png" width="25" height="25" alt="Derby Icon"><span class="game_name">Corn Hole</span>
                  </label>
                <br>
           		  
                  <label class="event_icons" for="Games_7">
                  	<input type="radio" name="games" value="darts_score" id="Games_7" class="radiofloat">
                  	<img src="i/darts.png" width="25" height="25" alt="Derby Icon"><span class="game_name">Darts</span>
                  </label>
                <br>
                
                <label class="event_icons" for="Games_8">
               	  <input type="radio" name="games" value="football_score" id="Games_8" class="radiofloat">
                  	<img src="i/football.png" width="25" height="25" alt="Derby Icon"><span class="game_name">Football Toss</span>
                  </label>
                <br>
                        
                </fieldset>
                        
                  <fieldset id="scorebox">
                        
                        <label for="score"><h3>Score:</h3></label>
                        <input type="text" class="score_field" name="score" maxlength="3">
                  </fieldset>
               	  <input type="submit" name="submitted" value="Submit!" id="submit-button" />
                	<p id="req-field-desc"><span class="required">*</span> indicates a required field</p>
            	</form>
               </div> 
                
                
            
</div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/main.js"></script>
</html>
