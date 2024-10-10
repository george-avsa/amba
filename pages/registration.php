
<?php 
	require_once '../db/db.php';

	$data = $_POST;
	if(isset($data['regisration_btn']))
	{
		$errors = array();
		if (trim($data['name']) == '')
		{
			$errors[] = 'Input name!';
		}
		//---------------------------------------------------------------------------
		if (trim($data['last_name']) == '')
		{
			$errors[] = 'Input last_name!';
		}
		//---------------------------------------------------------------------------
		if (trim($data['birthday']) == '')
		{
			$errors[] = 'Input birthday!';
		}
		if ($data['password'] == '')
		{
			$errors[] = 'Input password!';
		}
		//---------------------------------------------------------------------------
		if ($data['password_check'] != $data['password'])
		{
			$errors[] = 'Passwords don`t match!';
		}
		//---------------------------------------------------------------------------
		if (trim($data['city']) == '')
		{
			$errors[] = 'Input city!';
		}
		//---------------------------------------------------------------------------
		if (trim($data['phone']) == '')
		{
			$errors[] = 'Input phone!';
		}
		//---------------------------------------------------------------------------
		if (trim($data['email']) == '')
		{
			$errors[] = 'Input email!';
		}
		//---------------------------------------------------------------------------
		$user_promocode = trim($data['promocode']) ;

		if ( R::count('users', "login = ?", array($data['login'])) > 0)
		{
			$errors[] = 'User with this login already exist';
		}
		//---------------------------------------------------------------------------
		if ( R::count('users', "email = ?", array($data['email'])) > 0)
		{
			$errors[] = 'User with this email already exist';
		}
		//---------------------------------------------------------------------------
		if ( empty($errors)) {

			$user = R::dispense('users');
			
			$unical_id = rand(100000, 999999);
			$all_users_arr = R::findAll('users', "unical_id = ?", array($unical_id));

			while (count($all_users_arr) != 0) {
			$unical_id = rand(100000, 999999);
			$all_users_arr = R::findAll('users', "unical_id = ?", array($unical_id));
			}
			$user->unical_id = $unical_id;
			$user->name = $data['name'];
			$user->last_name = $data['last_name'];
			$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
			$user->email = $data['email'];
			$user->phone = $data['phone'];
			$user->birthday = $data['birthday'];
			$user->city = $data['city'];
			$user->promocode = $data['promocode'];

			R::store($user);

			if($data['promocode'] == '5555') $rang = 'pro';
			if($data['promocode'] == '4444') $rang = 'pro';
			if($data['promocode'] == '3333') $rang = 'intermediate';
			if($data['promocode'] == '2222') $rang = 'intermediate';
			if($data['promocode'] == '1111') $rang = 'beginner';
			if($data['promocode'] == '0000') $rang = 'beginner';

			$cash = R::dispense('useracc');
			$cash->unical_id = $unical_id;
			$cash->coins = 0;
			$cash->user_acc_rang = $rang;
			R::store($cash);
			
			echo '<h3>You have been successfully registred, ID has been sent on mail</h3>';

		} else
		{
			foreach ($errors as $iter) {
				//echo '<div style="color:red;">'.$iter.'</div><hr><br>';
			}
		}
	}
?>

<?php
require_once('../mail/phpmailer/PHPMailerAutoload.php');
if(isset($_POST['regisration_btn'])){

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';
$email = $_POST['email'];

$user = R::findOne('users', 'email = ?', array($email));

if (true) {
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
	$mail->Body = "Ваш ID ".$user->unical_id.""." в системе Амба";
	$mail->AltBody = '';

	if(!$mail->send()) {
	    //echo '<h2>Возникла техническая ошибка(вероятно введены некорректные данные)</h2>';
	    //echo "<h2>Пожалуйста проверьте <a href='index.php'>введённые данные</a>.<h2>";
	} else {
	    echo "<script type='text/javascript'>location='http://ambassa.ru/pages/login.php';</script>";
	}

}else{
  if (count($usersId) == 0){
  	echo "This ID doesn`t exist";
  	exit(0);
  }
  if (count($usersMail) == 0){
  	echo "This Mail doesn`t exist";
  	exit(1);
  }
 }
}

?>
<!DOCTYPE html>
<html>
<head>
	 <style>
	  ::-webkit-input-placeholder {color:#696D86; opacity:1;}/* webkit */
	  ::-moz-placeholder          {color:#696D86; opacity:1;}/* Firefox 19+ */
	  :-moz-placeholder           {color:#696D86; opacity:1;}/* Firefox 18- */
	  :-ms-input-placeholder      {color:#696D86; opacity:1;}/* IE */
	</style>
	<title>amba</title>
	<link rel="stylesheet" type="text/css" href="../css/style/registration_style.css">
	<link rel="stylesheet" type="text/css" href="../css/media/registration_media.css">
	<link rel="stylesheet" type="text/css" href="../css/style/popups/popups_style.css">
	<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">
	<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'></script>
</head>
<body>
	<div id="wrapper">
		<div id="iphone11">
			<div id="content">
				<div id="header">
					<div id="logo">
						<img src="../images/minilogo.png" class="logo">
					</div>
				</div>
				<form id="forms" action="registration.php" method="POST" autocomplete="off">
					<input type="text" size="26" maxlength="26" placeholder="Имя" name="name" value="<?php echo @$data['name']; ?>" id="name"> 
					<input type="text" size="26" maxlength="26" placeholder="Фамилия" name="last_name" value="<?php echo @$data['last_name']; ?>" id="last_name">
					<input type="text" size="26" maxlength="26" placeholder="Дата рождения" name="birthday" value="<?php echo @$data['birthday']; ?>" id="birthday">
					<input type="text" size="26" maxlength="26" placeholder="Город" name="city" value="<?php echo @$data['city']; ?>" id="city">
					<input type="text" size="26" maxlength="26" placeholder="Телефон" name="phone" value="<?php echo @$data['phone']; ?>" id="phone">
					<input type="text" size="26" maxlength="26" placeholder="Почта" name="email" value="<?php echo @$data['email']; ?>" id="email">
					<input type="text" size="26" maxlength="26" placeholder="Код" name="promocode" value="<?php echo @$data['promocode']; ?>" id="promocode">
					<input type="password" size="26" maxlength="26" placeholder="Пароль" name="password" value="<?php echo @$data['password']; ?>" id="password">
					<input type="password" size="26" maxlength="26" placeholder="Повторите Пароль" name="password_check" value="<?php echo @$data['password_check']; ?>" id="password_check"><br><br>
				<div id="checkbox">
					<input type="checkbox" class="rules" id="happy" name="happy" value="yes">
					<label for="happy">Я согласен с правилами</label>
				</div>
				<div id="space2"></div>
				<input type="submit" id="vhodbut" name="regisration_btn" value="Зарегистрироваться" class="open_modal_btn" >
				</form>	
				

				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>THIS IS CONTENT</p>
				      <form onsubmit='return false'>
				        <input type='text' placeholder='test'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>

			  <?php

			  if(isset($data['regisration_btn'])){


			 if ( R::count('users', "email = ?", array($data['email'])) > 0)
			{	
				echo "
					<div id='wrapper'>
					  <div class='cover'></div>
					  <div class='modal'>
					    <div class='content'>
					      <p>Данная почта занята</p>
					      <form onsubmit='return false'>
					        <input type='submit' />
					      </form>
					    </div>
					  </div>
					  ";
				  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			}


			else if ($data['password_check'] != $data['password'])
			{
				echo "
					<div id='wrapper'>
					  <div class='cover'></div>
					  <div class='modal'>
					    <div class='content'>
					      <p>Пароли не совпадают</p>
					      <form onsubmit='return false'>
					        <input type='submit' />
					      </form>
					    </div>
					  </div>
					  ";
				  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			}


			 else if (trim($data['password_check']) == ''){
			  echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Заполните поле 'Подтвердите пароль'</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			  	}

			  else if (trim($data['password']) == ''){
			  echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Заполните поле 'Пароль'</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			  	}


			  	else if (trim($data['email']) == ''){
			  echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Заполните поле 'Почта'</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			  	}
			   else if (trim($data['phone']) == ''){
			  echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Заполните поле 'Телефон'</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			  	}

			  else if (trim($data['city']) == ''){
			  echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Заполните поле 'Город'</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			  	}

			  else if (trim($data['birthday']) == ''){
			  echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Заполните поле 'Дата рождения'</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			  	}

			  else if (trim($data['last_name']) == ''){
			  echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Заполните поле 'Фамилия'</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			  	}
			  else if (trim($data['name']) == ''){
			  echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Заполните поле 'Имя'</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
			  	}


			  	else if ( R::count('users', "login = ?", array($data['login'])) > 0)
			{
			echo "
				<div id='wrapper'>
				  <div class='cover'></div>
				  <div class='modal'>
				    <div class='content'>
				      <p>Такой логин уже существует</p>
				      <form onsubmit='return false'>
				        <input type='submit' />
				      </form>
				    </div>
				  </div>
				  ";
			  echo "<script>var wrap = $('#wrapper'),btn = $('.open_modal_btn'),modal = $('.cover, .modal, .content');modal.fadeIn();$('.modal').click(function(){modal.fadeOut();});</script>";
		}



		}
		?>
								
			</div>
		</div>
	</div>

	<script src="../js/modals.js"></script>
	<script src="../js/registration_form_errors.js"></script>
</body>
</html>