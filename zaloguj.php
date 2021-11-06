<?php
	session_start();
	if((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
	{
		header('Location:menureg.php');
		exit();
	}
	else
	{
		
		$Validation=true;
		//sprawdz re-captcha
		$key="6LcYVascAAAAAFHlfEea6FaaG90NriK7VhA4qjwh";
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$key.'&response='.$_POST['g-recaptcha-response']);
		$ans = json_decode($check);
		if($ans->success==false)
		{
			$Validation=false;
			$_SESSION['e_bot_login']='<span class="error">Potwierdz, że nie jesteś robotem!<span>';
			header('Location:menureg.php');
			exit();
		}
	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
		
	try 
	{
		$conn = new mysqli($host, $db_user, $db_pass, $db_name);
		if($conn->connect_errno!=0)

		{
			throw new Exception(mysqli_connect_errno());
		}
		else
		{

		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		
		$login = htmlentities($login, ENT_QUOTES, "UTF-8");
		
		if(($Validation == true) and ($rezultat = $conn->query(sprintf("SELECT * FROM uzytkownicy WHERE user='%s'",mysqli_real_escape_string($conn,$login)))))
			{
			$ilu_users = $rezultat->num_rows;
			if($ilu_users>0)
				{
					$wiersz=$rezultat->fetch_assoc();
					if(password_verify($haslo,$wiersz['pass']))
					{
						$_SESSION['zalogowany'] = true;
						$_SESSION['user'] = $wiersz['user'];
						$_SESSION['email'] = $wiersz['email'];
						unset($_SESSION['blad']);
						$rezultat->free();

						header('Location: index.php');
					}
					else
					{
						$_SESSION['blad']='<span class="error"> Nieprawidłowy login lub hasło!</span>';
						header('location: menureg.php');
					}
				}
			else
				{
					$_SESSION['blad']='<span class="error"> Nieprawidłowy login lub hasło!</span>';
					header('location: menureg.php');
				}
				if($ans->success==false)
				{
					$Validation=false;
					$_SESSION['blad']= '<span class="error"> Potwierdz, że nie jesteś robotem!</span>';
					header('location:menureg.php');
				}
				else
				{
					throw new Exception($polaczenie->error);
				}
			}
			
			
			
			
		
		$conn->close();
		}
	}	
	catch(Exception $e)
	{
		echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o wizytę w innym terminie!</span>';
		echo '<br />Informacja developerska: '.$e;
	}
}
?>