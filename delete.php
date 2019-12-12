<?php
	require_once "dbcon.php";
	// require_once "auth.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>delete</title>
</head>
<body>
	<?php
	if(isset($_GET['id']) && !empty($_GET['id']))
	{
		$id = $_GET['id'];
		$query = "DELETE FROM users WHERE id= :id";
		$stmt = $pdo->prepare($query);
		$stmt->bindParam(':id',$id);
		$stmt->execute();
		echo '<h2>RECORD DELETED :)</h2>';
	} else {
		echo '<h2>NO RECORD SPECIFIED TO DELETE :(</h2>';
	}
	echo '<a href="index.php">View Records </a>';
	?>
</body>
</html>