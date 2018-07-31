<?php
try
	{
	$db = new PDO("mysql:host=localhost;dbname=hero", "root", "");
	$db->beginTransaction();
	$anz = $db->query("Select nr from hero where nr=(Select Max(nr)from hero)");
	$res = $anz->fetch();
	$nr = $res[0] + 1;
	$bez = $_POST['bez'];
	$Weapon = $_POST['Weapon'];
	$Assist = $_POST['Assist'];
	$Special = $_POST['Special'];
	$ASkill = $_POST['ASkill'];
	$BSkill = $_POST['BSkill'];
	$CSkill = $_POST['CSkill'];
	$SS = $_POST['SS'];
	$REF = $_POST['REF'];
	$sql = $db->prepare("INSERT into hero VALUES ('$bez','$Weapon','$Assist','$Special','$ASkill','$BSkill','$CSkill','$SS','$REF',$nr)");
	if ($sql->execute())
		{
		echo "Erfolgreich!";
		}

	$db->commit();
	$db = null;
	}

catch(PDOException $e)
	{
	print "Error!: " . $e->getMessage() . "<br/>";
	die();
	}

?>