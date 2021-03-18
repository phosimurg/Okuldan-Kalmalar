<?php 

	session_start();
	ob_start();

	try 

	{
		
		$db=new PDO("mysql:host=localhost; dbname=blogodev; charset=utf8;","root","");

	}

	 catch (PDOException $error) 
	{
		echo "Veritabanına Bağlanılamadı.."; 
		$error->getMessage();
		die;
	}





?>