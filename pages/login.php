<?php require_once '../db/db.php';
ob_start();
?>

<?php

	$data = $_POST;
	if (isset($data['login_btn']))
	{
		$errors = array();
		$user = R::findOne('users', 'unical_id = ?', array($data['id']));
		if ($user)
		{
			if ( password_verify($data['password'], $user->password))
			{
				$_SESSION['logged_user'] = $user;
				echo "<div style='color: green;'>You have been authorised, may go to the <a href = 'http://ambassa.ru'>main</a> page </div>";
				header('Location: http://ambassa.ru/pages/profile.php');
				ob_end_flush();

			}else
			{
				$errors[] = 'Wrong password';
				echo $data['password']."<br>";
				echo $user->password;
			}
		}else
		{
			$errors[] = 'User with this ID doesn`t exist';
		}

		if ( !empty($errors))
		{	
			echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>amba</title>
	<link rel="stylesheet" type="text/css" href="../css/style/login_style.css">	
	<link rel="stylesheet" type="text/css" href="../css/media/login_media.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="http://code.jquery.com/jquery-2.0.2.min.js"></script>
	<script>
	    $(document).ready(function(){    
	        PopUpHide();
	    });
	    function PopUpShow(){
	        $("#popup1").show();
	    }
	    function PopUpHide(){
	        $("#popup1").hide();
	    }

	</script>
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
				<div class="popup_wrapper" id="popup1">
					<table>
						<tr>
							<td>
					<div id="popup">
						<div id="wrong_email">
							<font class="wrong_email">
								Указана несуществующая почта
							</font>
						</div>
						<div class="exit_popup_email">
							 <a href="javascript:PopUpHide()">
                            <svg width="43" height="43" viewBox="0 0 43 43" fill="none" xmlns="http://www.w3.org/2000/svg" class="link_exit">
                                <path d="M21.5 0C9.57727 0 0 9.57727 0 21.5C0 33.4227 9.57727 43 21.5 43C33.4227 43 43 33.4227 43 21.5C43 9.57727 33.4227 0 21.5 0ZM33.9114 14.7568L18.275 30.9795C18.0795 31.175 17.8841 31.2727 17.5909 31.2727C17.2977 31.2727 17.0045 31.175 16.9068 30.9795L9.28409 22.7705L9.08864 22.575C8.89318 22.3795 8.79545 22.0864 8.79545 21.8909C8.79545 21.6955 8.89318 21.4023 9.08864 21.2068L10.4568 19.8386C10.8477 19.4477 11.4341 19.4477 11.825 19.8386L11.9227 19.9364L17.2977 25.7023C17.4932 25.8977 17.7864 25.8977 17.9818 25.7023L31.0773 12.1182H31.175C31.5659 11.7273 32.1523 11.7273 32.5432 12.1182L33.9114 13.4864C34.3023 13.7795 34.3023 14.3659 33.9114 14.7568Z" fill="#1FA4AF"/>
                            </svg>
                        </a>
						</div>
					</div>
				</td>
			</tr>
		</table>
				</div>
				<div id="header">
					<div id="logo">
						<img src="../images/logovhod.png" class="logo">
					</div>
				</div>
				<div id="space1"></div>
				<form id="forms" method="POST" action="login.php" autocomplete="off">
					
					<input type="text" size="26" maxlength="26" placeholder="ID" name="id" value="<?php echo @$data['id']; ?>"> 
					<input type="password" size="26" maxlength="26" placeholder="Пароль" name="password" class="pass" value="<?php echo @$data['password']; ?>"><br><br>
					<div id="missedpswrd"><a href="recover_check.php">Забыли пароль?</a></div>	
					<div id="space2"></div>
					<input type="submit" id="vhodbut" value="Вход" name="login_btn">
					<div id="registration"><a href="registration.php">Зарегистрироваться</a></div> 			
				</form>
			</div>
		</div>
	</div>
</body>
</html>