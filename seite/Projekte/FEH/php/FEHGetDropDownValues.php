	<?PHP

		try{
		$db=new PDO("mysql:host=localhost;dbname=hero","root","");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$zeile=$_POST["zeile"];
		$data=$db->prepare("SELECT Bez FROM `$zeile`");
		$data->execute();
		echo "<option selected>".$zeile."</option>";
		while($r=$data->fetch(PDO::FETCH_ASSOC))
		{
			echo "<option>" . $r['Bez'] . "</option>";
		}
		}
		catch(PDOException $e)
		{
			echo $e ->getMessage();
			die();
		}
		
		
	?>