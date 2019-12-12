<?php
	require_once "dbcon.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>lab2</title>
</head>
<body>
	<!-- <h1><center><marquee>hello</marquee></center></h1> -->
	<?php
		$query="SELECT * FROM users";
		$stmt=$pdo->prepare($query);
		$stmt->execute();
		$users=$stmt->fetchAll(); 
		// print_r($users);
	?>
	<!-- <a href="add.php">Add New Record</a> -->
	<!-- <a href=""></a> -->

	<table border="1" align="center">
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Action</th>
		</tr>
	
	<?php foreach ($users as $row) { ?>

	<tr>
		<td><?php echo $row['fullname']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td>
			<a href="delete.php?id=<?php echo $row['id'];?>">Delete</a>
			<a href="update.php?id=<?php echo $row['id']; ?>">Update</a>
		</td>
		<!-- </td> -->
	</tr>
<?php } ?>
</table>

</body>
</html>