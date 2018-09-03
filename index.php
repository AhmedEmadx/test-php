<?php
require_once 'core/init.php';

if(Input::exists()) {
	if(Token::check(Input::get('token'))) {
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'firstname' => array(
				'required' 	=> true,
				'escape' 	=> true,
				'min' 		=> 2,
				'max' 		=> 20,
				'unique' 	=> 'users'
			),
			'lastname' => array(
				'required' 	=> true,
				'escape' 	=> true,
				'min' 		=> 2,
				'max' 		=> 50
				'unique' 	=> 'users'
			),
			'email' => array(
				'required' => true,
				'escape' => true,
				'email' => true,
				'unique' => 'users'
			),
			'password' => array(
				'required' 	=> true,
				'min' 		=>2
			),
			'passagain' => array(
				'required' 	=> true,
				'matches' 	=> 'password'
			)
		));

		if($validation->passed()) {
			$user = new User();

			$salt = Hash::salt(32);

			try {
				$user->create(array(
					'firstname' 	=> Input::get('username'),
					'password' 	=> Hash::make(Input::get('password'), $salt),
					'email' 	=> urldecode(Input::get('email')),
					'email_code'=> Input::get('email_code'),
					'salt' 		=> $salt,
					'lastname' 		=> Input::get('lastname')
				));

				$from = 'info@test.php.com';
				$name = 'Test';
				$to = Input::get('email');
				$subject = 'Test Email verification';
				$body = 'Hello, <strong>'.Input::get('name').'</strong>,
				<br><br>
				We need to make sure you are human. Please verify your email and get started using your Website account.
				<br><br>
				<center><a href="'. Config::get('url/home') .'activate.php?email='.urldecode(Input::get('email')).'&email_code='.Input::get('email_code').'">Click here to activate your account!</a></center>
				<br><br>
				Thank you very much';
				
				User::sendEmail($from, $name, $to, $subject, $body);

				Session::flash('info', 'You have been registered, Please activate your account now!');
				Redirect::to('./');

			} catch(Exception $e) {
				die($e->getMessage());
			}
		} else {
			$regErrors = array();
			foreach ($validation->errors() as $error) {
				$regErrors[] = $error;
			}
		}
	}
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
					<button type="submit" id="button">sign up</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>