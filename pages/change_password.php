<!DOCTYPE html>
<html>
<head>
	<title>amba</title>
	<link rel="stylesheet" type="text/css" href="../css/style/change_password_style.css">
	<link rel="stylesheet" type="text/css" href="../css/media/change_password_media.css">
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
						<div id="back_svg"><a href="settings.php">
							<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="back_svg">
								<path d="M13.5 0C6.01364 0 0 6.01364 0 13.5C0 20.9864 6.01364 27 13.5 27C20.9864 27 27 20.9864 27 13.5C27 6.01364 20.9864 0 13.5 0ZM21.4773 14.1136C21.4773 14.4818 21.2318 14.7273 20.8636 14.7273H10.6773C10.4318 14.7273 10.2477 15.0341 10.4318 15.2795L12.8864 17.7341C13.1318 17.9795 13.1318 18.3477 12.8864 18.5932L12.0273 19.4523C11.9045 19.575 11.7818 19.6364 11.5977 19.6364C11.4136 19.6364 11.2909 19.575 11.1682 19.4523L5.64545 13.9295C5.58409 13.8068 5.52273 13.6841 5.52273 13.5C5.52273 13.3159 5.58409 13.1932 5.70682 13.0705L11.2295 7.54773C11.3523 7.425 11.475 7.36364 11.6591 7.36364C11.8432 7.36364 11.9659 7.425 12.0886 7.54773L12.9477 8.40682C13.1932 8.65227 13.1932 9.02046 12.9477 9.26591L10.4932 11.7205C10.3091 11.9045 10.4318 12.2727 10.7386 12.2727H20.8636C21.2318 12.2727 21.4773 12.5182 21.4773 12.8864V14.1136Z" fill="#DDDDDD"/>
							</svg></a>
						</div>
						<div id="page_name">
							<font class="settings">Настройки</font>
						</div>
						<div id="help_svg">
							<a href="tasks_page.php">
							<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_home">
								<path d="M13.5 0C6.01364 0 0 6.01364 0 13.5C0 20.9864 6.01364 27 13.5 27C20.9864 27 27 20.9864 27 13.5C27 6.01364 20.9864 0 13.5 0ZM20.8636 12.2727H19.9432C19.7591 12.2727 19.6364 12.3955 19.6364 12.5795V20.25C19.6364 20.6182 19.3909 20.8636 19.0227 20.8636H7.97727C7.60909 20.8636 7.36364 20.6182 7.36364 20.25V12.5795C7.36364 12.3955 7.24091 12.2727 7.05682 12.2727H6.13636C5.76818 12.2727 5.52273 12.0273 5.52273 11.6591C5.52273 11.475 5.64545 11.2295 5.76818 11.1682L13.1318 6.25909C13.2545 6.19773 13.3159 6.13636 13.5 6.13636C13.6841 6.13636 13.7455 6.19773 13.8682 6.25909L21.2318 11.1682C21.4159 11.2909 21.4773 11.475 21.4773 11.6591C21.4773 12.0273 21.2318 12.2727 20.8636 12.2727Z" fill="#DDDDDD"/>
								<path d="M13.6841 9.08179C13.5614 9.02043 13.4386 9.02043 13.3159 9.08179L9.9409 11.3522C9.87954 11.4136 9.81818 11.475 9.81818 11.5977V18.1022C9.81818 18.2863 9.9409 18.4091 10.125 18.4091H11.9659C12.15 18.4091 12.2727 18.2863 12.2727 18.1022V15.3409C12.2727 14.9727 12.5182 14.7272 12.8864 14.7272H14.1136C14.4818 14.7272 14.7273 14.9727 14.7273 15.3409V18.1022C14.7273 18.2863 14.85 18.4091 15.0341 18.4091H16.875C17.0591 18.4091 17.1818 18.2863 17.1818 18.1022V11.5977C17.1818 11.475 17.1204 11.4136 17.0591 11.3522L13.6841 9.08179Z" fill="#DDDDDD"/>
							</svg></a>

						</div>
					</div>
					<div id="space1"></div>
					<form id="forms" method="POST" action="change_password.php">
						<input type="password" size="26" maxlength="26" placeholder="Старый пароль"> 
						<input type="password" size="26" maxlength="26" placeholder="Новый пароль">
						<input type="password" size="26" maxlength="26" placeholder="Подтвердите пароль">
						<div id="space2"></div>
						<button type="button" id="vhodbut" value="Вход">Сохранить</button>
						<a href="logout.php">Logout</a>
					</form>
				</div>
		</div>
	</div>

</body>
</html>

