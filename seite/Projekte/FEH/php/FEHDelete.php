<?php 
try
	{
	$db = new PDO("mysql:host=localhost;dbname=hero", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
	}

catch(PDOException $e)
	{
	echo $e->getMessage();
	die();
	}

$db->beginTransaction();
$HNR = $_POST['DEL_HERO'];

if ($db->exec("DELETE FROM `hero` WHERE `nr`=$HNR"))
	{
	$db->commit();
	echo "erfolgreich gelöscht!";
	}
  else
	{
	echo "Es gibt keinen Eintrag mit dieser Nummer!";
	}

$db = null;
?>
