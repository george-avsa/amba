<?php
require_once '../db/db.php';
//-------------------------------------------------------------------------------------------------------------global vars
$user_id = $_SESSION['logged_user']->unical_id;

if(isset($_POST['change_btn'])){

	$id = $user_id;
	$name = $_POST['name'];
	$last_name = $_POST['last_name'];
	$birthday = $_POST['birthday'];
	$city = $_POST['city'];
	$phone = $_POST['phone'];

//----------------------------------------------------------------------------------------------------------------updating user in settings
	if(trim($name)) R::exec('UPDATE `users` SET `name` = ? WHERE `unical_id` = ?', array( $name, $id ));
	if(trim($last_name))R::exec('UPDATE `users` SET `last_name` = ? WHERE `unical_id` = ?', array( $last_name, $id ));
	if(trim($city))R::exec('UPDATE `users` SET `city` = ? WHERE `unical_id` = ?', array( $city, $id ));
	if(trim($birthday))R::exec('UPDATE `users` SET `birthday` = ? WHERE `unical_id` = ?', array( $birthday, $id ));
	if(trim($phone))R::exec('UPDATE `users` SET `phone` = ? WHERE `unical_id` = ?', array( $phone, $id ));
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>amba</title>
	<link rel="stylesheet" type="text/css" href="../css/style/settings_style.css">
	<link rel="stylesheet" type="text/css" href="../css/media/settings_media.css">
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
						<div id="back_svg">
							<a href="profile.php">
							<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="back_svg">
								<path d="M13.5 0C6.01364 0 0 6.01364 0 13.5C0 20.9864 6.01364 27 13.5 27C20.9864 27 27 20.9864 27 13.5C27 6.01364 20.9864 0 13.5 0ZM21.4773 14.1136C21.4773 14.4818 21.2318 14.7273 20.8636 14.7273H10.6773C10.4318 14.7273 10.2477 15.0341 10.4318 15.2795L12.8864 17.7341C13.1318 17.9795 13.1318 18.3477 12.8864 18.5932L12.0273 19.4523C11.9045 19.575 11.7818 19.6364 11.5977 19.6364C11.4136 19.6364 11.2909 19.575 11.1682 19.4523L5.64545 13.9295C5.58409 13.8068 5.52273 13.6841 5.52273 13.5C5.52273 13.3159 5.58409 13.1932 5.70682 13.0705L11.2295 7.54773C11.3523 7.425 11.475 7.36364 11.6591 7.36364C11.8432 7.36364 11.9659 7.425 12.0886 7.54773L12.9477 8.40682C13.1932 8.65227 13.1932 9.02046 12.9477 9.26591L10.4932 11.7205C10.3091 11.9045 10.4318 12.2727 10.7386 12.2727H20.8636C21.2318 12.2727 21.4773 12.5182 21.4773 12.8864V14.1136Z" fill="#DDDDDD"/>
							</svg>
						</a>
						</div>
						<div id="page_name">
							<font class="settings">Настройки</font>
						</div>
						<div id="help_svg">
							<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="help_svg">
								<g clip-path="url(#clip0)">
									<path d="M13.3204 0.00110482C5.86518 0.100887 -0.0971211 6.22607 0.0020745 13.6816C0.101857 21.1339 6.22645 27.098 13.6814 26.9988C21.1352 26.8984 27.0986 20.7732 26.9994 13.3183C26.8997 5.86539 20.7748 -0.0983843 13.3204 0.00110482ZM13.2805 21.7173L13.206 21.7161C12.0579 21.6821 11.2485 20.8363 11.281 19.7052C11.313 18.5935 12.1421 17.7865 13.2523 17.7865L13.3189 17.7876C14.499 17.8226 15.2993 18.6599 15.2662 19.8235C15.2333 20.9384 14.4171 21.7173 13.2805 21.7173ZM18.1097 12.1326C17.8397 12.5162 17.246 12.9925 16.4979 13.5754L15.6741 14.1441C15.2219 14.4957 14.9489 14.8265 14.8465 15.1519C14.7658 15.4081 14.7262 15.4759 14.7191 15.9971L14.718 16.1295H11.5725L11.5816 15.8633C11.62 14.7692 11.647 14.1256 12.1004 13.5938C12.8118 12.7586 14.381 11.7482 14.4477 11.7053C14.6725 11.536 14.8621 11.3432 15.0032 11.1371C15.3334 10.682 15.4795 10.3236 15.4795 9.97144C15.4795 9.4828 15.3346 9.03084 15.0478 8.62848C14.7722 8.24021 14.2487 8.04358 13.4915 8.04358C12.7405 8.04358 12.2263 8.28189 11.9188 8.77082C11.6024 9.27355 11.4424 9.80152 11.4424 10.3409V10.475H8.19922L8.20508 10.3351C8.28873 8.34851 8.99777 6.91809 10.3117 6.08344C11.1372 5.55195 12.1644 5.28254 13.363 5.28254C14.9319 5.28254 16.2564 5.66377 17.2991 6.41566C18.3556 7.17753 18.8915 8.31857 18.8915 9.80709C18.8915 10.6397 18.6286 11.4218 18.1097 12.1326Z" fill="#DDDDDD"/>
								</g>
								<defs>
									<clipPath id="clip0">
										<rect width="27" height="27" fill="white"/>
									</clipPath>
									</defs>
							</svg>
						</div>
					</div>
					<div id="space1"></div>
					<form id="forms" method="POST" action="settings.php">
						<?php
						$user_id = $_SESSION['logged_user']->unical_id;
						$user_info = R::findOne('users', 'unical_id = ?', array($user_id));
						?>
						<input type="text" size="26" maxlength="26" placeholder= "<?php echo $user_info->name; ?>" class="pencil" name='name'> 
						<input type="text" size="26" maxlength="26" placeholder= "<?php echo $user_info->last_name; ?>" class="pencil" name='last_name'>
						<input type="text" size="26" maxlength="26" placeholder= "<?php echo $user_info->birthday; ?>" class="pencil" name='birthday'>
						<input type="text" size="26" maxlength="26" placeholder= "<?php echo $user_info->city; ?>" class="pencil" name='city'> 
						<input type="text" size="26" maxlength="26" placeholder= "<?php echo $user_info->phone; ?>" class="pencil" name='phone'>
						<input disabled="disabled" type="text" size="26" maxlength="26" placeholder= "<?php echo $user_info->unical_id; ?>"class="" name='id'>
						<div id="space2"></div>
						<button type="submit" id="vhodbut" value="Вход" name='change_btn'>Сохранить</button>
						<div id="space1_2"></div>
						<div id="change_password">
							<font class="change_password">
								<a href="../pages/change_password.php">Изменить пароль</a>
							</font>
							<font class="change_password">
								<br><a href="../pages/admin.php">admin</a>
							</font>
						</div>
					</form>
				</div>
		</div>
	</div>
</body>
</html>