<?php require_once '../db/db.php'; ?>


<!DOCTYPE html>
<html>
<head>
	<title>amba</title>
	<link rel="stylesheet" type="text/css" href="../../css/style/all_tasks_style.css">
	<link rel="stylesheet" type="text/css" href="../../css/media/all_tasks_media.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="wrapper">
		<div id="iphone11">
			<div id="content">
				<div id="daily">
					<div id="header_space"></div>
					 <div id="header">
						<a href="profile.php">
							<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_logo">
								<path d="M13.5 0C6.01364 0 0 6.01364 0 13.5C0 20.9864 6.01364 27 13.5 27C20.9864 27 27 20.9864 27 13.5C27 6.01364 20.9864 0 13.5 0ZM21.4773 14.1136C21.4773 14.4818 21.2318 14.7273 20.8636 14.7273H10.6773C10.4318 14.7273 10.2477 15.0341 10.4318 15.2795L12.8864 17.7341C13.1318 17.9795 13.1318 18.3477 12.8864 18.5932L12.0273 19.4523C11.9045 19.575 11.7818 19.6364 11.5977 19.6364C11.4136 19.6364 11.2909 19.575 11.1682 19.4523L5.64545 13.9295C5.58409 13.8068 5.52273 13.6841 5.52273 13.5C5.52273 13.3159 5.58409 13.1932 5.70682 13.0705L11.2295 7.54773C11.3523 7.425 11.475 7.36364 11.6591 7.36364C11.8432 7.36364 11.9659 7.425 12.0886 7.54773L12.9477 8.40682C13.1932 8.65227 13.1932 9.02046 12.9477 9.26591L10.4932 11.7205C10.3091 11.9045 10.4318 12.2727 10.7386 12.2727H20.8636C21.2318 12.2727 21.4773 12.5182 21.4773 12.8864V14.1136Z" fill="#DDDDDD"/>
							</svg>
						</a>
						<div id="coins">
						<svg width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg" class="svg_logo1">
							<g clip-path="url(#clip0)">
								<path d="M13.3204 0.00104378C5.86518 0.100826 -0.0971211 6.22601 0.0020745 13.6815C0.101857 21.1338 6.22645 27.0979 13.6814 26.9987C21.1352 26.8983 27.0986 20.7731 26.9994 13.3182C26.8997 5.86533 20.7748 -0.0984453 13.3204 0.00104378ZM13.2805 21.7173L13.206 21.7161C12.0579 21.682 11.2485 20.8362 11.281 19.7052C11.313 18.5935 12.1421 17.7864 13.2523 17.7864L13.3189 17.7876C14.499 17.8225 15.2993 18.6598 15.2662 19.8234C15.2333 20.9384 14.4171 21.7173 13.2805 21.7173ZM18.1097 12.1326C17.8397 12.5161 17.246 12.9924 16.4979 13.5753L15.6741 14.1441C15.2219 14.4956 14.9489 14.8264 14.8465 15.1519C14.7658 15.4081 14.7262 15.4759 14.7191 15.9971L14.718 16.1294H11.5725L11.5816 15.8632C11.62 14.7692 11.647 14.1256 12.1004 13.5938C12.8118 12.7585 14.381 11.7481 14.4477 11.7052C14.6725 11.5359 14.8621 11.3431 15.0032 11.1371C15.3334 10.6819 15.4795 10.3236 15.4795 9.97138C15.4795 9.48274 15.3346 9.03078 15.0478 8.62842C14.7722 8.24015 14.2487 8.04352 13.4915 8.04352C12.7405 8.04352 12.2263 8.28183 11.9188 8.77076C11.6024 9.27349 11.4424 9.80146 11.4424 10.3409V10.475H8.19922L8.20508 10.335C8.28873 8.34844 8.99777 6.91803 10.3117 6.08338C11.1372 5.55189 12.1644 5.28248 13.363 5.28248C14.9319 5.28248 16.2564 5.66371 17.2991 6.4156C18.3556 7.17747 18.8915 8.31851 18.8915 9.80703C18.8915 10.6396 18.6286 11.4217 18.1097 12.1326Z" fill="#DDDDDD"/>
							</g>
							<defs>
								<clipPath id="clip0">
									<rect width="27" height="27" fill="white"/>
								</clipPath>
							</defs>
							</svg>
						</div>
						<div id="font">
							<font class="header_amba">Все задания</font>
						</div>
					</div>
					<div id="space1"></div>
					<div id="content_tasks">
						<div id="space_tasks_content"></div>
						<div id="icons">
							<div id="list_icon">
								<a href="all_tasks.php">
									<img src="../svg/all_tasks_blue.svg">
								</a>
							</div>
							<div id="wait_icon">
								<a href="completed_tasks.php">
									<img src="../svg/completed_tasks_purple.svg">
								</a>
							</div>
							<div id="complete_icon">
								<a href="awaiting_tasks.php">
									<img src="../svg/awaiting_tasks_purple.svg">
								</a>
							</div>

						</div>
						<div id="space_tasks_content"></div>
						<div id="tasks_content">
						<?php
							$all_tasks =  R::findAll('tasks', "id != ?", array(0));

							foreach ($all_tasks as $key => $bean) {
							echo "
							<div class='tasks'>
								<div id='task_image'>
									<img src='../svg/svg_categories/".$bean->category.".svg' class='task_image'>
								</div>

								<div id='club_name'>
									<font class='club_name'>United gamers</font><br>
									<font class='article_club'>Компьютерный клуб</font>
								</div>
								<div id='task_price'>
									<font class='price'>".$bean->price." C</font><br>
									<font class='date'>03.03.2020</font>
								</div>
							</div>";
						}//-----------------------------------------------------------------------------------------------TODO tasks themes
						?>
						</div>
						<div id="next_slide">
							<svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="next_svg">
								<g clip-path="url(#clip0)">
								<path d="M2.75 4.21667L11 12.65L19.4333 4.21667L22 6.78334L11 17.7833L3.7025e-06 6.78334L2.75 4.21667Z" fill="#8D1D5E"/>
								</g>
								<defs>
									<clipPath id="clip0">
										<rect x="22" width="22" height="22" transform="rotate(90 22 0)" fill="white"/>
									</clipPath>
								</defs>
							</svg>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>