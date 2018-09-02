<?php
   if( $_POST["firestname"] || $_POST["lastname"] || $_POST["email"] || $_POST["password"] || $_POST["passagain"] || $_POST["man-woman"]) {
      if (preg_match("/[^A-Za-z'-]/",$_POST['name'] )) {
         die ("invalid name and name should be alpha");
      }
      echo "Welcome ". $_POST['name']. "<br />";
      echo "You are ". $_POST['age']. " years old.";
      
      exit();
   }
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'includes/head.inc.php'; ?>
	<title>firest php project</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<form action="" method = "POST" class="text-center" role="form">
					<label>
						<input type="text" name="firstname" id="firstname" placeholder="First name">
					</label><br>
					<label>
						<input type="text" name="lastname"
						id="lastname" placeholder="Last name">
					</label><br>
					<label>
						<input type="email" name="email" id="email" placeholder="Email">
					</label><br>
					<label>
						<input type="password" name="password"
						id="password" placeholder="Password">
					</label><br>
					<label>
						<input type="password" name="passagain"
						id="passagain" placeholder="Password (again)">
					</label><br>
					<label>
                       <input type="radio" name="man-woman" id="man">man
            	    </label>
                    <label>
                       <input type="radio" name="man-woman" id="woman">woman
                    </label><br>
					<button type="submit" id="button">sign up</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>