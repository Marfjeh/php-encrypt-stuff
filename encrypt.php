<?php
/*
* This is a Little Php file to help for checking if a password matches a hash or to generate a hash. i needed this for a old cms system for reverse engeneering the system.
* I know crypt are not the best thing to use, or md5. The system was build at the time when md5 was considered safe for using for encrypting passwords. ikr? crazy.
* this tool is just make things easy for me.
* @author Marvin Ferwerda
* @version 0.1
*/

if (isset($_POST['hash']) == true) {
  if (password_verify($_POST['password'], $_POST['hash']) == true) {
    alert("Password matches!");
  }
  else {
    alert("Password did not match!");
  }
}

if (isset($_POST['password_hash']) == true) {
  alert(crypt($_POST['password_hash'], (string)$_POST['Salt']));
}

if(isset($_POST['md5_string']) == true) {
  if (md5($_POST['md5_string']) == $_POST['md5_hash']) {
    alert("Md5 matches!");
  }
  else {
    alert("Md5 does not match.");
  }
}

if(isset($_POST['md5_text']) == true) {
  alert(md5($_POST['md5_text']));
}



function alert(string $message) {
  echo "<script type='text/javascript'>alert('$message');</script>";
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Php Password tool</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <style>

      body{
			margin: 0 auto;
			font-family: 'Roboto', sans-serif;
			text-align: center;
			background: #F1F1F1;
		  }
      a {
			font-size: 8px;
		  }
		 .header {
      box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
      color: white;
			font-size: 32px;
			width: 100%;
			background: #26A69A;
			padding-top: 5px;
			padding-bottom: 5px;
		}
    .page {
      border-radius: 2px 2px 0px 0px; /*  >inb4 OCD */
      margin: auto;
      width: 50%;
      margin-top: 50px;
      border: 1px solid #E8E8E8;
      background: white;
    }
    .title {
      color: white;
      padding: 5px;
      font-weight: bold;
      border-radius: 2px 2px 0px 0px;
      background: #26A69A;
      width: auto;
    }
    .content {
      padding: 10px;
    }

    </style>
  </head>
  <body>
    <div class="header"> Marf's Php encryption tool </div>

    <div class="page">
        <div class="title">Password Hash checker ( password_verify(); )</div>
        <div class="content">
          <form class="hash_check" action="" method="post">
            <label for="hash">Password Hash: </label>
            <input type="text" name="hash" value="" required>
            <label for="password">Password: </label>
            <input type="password" name="password" value="" required>
            <button class="btn waves-effect waves-light" type="submit" name="action">Check</button>
          </form>
        </div>
    </div>

    <div class="page">
        <div class="title">Password Hash Generator ( crypt(); )</div>
        <div class="content">
          <form class="hash_check" action="" method="post">
            <label for="hash">Password: </label>
            <input type="password" name="password_hash" value="" required>
            <label for="Salt">Salt: </label>
            <input type="password" name="Salt" value="">
            <button class="btn waves-effect waves-light" type="submit" name="action">Generate </button>
          </form>
        </div>
    </div>
    <div class="page">
        <div class="title">Md5 Hash matcher</div>
        <div class="content">
          <form class="hash_check" action="" method="post">
            <label for="hash">Md5 Hash: </label>
            <input type="text" name="md5_hash" value="" required>
            <label for="password">Md5 String: </label>
            <input type="text" name="md5_string" value="" required id="md5_string">
            <button class="btn waves-effect waves-light" type="submit" name="action">Check</button>
            <button class="btn waves-effect waves-light" onclick="document.getElementById('md5_string').type = 'password';" name="action">Hide Md5_String</button>
          </form>
        </div>
    </div>

    <div class="page">
        <div class="title">Md5ifyer</div>
        <div class="content">
          <form class="hash_check" action="" method="post">
            <label for="hash">Text: </label>
            <input type="text" name="md5_text" value="" required>
            <button class="btn waves-effect waves-light" type="submit" name="action">Md5ify</button>
          </form>
        </div>
    </div>

  </body>
</html>
