<?php
ob_start();
session_start();
include("db_config.php");
if (!$_SESSION["username"]){
header('Location:login.php?msg=1');
}
ini_set('display_errors', 1);

/// Upload do arquivo ///
if(isset($_POST["submit"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  if ($uploadOk == 0) {
    echo "O arquivo não foi enviado.";
  // if everything is ok, try to upload file
  } else {
    // Allow certain file formats
      /*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Somente arquivos JPG, JPEG, PNG & GIF são permitidos.";
        $uploadOk = 0;
      }else{ */
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
          echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " foi enviado com sucesso.";
        } else {
          echo "O arquivo não foi enviado.";
        }
      //}


  }
}
?>

<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>Home SENAI</title>
  <link href="css/htmlstyles.css" rel="stylesheet">

  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

  <body>
  <div class="container-narrow">

		<div class="jumbotron">
			<p class="lead" style="color:white">
				Bem vindo <?php echo $_SESSION["username"]; ?>!! Você está autenticado!</a>
			</p>
        </div>
        <div>
          <div>
        <p><h4>Perfil</p></h4>
        Nome: <?php echo $_SESSION["username"]; ?><br>
        <img src="avatar.jpg" height="200px" width="200px"><br>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="file" name="fileToUpload" id="fileToUpload"><br>
            <input type="submit" value="Enviar imagem" name="submit">
         </form>
       </div>
	  <div class="footer">
		<p><h4><a href="logout.php">Sair</a><h4> </p>
      </div>

	  <div class="footer">
		<p>SENAI | @Peterfilho</p>
      </div>

	</div>
  <!-- /container -->
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
