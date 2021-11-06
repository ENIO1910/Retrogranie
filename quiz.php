<!DOCTYPE HTML>
<html lang = "pl">
<?php
session_start();


?>

<head>

	<<meta charset="utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name ="description" content="Serwis o starych grach pochodzących z Nintendo Entertaiment System"/>
	<meta name="keywords" content="gry, komputerowe, retro, nes, konsole, retrogranie, stare gry" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="main.css" type="text/css"/>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'/>
	<title>Retrogranie</title>
	<link rel="stylesheet" href="css/fontello.css" type="text/css"/>
	 <script src="https://www.google.com/recaptcha/api.js"></script>
	 <script type="text/javascript" src="timer.js"></script>
		


</head>
<body>
<body onload="odliczanie();">
<div class="full">
	<div class ="header">
		<div class = "logo">
		<img src="img/pad.png" alt="pad"/> <span style="color:#c34f4f">Retro</span><span>granie.com</span>
		</div>
	</div>
	<div class="nav">
	<ol>
		<li><a href="index.php">Strona Główna</a></li>
		<li><a href="klasyki.php">Klasyki NES</a>
			<ul>
				<li><a href="quiz.php">Contra</a></li>
				<li><a href ="quiz-mario.php">Mario Bros</a></li>
				<li><a href ="quiz-ducktales.php">Duck Tales</a></li>
				<li><a href ="quiz-zelda.php">Legends of Zelda</a></li>
			</ul>
		</li>
		<li><a href="film.php">Gry filmowe</a>
			<ul>
				<li><a href="quiz-homealone.php">Home Alone</a></li>
				<li><a href="quiz-dicktracy.php">Dick Tracy</a></li>
				<li><a href="quiz-simpsons.php">The Simpsons</a></li>
				<li><a href="quiz-topgun.php">Top Gun</a></li>
			</ul>
		</li>
		<li><a href="bijatyki.php">Bijatyki</a>
			<ul>
				<li><a href="quiz-MortalKombat.php">Mortal Kombat</a></li>
				<li><a href="quiz-Nekketsu.php">Nekketsu K.D.</a></li>
				<li><a href="quiz-Double_Dragon.php">Double Dragon</a></li>
				<li><a href="quiz-Turtle.php">Turtles T.</a></li>
			</ul>
		</li>
		<li><a href="sportowe.php">Gry Sportowe</a>
			<ul>
				<li><a href="quiz-tennis.php">Tennis</a></li>
				<li><a href="quiz-Goal3.php">Goal 3</a></li>
				<li><a href="quiz-Excitebike.php">Excitebike</a></li>
				<li><a href="quiz-IkeIke.php">Ike Ike Hockey</a></li>
			</ul>
		</li>
		
			
		<li>
		<?php
			if((isset ($_SESSION['zalogowany']) && ($_SESSION['zalogowany']==true)))
			{
				echo'<a a href="konto.php">'.strtoupper($_SESSION['user']).' </a>';
			}
			else
			{
				echo'<a href="menureg.php"> Rejestracja / Login </a>';
			}
		?>
		</li>
		<li id="zegar"> </li>
			
	</ol>
	
	</div>
	<div class="content"> 
		<h1>Quiz</h1>
		
		<form action="quiz.php" method="post">
			<h2> Ilu maksymalnie osób może zagrać jednocześnie ? </h2>
			<input class="radio-quiz" type="radio" id="jedno" name="q1c" value="A"/>
			<label class="quiz-label">Czterech</label>
			<input class="radio-quiz" type="radio" id="dwu" name="q1c" value="B"/>
			<label class="quiz-label">Dwóch</label>
			<input class="radio-quiz"  type="radio" id="Trzy" name="q1c" value="C"/>
			<label class="quiz-label">Troje</label>
			<br>
			<h2> Jaki to gatunek ? </h2>
			<input class="radio-quiz"type="radio" name="q2c" value="A"/>
			<label class="quiz-label">Akcji</label>
			<input class="radio-quiz"  type="radio" name="q2c" value="B"/>
			<label class="quiz-label">RPG</label>
			<input class="radio-quiz"  type="radio"  name="q2c" value="C"/>
			<label class="quiz-label">Strategia</label>
		
			<h2> Jak nazywał się jeden z głównych bohaterów ? </h2>
			<input class="radio-quiz" type="radio" name="q3c" value="A"/>
			<label class="quiz-label">Mario</label>
			<input class="radio-quiz"  type="radio" name="q3c" value="B"/>
			<label class="quiz-label">Jimmy</label>
			<input class="radio-quiz"  type="radio"  name="q3c" value="C"/>
			<label class="quiz-label">Bill</label>
			<br>	
			<br>	
			<input class="submit-quiz" type="submit" value="Submit"/>
		</form>
		
		 <?php
            error_reporting(0);
            $answer1 = $_POST["q1c"];
			$answer2 = $_POST["q2c"];
			$answer3 = $_POST["q3c"];
			
            $totalCorrect = 0;
            
            if ($answer1 == "B") { $totalCorrect++; }
			if ($answer2 == "A") { $totalCorrect++; }
			if ($answer3 == "C") { $totalCorrect++; }
            $komunikat = '<div class="result">'.$totalCorrect.' / 3 correct</div>';
			$info = '<div class="info">Zaznacz wszystkie odpowiedzi !</div>';
			
			if (isset($_POST['q1c']) & (isset($_POST['q2c'])) & (isset($_POST['q3c']))) 
			{
				echo $komunikat;
			}
			else{
				echo $info;
			}
			
        ?>
		
			
	</div>
	<div class = "socials">
		<div class="socialdivs">
			<a href="https://www.facebook.com/">
			<div id="fb"><i class="icon-facebook"></i></div>
			</a>
			<a href="https://www.youtube.com/">
			<div id="yt"><i class="icon-youtube"></i></div>
			</a>
			<a href="https://www.google.com/intl/pl/account/about/">
			<div id="google"><i class="icon-gplus"></i></div>
			</a>
			<a href="https://twitter.com/">
			<div id="twitter"><i class="icon-twitter"></i></div>
			</a>
			<div style="clear:both"></div>
		</div>
	</div>
	<div class="footer">
	<p>Retrogranie.com &copy; 2021 Thank you for your visit Mario! But our  Princess is in another castle ;-)</p>
	</div>
</div>


</body>

</html>