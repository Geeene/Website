<?PHP

try{
$db=new PDO("mysql:host=localhost;dbname=galgenmaenchen","root","");
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$nr = $_POST['nummer'];
$data=$db->prepare("SELECT wort FROM Wort WHERE `nr`=$nr ");
$data->execute();
while($r=$data->fetch(PDO::FETCH_ASSOC))
	echo $r['wort'];
}
catch(PDOException $e)
{
	echo $e ->getMessage();
	die();
}


?>