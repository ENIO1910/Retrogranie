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


</head>
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
		<div class="content-right">
			<div class="login">
				<h1>Logowanie</h1>
				<form action="zaloguj.php" method="post">
				<p>
				Login: <input class="input_register" type="text" name="login" placeholder="Login" id ="rowna"/>
				</p>
				<p>
				Hasło: <input class="input_register" type="password" name="haslo" placeholder="******"/>
				</p>
				<div class="g-recaptcha" data-sitekey="6LcYVascAAAAABOpepo5oMcPKqVM4c3aJdV8UGzU"></div>
				<input class="submit-register" type="submit" value="Login">
				</form>
				<?php
				if (isset($_SESSION['e_bot_login']))
				{
					echo $_SESSION['e_bot_login'];
					unset($_SESSION['e_bot_login']);
				}
				else if(isset($_SESSION['blad']))
				{
					echo $_SESSION['blad'];
					unset($_SESSION['blad']);
				}
				
				
				?>
	
			</div>
		</div>
		<div class="content-left">
			<div class="register">
			<form action="register.php" method="post">
			<h1>Rejestracja</h1>
			<p>
				<label>Login:</label> <input class="input_register" type="text" name="login_register" placeholder="Login" id ="rowna"/>
			
				<?php
				if (isset($_SESSION['e_login_register']))
				{
					echo '<div class="error">'.$_SESSION['e_login_register'].'</div>';
					unset($_SESSION['e_login_register']);
				}
				?>
		
			</p>
			<p>
				<label>Hasło:</label> <input class="input_register" type="password" name="password_register" placeholder="******"/>
				
				<?php
				if (isset($_SESSION['e_password']))
				{
					echo '<div class="error">'.$_SESSION['e_password'].'</div>';
					unset($_SESSION['e_password']);
				}
				?>
			</p>
			<p>
				<label>Powtórz hasło:</label> <input class="input_register" type="password" name="pass_replay" placeholder="******"/>
				<?php
				if (isset($_SESSION['e_replay']))
				{
					echo '<div class="error">'.$_SESSION['e_replay'].'</div>';
					unset($_SESSION['e_replay']);
				}
				?>
			</p>
			<p>
				<label>E-mail:</label> <input class="input_register" type="text" name="email" placeholder="adres@mail.com" id ="rowna"/>
				<?php
				if (isset($_SESSION['e_email']))
				{
					echo '<div class="error">'.$_SESSION['e_email'].'</div>';
					unset($_SESSION['e_email']);
				}
				?>
			</p>
				
			
				<label>
				<input type ="checkbox" name="regulamin" /> Akceptuję <a href="regulamin.html" target="new_blank" style="text-decoration:none; color:white;">regulamin</a>
				</label>
				<?php
				if (isset($_SESSION['e_regulamin']))
				{
					echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
					unset($_SESSION['e_regulamin']);
				}
				?>
			
			<div class="g-recaptcha" data-sitekey="6LcYVascAAAAABOpepo5oMcPKqVM4c3aJdV8UGzU"></div>
			<?php
				if (isset($_SESSION['e_bot']))
				{
					echo '<div class="error">'.$_SESSION['e_bot'].'</div>';
					unset($_SESSION['e_bot']);
				}
				?>
			<p>
				<input class="submit-register" type="submit" value="Rejestracja"/>
			</p>
			<?php
			if(isset($_SESSION['udanarejestracja']))
				{
					echo $_SESSION['udanarejestracja'];
					unset($_SESSION['udanarejestracja']);
				}
			?>
			</form>
			</div>
			
		</div>
	</div>
	<div style="clear:both"></div>
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