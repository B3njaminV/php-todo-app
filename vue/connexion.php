<!DOCTYPE html>
<html>
<head>
	<title>Connection</title>
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
		
		<form method="post"  action="">
			<div style="font-size: 20px;margin: 10px;color: white;">Connexion</div>

			<input id="text" type="text" name="user_name" placeholder="Pseudo"><br><br>
			<input id="text" type="password" name="password" placeholder="Mot de Passe"<br><br><br><br>
            <input type="hidden" name="actionM" value="connexion">
            <input id="button" type="submit" value="Login">
        </form>
	</div>
</body>
</html>