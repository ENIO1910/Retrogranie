<!DOCTYPE HTML>
<html lang = "pl">
<head>
<?php
session_start();


?>

	<meta charset="utf-8"/>
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
 <script>
 
    $(document).ready(function() {
    var NavY = $('.nav').offset().top;
      
    var stickyNav = function(){
    var ScrollY = $(window).scrollTop();
           
    if (ScrollY > NavY) { 
        $('.nav').addClass('sticky');
    } else {
        $('.nav').removeClass('sticky'); 
    }
    };
      
    stickyNav();
      
    $(window).scroll(function() {
        stickyNav();
    });
    });
     
</script>
	
<head>
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
	<div class="galeria">
		<a style="text-decoration: none" href ="quiz-home_alone.php">
			<img class="miniatura" src="img/home_alone.jpg" alt = "Home_alone" >
		</a>

		<a style="text-decoration: none" href ="quiz-dick_tracy.php">
			<img class="miniatura" src="img/dick_tracy.jpg" alt = "Dick Tracy" >
		</a>
			<br>
		<a style="text-decoration: none" href ="quiz-simpsons.php">
			<img class="miniatura" src="img/simpsons.jpg" alt = "The Simpsons" >
		</a>

		<a style="text-decoration: none" href ="quiz-topgun.php">
			<img class="miniatura" src="img/topgun.jpg" alt = "Top Gun" >
		</a>
		
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