<?php

try{
	$bd = new PDO('mysql::host=localhost;dbname=phpdb','root','');
	$bd->query('SET NAMES utf8');
  	$bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
   	// On termine le script en affichant le n de l'erreur ainsi que le message 
    die('<p> La connexion a échoué. Erreur[' .$e->getCode().'] : ' .$e->getMessage() . '</p>');
}
