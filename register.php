<?php
	session_start();
if (!isset($_POST['email']))
	{
		header('Location:menureg.php');
		exit();
	}
	else
	{
		header('Location:menureg.php');
		$Validation = true;
		//sprawdz poprawność loginu
		$login_register = $_POST['login_register'];
		//sprawdzenie dlugosci loginu
		if(strlen($login_register)<3 || (strlen($login_register)>20))
		{
			$Validation=false;
			$_SESSION['e_login_register'] = "Nick musi posiadać od 3 do 20 znaków!";	
		}
		
		if(ctype_alnum($login_register)==false)
		{
			$Validation=false;
			$_SESSION['e_login_register']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		//poprawność adresu email
		$email=$_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$Validation = false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		//poprawność hasła
		$password_register=$_POST['password_register'];
		$pass_replay=$_POST['pass_replay'];
		if(!preg_match('/[A-Z]/', $password_register) ||(!preg_match('/[0-9]/', $password_register)))
		{
			$Validation=false;
			$_SESSION['e_password']="Hasło musi zawierać dużą literę i cyfrę!";
		}
		if(strlen($password_register)<6 || (strlen($password_register)>25))
		{
			$Validation=false;
			$_SESSION['e_password']="Hasło musi posiadać od 6 do 25 znaków!";
		}
		
		if($password_register!=$pass_replay)
		{
			$Validation=false;
			$_SESSION['e_replay']="Hasła muszą być takie same!";
		}
		
		$haslo_hash = password_hash($password_register, PASSWORD_DEFAULT);
		
		//checkbox regulamin
		if(!isset($_POST['regulamin']))
		{
			$Validation=false;
			$_SESSION['e_regulamin']="Akceptuj regulamin!";
		}
		
		//re-captcha
		$key="6LcYVascAAAAAFHlfEea6FaaG90NriK7VhA4qjwh";
		$check = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$key.'&response='.$_POST['g-recaptcha-response']);
		
		$ans = json_decode($check);
		
		if($ans->success==false)
		{
			$Validation=false;
			$_SESSION['e_bot']="Potwierdz, że nie jesteś robotem!";
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
				//email istnieje ?
				$rezultat = $conn->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				if(!$rezultat)throw new Exception($conn->error);
				$ile_maili = $rezultat->num_rows;
				if($ile_maili>0)
					{
					$Validation=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail";
					}
				
				//Login istnieje ?
				$rezultat = $conn->query("SELECT id FROM uzytkownicy WHERE user='$login_register'");
				if(!$rezultat)throw new Exception($conn->error);
				$ile_loginow = $rezultat->num_rows;
				if($ile_loginow > 0)
					{
					$Validation=false;
					$_SESSION['e_login_register']="Istnieje już konto z takim loginem!";
					}
				
				if($Validation==true)
					{
					//Wszystkie testy zaliczone, dodaj gracza do bazy
						if($conn->query("INSERT INTO uzytkownicy VALUES (NULL,'$login_register','$haslo_hash','$email',100,100,100,14)"))
						{
							$_SESSION['udanarejestracja']="Dziękujemy za rejestracje teraz możesz się zalogować!";
							
							$header = "From: patrykstaniewski1910@gmail.com \nContent-Type:".
							' text/plain;charset="UTF-8"'.
							"\nContent-Transfer-Encoding: 8bit";
						   $to = "$mail";
						   $subject = "Wiadomość testowa";
						   $message = "Witaj to wiadomość testowa";
						   mail($to, $subject, $message, $header);
						}
						else
						{
							throw new Exception($conn->error);
						}
					
					}	
					
			$conn->close();
			}
			
		}
	catch(Exception $e)
		{
			echo '<div class="error">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</div>';
			echo'<br/> Informacja developerska: '.$e;
		}	
	}
	

?>