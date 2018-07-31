	<?PHP

		try{
		$db=new PDO("mysql:host=localhost;dbname=hero","root","");
		$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
		$zeile = $_POST['zeile'];
		$data=$db->prepare("SELECT * FROM hero ORDER BY `$zeile`");
		$data->execute();
		
			while($r=$data->fetch(PDO::FETCH_ASSOC))
			{
				echo "<tr>";
				echo "<td>" . $r['nr'] . "</td>";
				echo "<td>" . $r['bez'] . "</td>";
				echo "<td>" . $r['Weapon'] . "</td>";
				echo "<td>" . $r['Assist'] . "</td>";
				echo "<td>" . $r['Special'] . "</td>";
				echo "<td>" . $r['ASkill'] . "</td>";
				echo "<td>" . $r['BSkill'] . "</td>";
				echo "<td>" . $r['CSkill'] . "</td>";
				echo "<td>" . $r['SS'] . "</td>";
				echo "<td>" . $r['REF'] . "</td>";
				echo "</tr>";
			}
		}
		catch(PDOException $e)
		{
			echo $e ->getMessage();
			die();
		}
		
		
	?>