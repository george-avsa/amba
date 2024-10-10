<?php 
require_once '../db/db.php';
require_once('../mail/phpmailer/PHPMailerAutoload.php');
if(isset($_POST['get_code'])){

	$mail = new PHPMailer;
	$mail->CharSet = 'utf-8';

	$id = $_POST['user_id'];
	$email = $_POST['user_email'];

	$usersId = R::findAll('users', "unical_id = ?", array($id));
	$usersMail = R::findAll('users', "email = ?", array($email));
	$ID_check1 = '';
	$ID_check2 = '';
	foreach ($usersId as $key => $bean) {
	  $ID_check1 = $bean->id;}
	foreach ($usersMail as $key => $bean) {
	  $ID_check2 = $bean->id;}

	if ($ID_check1 == $ID_check2) {
  
//------------------------------------------------------------------------------------------------------------------Sending Settings
	$mail->isSMTP();                // Set mailer to use SMTP
	$mail->Host = 'smtp.timeweb.ru';  																							
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'boss@ambassa.ru'; // email name(FROM)
	$mail->Password = 'Klimklim25112000'; // email password(FROM)
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров
	$mail->setFrom('boss@ambassa.ru'); // email name(FROM)
	$mail->addAddress($email);     // email(TO) 
	$mail->isHTML(true);

	$mail->Subject = 'Письмо от Amba';
	//----------------------------------------------------------------------------------------------------Give new password to user

	$password = rand(100000, 999999);	
	$usersArr = R::findAll('users', "unical_id = ?", array($id));
	foreach ($usersArr as $key => $bean) {
 	$id = $bean->id;
	R::exec('UPDATE `users` SET `password` = :password WHERE id = :id', [
	  'id' => $id,
	  'password' => password_hash($password, PASSWORD_DEFAULT)
	]);


 	}

	$mail->Body = "Ваш новый пароль ".$password."";
	$mail->AltBody = '';

	if(!$mail->send()) {
		echo '<h2><script>alert("Введены некорректные данные");</script></h2>';

	} else {
	    header('location: http://ambassa.ru/pages/login.php');
	}

}else{
  if (count($usersId) == 0){
  	echo '<h2><script>alert("Такого ID не существует.");</script></h2>';
  	exit(0);
  }
  if (count($usersMail) == 0){
  	echo '<h2><script>alert("Такая электронная почта не зарегистрирована.");</script></h2>';
  	exit(1);
  }
 }
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>amba</title>
	<link rel="stylesheet" type="text/css" href="../css/style/recover_style.css">
	<link rel="stylesheet" type="text/css" href="../css/media/recover_media.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <style>
	  ::-webkit-input-placeholder {color:#696D86; opacity:1;}/* webkit */
	  ::-moz-placeholder          {color:#696D86; opacity:1;}/* Firefox 19+ */
	  :-moz-placeholder           {color:#696D86; opacity:1;}/* Firefox 18- */
	  :-ms-input-placeholder      {color:#696D86; opacity:1;}/* IE */
	</style>
</head>
<body>
	<div id="wrapper">
		<div id="iphone11">
			<div id="content">
				<div id="header">
					<a href="login.php">
						<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_logo">
							<path d="M13.5 0C6.01364 0 0 6.01364 0 13.5C0 20.9864 6.01364 27 13.5 27C20.9864 27 27 20.9864 27 13.5C27 6.01364 20.9864 0 13.5 0ZM21.4773 14.1136C21.4773 14.4818 21.2318 14.7273 20.8636 14.7273H10.6773C10.4318 14.7273 10.2477 15.0341 10.4318 15.2795L12.8864 17.7341C13.1318 17.9795 13.1318 18.3477 12.8864 18.5932L12.0273 19.4523C11.9045 19.575 11.7818 19.6364 11.5977 19.6364C11.4136 19.6364 11.2909 19.575 11.1682 19.4523L5.64545 13.9295C5.58409 13.8068 5.52273 13.6841 5.52273 13.5C5.52273 13.3159 5.58409 13.1932 5.70682 13.0705L11.2295 7.54773C11.3523 7.425 11.475 7.36364 11.6591 7.36364C11.8432 7.36364 11.9659 7.425 12.0886 7.54773L12.9477 8.40682C13.1932 8.65227 13.1932 9.02046 12.9477 9.26591L10.4932 11.7205C10.3091 11.9045 10.4318 12.2727 10.7386 12.2727H20.8636C21.2318 12.2727 21.4773 12.5182 21.4773 12.8864V14.1136Z" fill="#DDDDDD"/>
						</svg>

					</a>
					<div id="font">
						<font class="header_amba">Восстановление пароля</font>
					</div>
				</div>
				<div id="space1"></div>
				<div id="forms_middle">
					<form id="forms" action="recover_check.php" method="POST">
						<input type="text" size="26" maxlength="26" placeholder="ID" name="user_id" id='user_id'> 
						<input type="text" size="26" maxlength="26" placeholder="Почта" name="user_email" id='user_email'>
						<div id="space" style="height: 40%;"></div>
						<div id="button">
						<input type="submit" id="vhodbut" value="Получить код" name="get_code">
						</div>					
					</form>
				</div>
			</div>
		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="http://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
<script src="../js/recover_check_form_error.js"></script>

</body>
</html>
