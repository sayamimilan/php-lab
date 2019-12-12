<?php
	require_once "dbcon.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>update the list</title>
</head>
<body>
	<a href="index.php">view records</a>
	<?php
		if($_SERVER['REQUEST_METHOD']=='POST')
		{
			$id = $_POST['id'];
			$name=$_POST['txtname'];
			$email=$_POST['txtemail'];
			$pass=$_POST['txtpassword'];
			$password=md5($pass);
			if($pass == ''){
				$query="UPDATE users SET fullname=:name, email=:email WHERE id=:id";
			}
			else{
				$query="UPDATE users SET fullname=:name, email=:email password=:pwd WHERE id=:id";
			}

			$stmt=$pdo->prepare($query);
			$stmt->bindParam(':id',$id);
			$stmt->bindParam(':name',$name);
			$stmt->bindParam(':email',$email);
			// echo $query;
			if($pass!='')
			{
				$stmt->bindParam(':pwd',$password);
			}	
			$stmt->execute();
			echo '<h2>User Updated Successfully</h2>';
		}else
		{
			if(isset($_GET['id']) && !empty($_GET['id']))
			{
				$id=$_GET['id'];
				$query="SELECT fullname, email FROM users WHERE id=:id";
				$stmt=$pdo->prepare($query);
				$stmt->bindParam(':id',$id);
				$stmt->execute();
				$row=$stmt->fetch();
				if(!$row)
				{
					echo '<h2> No User found with given id </h2>';
				}
			
				else
				{
	?>
					<form id="myform" name="myform" method="post" action="update.php?id=<?php echo $id;?>">
						<input type="hidden" name="id" value="<?php echo $id;?>"/>
						<h3>update records</h3>
						<table>
							<tr>
								<td>Name</td>
								<td><input type="text" id="txtname" name="txtname" value="<?php echo $row['fullname'];?>"/></td>
							</tr>

							<tr>
								<td>Email</td>
								<td><input type="text" id="txtemail" name="txtemail" value="<?php echo $row['email'];?>"/></td>
							</tr>
						
							<tr>
								<td>Password</td>
								<td>
									<input type="password" id="txtpassword" name="txtpassword"/> Leave blank to use existing.
								</td>
							</tr>

							<tr>
								<td>&nbsp;</td>
								<td><input type="submit"/></td>
							</tr>

						</table>
					
					</form>
					<?php
				}//else part of NO RECORD FOUND ends
			}
			else
			{
				echo '<h2>No record specified to update.</h2>';
			}
	}
	?>
</body>
</html>