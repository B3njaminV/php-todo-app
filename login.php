<?php 

session_start();

	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];


		if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
		{

            $query = "select * from utilisateur where user_name = '$user_name' limit 1";
			$con->executeQuery($query);
            $result=$con->getResults();

			if($result) {
                if ($result[0]['password'] == $password) {
                }
                    header("location:page.php");
                    die;
             }
		}else
		{
			echo "wrong username or password!";
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	#text{

		height: 25px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		width: 100%;
	}

	#button{

		padding: 10px;
		width: 100px;
		color: white;
		background-color: lightblue;
		border: none;
	}

	#box{

		background-color: grey;
		margin: auto;
		width: 300px;
		padding: 20px;
	}

	</style>

	<div id="box">
		
		<form method="post">
			<div style="font-size: 20px;margin: 10px;color: white;">Login</div>

			<input id="text" type="text" name="user_name"><br><br>
			<input id="text" type="password" name="password"><br><br>

			<input id="button" type="submit" value="Login"><br><br>
		</form>
	</div>
</body>
</html>