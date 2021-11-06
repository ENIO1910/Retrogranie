<!DOCTYPE HTML>
<html lang = "pl">
<?php
session_start();
?>
<head>

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
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla elementum mi id arcu hendrerit, nec dictum nunc efficitur. In hac habitasse platea dictumst. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Duis et tempus enim. Mauris nec ex neque. Duis sed ornare mauris. Nullam bibendum sapien blandit tellus commodo eleifend ac a nibh. In pharetra rutrum eleifend. Mauris sit amet dignissim arcu. Nullam neque purus, faucibus a sagittis ut, porttitor sed arcu. Duis gravida pretium nunc ut ornare. Cras ex diam, volutpat id mauris vitae, pellentesque elementum diam. Quisque id interdum augue. Nulla quis tempor diam. Maecenas pharetra, ante non molestie aliquet, diam nisi vehicula nisl, nec finibus massa sem sed odio. Vestibulum feugiat molestie euismod.</p>
		
		<p>Vivamus ullamcorper massa lectus, non facilisis nunc malesuada a. Curabitur commodo suscipit lacus ut consequat. Mauris pharetra porttitor ullamcorper. Aliquam facilisis, purus ut sagittis sodales, lorem risus elementum metus, venenatis dignissim ligula ex at dolor. Duis in tellus at purus facilisis commodo in et diam. Nunc egestas enim eu mi laoreet, vitae sollicitudin odio viverra. Nullam at lectus at neque porttitor porttitor. Vivamus nec vestibulum sapien, non pellentesque quam. Aenean sit amet arcu dui.</p>
		
		<p>Pellentesque quis nisi odio. Maecenas blandit vulputate ante, in feugiat nulla ullamcorper sed. Phasellus eu pellentesque libero. Phasellus eget rutrum odio. In leo purus, ultrices eu erat eget, porttitor hendrerit neque. Nullam ante enim, lobortis varius tincidunt eu, blandit vel lacus. Fusce ac purus ipsum. Quisque nec justo elementum, tempus diam sit amet, pharetra arcu. Pellentesque dolor ipsum, imperdiet sit amet nisl a, fermentum vehicula lectus. Integer vel facilisis nibh. Sed rhoncus tellus in gravida maximus. Phasellus sed fringilla tortor. Maecenas in odio porta dui vestibulum porta.</p>
		
		<p>Proin lacinia vel ligula mattis vehicula. Vivamus in porttitor massa. Pellentesque pulvinar erat et fermentum consectetur. Nullam libero sapien, varius ut interdum nec, ullamcorper sed odio. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras et egestas dolor. Etiam consequat massa quis mi luctus finibus. Aenean gravida, ligula eu interdum viverra, mi magna ullamcorper risus, in iaculis purus turpis in tortor. Maecenas tortor diam, fringilla quis ornare eget, facilisis at nunc. Nullam pellentesque, nibh non vestibulum posuere, massa turpis lobortis lectus, in scelerisque ante lorem at augue. Nulla quis felis condimentum, lobortis turpis vel, laoreet tortor. Maecenas quis facilisis elit, tincidunt faucibus justo. In hac habitasse platea dictumst. Sed accumsan turpis ligula. Sed sit amet pretium eros.</p>
		
		<p>Duis eget ullamcorper nisl. Morbi aliquam fermentum mauris, et interdum quam malesuada a. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Ut ut nisl a lorem consectetur aliquam. Maecenas id molestie urna, sit amet volutpat lectus. Fusce pulvinar, tellus eu bibendum convallis, massa nibh scelerisque tortor, sed blandit eros tortor eget enim. Morbi justo dolor, molestie ac rutrum vel, feugiat non turpis. Nulla gravida sed dui et interdum. Integer mi libero, aliquet et lorem ac, laoreet interdum nunc.</p>
		
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