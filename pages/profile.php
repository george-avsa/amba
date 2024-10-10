<?php require_once '../db/db.php';?>

<?php //--------------------------------------------------------------------------------------------------------global vars
$user_id = $_SESSION['logged_user']->unical_id;
?>

<!DOCTYPE html>
<html>
<head>
	<title>amba</title>
	<link rel="stylesheet" type="text/css" href="../css/style/profile_style.css">
	<link rel="stylesheet" type="text/css" href="../css/media/profile_media.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="wrapper">
		<div id="iphone11">
			<div id="content">
				<div id="daily">
					<div id="profile_top">
					<div id="header_space"></div>
					 <div id="header">
						<a href="tasks_page.php">
							<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_logo">
								<path d="M13.5 0C6.01364 0 0 6.01364 0 13.5C0 20.9864 6.01364 27 13.5 27C20.9864 27 27 20.9864 27 13.5C27 6.01364 20.9864 0 13.5 0ZM21.4773 14.1136C21.4773 14.4818 21.2318 14.7273 20.8636 14.7273H10.6773C10.4318 14.7273 10.2477 15.0341 10.4318 15.2795L12.8864 17.7341C13.1318 17.9795 13.1318 18.3477 12.8864 18.5932L12.0273 19.4523C11.9045 19.575 11.7818 19.6364 11.5977 19.6364C11.4136 19.6364 11.2909 19.575 11.1682 19.4523L5.64545 13.9295C5.58409 13.8068 5.52273 13.6841 5.52273 13.5C5.52273 13.3159 5.58409 13.1932 5.70682 13.0705L11.2295 7.54773C11.3523 7.425 11.475 7.36364 11.6591 7.36364C11.8432 7.36364 11.9659 7.425 12.0886 7.54773L12.9477 8.40682C13.1932 8.65227 13.1932 9.02046 12.9477 9.26591L10.4932 11.7205C10.3091 11.9045 10.4318 12.2727 10.7386 12.2727H20.8636C21.2318 12.2727 21.4773 12.5182 21.4773 12.8864V14.1136Z" fill="url(#paint0_linear)"/>
								<defs>
								<linearGradient id="paint0_linear" x1="13.5" y1="0" x2="13.5" y2="27" gradientUnits="userSpaceOnUse">
								<stop stop-color="#313076"/>
								<stop offset="1" stop-color="#232751"/>
								</linearGradient>
								</defs>
						</svg></a>
						<div id="coins">
							<font class="header_coins">
								<?php
								$useracc = R::findAll('useracc', "unical_id = ?", array($user_id));
								foreach ($useracc as $key => $bean) {
									echo $bean->coins.' C';
								}
								?>
							</font>
						</div>
						<div id="font">
							<font class="header_amba" style="color: #2E2E6E;">Профиль</font>
						</div>
					</div>
					<div id="space"></div>
					<div id="space"></div>
					<div id="id_number">
						<a href="serega.php">
						<svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_help">
							<g clip-path="url(#clip0)">
							<path d="M6.90729 0.00045306C3.04162 0.0521922 -0.0499477 3.22821 0.00148709 7.09404C0.0532262 10.9582 3.22894 14.0507 7.09446 13.9992C10.9594 13.9472 14.0516 10.7712 14.0001 6.90565C13.9484 3.04119 10.7725 -0.0511339 6.90729 0.00045306ZM6.88659 11.2607L6.84794 11.2601C6.25264 11.2425 5.83294 10.8039 5.84983 10.2174C5.86642 9.64097 6.29631 9.2225 6.87199 9.2225L6.90653 9.22311C7.51842 9.24121 7.9334 9.67537 7.9162 10.2787C7.89916 10.8568 7.47596 11.2607 6.88659 11.2607ZM9.39062 6.29087C9.25062 6.48976 8.94277 6.73674 8.55488 7.03895L8.12772 7.33387C7.89322 7.51617 7.7517 7.68767 7.69859 7.85643C7.65675 7.98928 7.6362 8.02443 7.63255 8.29469L7.63194 8.36332H6.00094L6.00566 8.2253C6.02559 7.658 6.0396 7.32428 6.2747 7.04854C6.64357 6.61545 7.45725 6.09152 7.49179 6.0693C7.60836 5.9815 7.70666 5.88152 7.77986 5.77469C7.95105 5.53867 8.02683 5.35287 8.02683 5.17026C8.02683 4.91689 7.95166 4.68254 7.80299 4.47391C7.66009 4.27258 7.38862 4.17063 6.99601 4.17063C6.6066 4.17063 6.33999 4.29419 6.18051 4.54771C6.01646 4.80839 5.93353 5.08215 5.93353 5.36184V5.43139H4.25186L4.2549 5.3588C4.29827 4.32874 4.66592 3.58704 5.3472 3.15426C5.77527 2.87867 6.30788 2.73898 6.92936 2.73898C7.74288 2.73898 8.42964 2.93665 8.97031 3.32652C9.51814 3.72156 9.79601 4.31321 9.79601 5.08504C9.79601 5.51676 9.65966 5.9223 9.39062 6.29087Z" fill="url(#paint0_linear)"/>
							</g>
							<defs>
								<linearGradient id="paint0_linear" x1="7.0008" y1="-0.000183105" x2="7.0008" y2="13.9999" gradientUnits="userSpaceOnUse">
							<stop stop-color="#313076"/>
							<stop offset="1" stop-color="#232751"/>
							</linearGradient>
							<clipPath id="clip0">
							<rect width="14" height="14" fill="white"/>
							</clipPath>
							</defs>
						</svg>
					</a>
					<table>
						<tr>
							<td style="vertical-align: top; text-align: center; z-index: -1;">
								<font class="id_number">
									<?php
										$user_id_for_print =  R::findOne('users', "unical_id = ?", array($user_id));
										echo "ID ".$user_id_for_print->unical_id;
									?>
								</font>
							</td>
						</tr>
					</table>
					</div>
					<div id="space"></div>
					<div id="space"></div>
					<div id="task_but">
						<a href="completed_tasks.php">
						<div id="completed_tasks">
							<table class="tasks1">
								<tr>
									<td style="vertical-align: bottom; ">
										<font class="completed_text">Выполненные задания</font>
						</td>
						</tr>
						</table>
						</div>
						</a>
						<a href="awaiting_tasks.php">
						<div id="waiting_tasks">
							<table class="tasks1">
								<tr>
									<td style="vertical-align: bottom;">
									<font class="completed_text">Отложенные задания</font>
						</td>
						</tr>
						</table>
						</div>	
						</a>	
					</div>
					</div>
					<div id="profile_bottom">
					<div id="profile_elipse"></div>
					<div id="space3"></div>
					<a href="shop.php"><div id="club_picture">
					<table class="shop1">
								<tr>
									<td class="shop2">
						<font class="shop">Магазин</font>
						<font class="cost">120 Coins/час</font>
					</td>
					</tr>
					</table>
					</div></a>
					<div id="space5"></div>
					<div id="icons">
						<a href="settings.php">	
							<div id="settings">
								<table>
									<tr>
										<td style="vertical-align: bottom; ">
											<font class="icons_text">Настройки</font>
										</td>
									</tr>
								</table>	
							</div>
						</a>
						<a href="heirs.php">
							<div id="successor">
									<table>
										<tr>
											<td style="vertical-align: bottom;">
												<font class="icons_text">Наследники</font>
											</td>
										</tr>
									</table>	
							</div>
						</a>
						<a href="purchase.php">
						<div id="buy">
								<table>
									<tr>
										<td style="vertical-align: bottom;">
											<font class="icons_text">Покупки</font>
										</td>
									</tr>
								</table>
						</div>
						</a>
					</div>
					</div>
				</div>	
				</div>
			</div>
		</div>
</body>
</html>