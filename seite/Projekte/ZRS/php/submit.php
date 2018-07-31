
	<?PHP
		try {
		$db=new PDO("mysql:host=localhost;dbname=zrs","root","");
			
		
		$db->beginTransaction();
			$anz=$db->query("Select Nr from zrs where Nr=(Select Max(Nr)from ZRS)");
			$res=$anz->fetch();
		
			$Nr=$res[0]+1;
			$name=$_REQUEST['name'];
			$versuche=$_REQUEST['versuche'];

			
			$db->exec("INSERT into zrs VALUES ('$name',$versuche,$Nr)");
			$db->commit();
			$db=null;
		}
		catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}
	?>
