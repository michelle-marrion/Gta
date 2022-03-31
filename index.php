<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="index.css"> -->
        <script rel="stylesheet" type="text/css" href="bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
      <script rel="stylesheet" type="text/css" src="bootstrap-3.3.7/dist/js/jquery-3.4.1.min.js"></script>
      <script rel="stylesheet" type="text/css" src="bootstrap-3.3.7/dist/js/jquery-3.4.1.js"></script>
</head>


<style type="text/css">
	  form
  {
    width: 50px;
    top: 35%;
    padding:10px 30px;
    left:40%;
    position: absolute;
    text-transform:translate(-20% 50% );
    box-sizing:border-box;

  }
  fieldset{
  border: none;
  margin-left: -20px;

}
input[type="password"],input[type="text"], {
  border:none;
border-bottom: 1px solid #fff ;
background:transparent
/*height: 300px;*/
color:#000;
font-size: 16px;
/*width: 235px;*/
margin-bottom: 20px;
border-radius: 6px;
}
input[type="submit"]{
margin: 15px;
color: #fff;
background-color:#254AA2 ;
border-radius: 15px;
border: none;
width: 150px;
height: 34px;
margin-left:60px; 
font-size: 1.5em;
}
input[type="submit"]:hover{
  background-color: rgb(240,13,29);
  color: #fff;
  font-family: 

}
a{
  text-decoration: none;
padding: 10px 0px 20px ;
  color:#254AA2;
}
a:hover{
  color: red;
}
a:active{
  color: red;
}
a{
  text-decoration:none;
}
.box
{
  width: 280px;
height:370px;

}
fieldset
{
  background: green;
}
</style>

<body style="background-color: #CBD2EC;">
	<form class="container" method="Post" action="Controller/auth.php">
		<div class="box">
		<fieldset style="border: 0px solid;box-shadow: 10px;background-color:#f5f7f9;border-radius: 10px" class="shadow-sm p-3 mb-5 bg-white">
			<div style="padding: 10px;">
				<legend style="background-color: #254AA2;border: 0px solid wheat;border-radius: 10px 10px 0px 0px;color: white;font-family: 'Constantia'; text-align: center;">
					Se connecter
				</legend>
				<div class="form-group">
					<label for="matricule">Mail</label>
					<input type="text" name="mail" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="password">Mot de Passe</label>
					<input type="password" name="password" class="form-control" required >
				</div>
				<div style="color: red; font-weight: bold; font-size:1.3em; text-align: center;">
				<?php
		echo @$_GET['message'] ;
		
	?>				
				<div>
					<input type="submit" value="login "name="">
				</div>
				<div>
					<a href="forget your password ">forget your password?<a/><br/>
	  				<a href="createCompte.html"> Create an account<a/>
				</div>
			</div>
		</fieldset>
	</div>
	</form>
<?php include_once('Vue/footer.php');?>

</body>
</html>
