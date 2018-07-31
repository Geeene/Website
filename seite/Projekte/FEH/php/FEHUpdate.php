	<?PHP
		try{
		$db=new PDO("mysql:host=localhost;dbname=hero","root","");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);


			$spalte=$_POST['CH'];
			$CHW=$_POST['CH_WERT'];
			$HNR=$_POST['CH_HERO'];
			if($db->exec("UPDATE `hero` SET `$spalte`='$CHW' where `nr`='$HNR'"));
				{
				echo "Erfolgreich!";
				}
			$db=null;
		}
		catch(PDOException $e)
		{
			echo $e ->getMessage();
			die();
		}
?>
			