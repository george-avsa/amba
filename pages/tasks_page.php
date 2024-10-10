<?php require_once '../db/db.php'; ?>

<?php
$user_id = $_SESSION['logged_user']->unical_id;


?>

<!DOCTYPE html>
<html>
<head>
	<title>amba</title>
	<link rel="stylesheet" type="text/css" href="../../css/style/tasks_page_style.css">
	<link rel="stylesheet" type="text/css" href="../../css/media/tasks_page_media.css">
	<script type="text/javascript" src="../../js/slider.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<div id="wrapper">
		<div id="iphone11">
			<div id="content">
				<div id="daily">
					<div id="task_page_top">
					 <div id="header">
						<a href="../pages/profile.php"><svg class="svg_logo" width="27" height="27" viewBox="0 0 27 27" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M13.5 0C6.075 0 0 6.075 0 13.5C0 20.925 6.075 27 13.5 27C20.925 27 27 20.925 27 13.5C27 6.075 20.925 0 13.5 0ZM13.5 4.05C15.795 4.05 17.55 5.805 17.55 8.1C17.55 10.395 15.795 12.15 13.5 12.15C11.205 12.15 9.45 10.395 9.45 8.1C9.45 5.805 11.205 4.05 13.5 4.05ZM13.5 23.22C10.125 23.22 7.155 21.4651 5.4 18.9C5.4 16.2 10.8 14.715 13.5 14.715C16.2 14.715 21.6 16.2 21.6 18.9C19.845 21.465 16.875 23.22 13.5 23.22Z" fill="#DDDDDD"/>
						</svg></a>
						<div id="font">
							<font class="header_amba">Amba</font>
						</div>
					</div>
					<div id="space_head"></div>
					<div id="header_space"></div>
					<div id="task">
						<div id="header_task">
							<div id="header_text">
								<font class="header_text">Задания</font>
							</div>
							<div id="header_filter">
								<font class="header_filter">Все | Онлайн | Офлайн</font>
							</div>
						</div>
						<div id="space_tasks"></div>
						<div id="tasks_menu">
						<?php
						$all_tasks =  R::findAll('tasks', "id != ?", array(0));

						foreach ($all_tasks as $key => $bean) {
						$openning_block = '';
						if (($bean->category) == 'profile') {
							$openning_block = '';
						}else{
							$openning_block = $bean->category; 
						}
						echo"<div class='task_1'>
                                <div id='space1_task'></div>
                                <div id='category_svg'>
                                        <img src='../svg/svg_categories/".$bean->category.".svg' class='category_svg'>
                                </div>
                                <div id='space2_task'></div>
                                <div id='task_category'>
                                        <font class='task_category'>
                                                ".$openning_block." ".$bean->platform."
                                        </font>
                                </div>
                                <div id='space3_task'></div>
                                <div id='club_name_task'>
                                        <font class='club_name_task'>
                                                United Gamers
                                        </font>
                                </div>
                                <div id='space3_task'></div>
                                <div id='task_price'>
                                        <font class='task_price'>
                                                120 Coins
                                        </font>
                                </div>
                                <div id='space4_task'></div>
                                <form id='task_button' action='task_description.php' method='POST' >

                                        <a href='task_description.php'>
                          
                                        	<input type='submit' name='choose_task_btn' id=".$bean->$task_id." class='task_button' value='Выполнить'>
                                        </a>
                                </form>
                                <div id='space5_task'></div>
                        </div>";
						}?>
							
						</div>
						<div id="pace_tasks"></div>
						<div id="slider_list">
							<font class="slider_list">< 01 / 09 ></font>
						</div>
					</div>
					</div>
					<div id="task_page_bottom">

					<div id="elipse">
						
					</div>
					<div id="clubs">
					<div id="header_clubs">
						<font class="header_clubs">Клубы</font>
					</div>
					<div id="clubs_list">
						<div id="UG_portal">
							<a href="#"><div id="UG">
								<div id="club_middle">
									<b class="club_name">United Gamers</b><br>
									<font class="article_name">Компьютерный клуб</font>
									<div id="space_club"></div>
									<svg width="38" height="8" viewBox="0 0 38 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.99999 6.30716L6.47199 7.79949L5.816 4.9875L8 3.09549L5.12434 2.85183L3.99999 0.200504L2.87566 2.85183L0 3.09549L2.184 4.9875L1.52801 7.79949L3.99999 6.30716Z" fill="#EFF1F5"/>
										<path d="M14 6.30716L16.472 7.79949L15.816 4.9875L18 3.09549L15.1243 2.85183L14 0.200504L12.8757 2.85183L10 3.09549L12.184 4.9875L11.528 7.79949L14 6.30716Z" fill="#EFF1F5"/>
										<path d="M24 6.30716L26.472 7.79949L25.816 4.9875L28 3.09549L25.1243 2.85183L24 0.200504L22.8757 2.85183L20 3.09549L22.184 4.9875L21.528 7.79949L24 6.30716Z" fill="#EFF1F5"/>
										<path d="M34 6.30716L36.472 7.79949L35.816 4.9875L38 3.09549L35.1243 2.85183L34 0.200504L32.8757 2.85183L30 3.09549L32.184 4.9875L31.528 7.79949L34 6.30716Z" fill="#EFF1F5"/>
									</svg>
								</div>
							</div></a>
							<a href="#"><div id="portal">
								<div id="club_middle">
									<b class="club_name">Portal</b><br>
									<font class="article_name">Компьютерный клуб</font>
									<div id="space_club"></div>
									<svg width="48" height="8" viewBox="0 0 48 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.99999 6.30715L6.47199 7.79949L5.816 4.98749L8 3.09549L5.12434 2.85183L3.99999 0.2005L2.87566 2.85183L0 3.09549L2.184 4.98749L1.52801 7.79949L3.99999 6.30715Z" fill="#EFF1F5"/>
										<path d="M14 6.30715L16.472 7.79949L15.816 4.98749L18 3.09549L15.1243 2.85183L14 0.2005L12.8757 2.85183L10 3.09549L12.184 4.98749L11.528 7.79949L14 6.30715Z" fill="#EFF1F5"/>
										<path d="M24 6.30715L26.472 7.79949L25.816 4.98749L28 3.09549L25.1243 2.85183L24 0.2005L22.8757 2.85183L20 3.09549L22.184 4.98749L21.528 7.79949L24 6.30715Z" fill="#EFF1F5"/>
										<path d="M34 6.30715L36.472 7.79949L35.816 4.98749L38 3.09549L35.1243 2.85183L34 0.2005L32.8757 2.85183L30 3.09549L32.184 4.98749L31.528 7.79949L34 6.30715Z" fill="#EFF1F5"/>
										<path d="M44 6.30715L46.472 7.79949L45.816 4.98749L48 3.09549L45.1243 2.85183L44 0.2005L42.8757 2.85183L40 3.09549L42.184 4.98749L41.528 7.79949L44 6.30715Z" fill="#EFF1F5"/>
									</svg>
								</div>
							</div></a>
						</div>
						<div id="space"></div>
						<div id="nova_bp">
							<a href="#"><div id="nova">
								<div id="club_middle">
									<b class="club_name">NOVA Cyber Arena</b><br>
									<font class="article_name">Компьютерный клуб</font>
									<div id="space_club"></div>
									<svg width="48" height="8" viewBox="0 0 48 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.99999 6.30715L6.47199 7.79949L5.816 4.98749L8 3.09549L5.12434 2.85183L3.99999 0.2005L2.87566 2.85183L0 3.09549L2.184 4.98749L1.52801 7.79949L3.99999 6.30715Z" fill="#EFF1F5"/>
										<path d="M14 6.30715L16.472 7.79949L15.816 4.98749L18 3.09549L15.1243 2.85183L14 0.2005L12.8757 2.85183L10 3.09549L12.184 4.98749L11.528 7.79949L14 6.30715Z" fill="#EFF1F5"/>
										<path d="M24 6.30715L26.472 7.79949L25.816 4.98749L28 3.09549L25.1243 2.85183L24 0.2005L22.8757 2.85183L20 3.09549L22.184 4.98749L21.528 7.79949L24 6.30715Z" fill="#EFF1F5"/>
										<path d="M34 6.30715L36.472 7.79949L35.816 4.98749L38 3.09549L35.1243 2.85183L34 0.2005L32.8757 2.85183L30 3.09549L32.184 4.98749L31.528 7.79949L34 6.30715Z" fill="#EFF1F5"/>
										<path d="M44 6.30715L46.472 7.79949L45.816 4.98749L48 3.09549L45.1243 2.85183L44 0.2005L42.8757 2.85183L40 3.09549L42.184 4.98749L41.528 7.79949L44 6.30715Z" fill="#EFF1F5"/>
									</svg>

								</div>
							</div></a>
							<a href="#"><div id="battle_pass">
								<div id="club_middle">
									<b class="club_name">Battle Pass Club</b><br>
									<font class="article_name">Компьютерный клуб</font>
									<div id="space_club"></div>
									<svg width="28" height="8" viewBox="0 0 28 8" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M3.99999 6.30715L6.47199 7.79949L5.816 4.98749L8 3.09549L5.12434 2.85183L3.99999 0.2005L2.87566 2.85183L0 3.09549L2.184 4.98749L1.52801 7.79949L3.99999 6.30715Z" fill="#EFF1F5"/>
										<path d="M14 6.30715L16.472 7.79949L15.816 4.98749L18 3.09549L15.1243 2.85183L14 0.2005L12.8757 2.85183L10 3.09549L12.184 4.98749L11.528 7.79949L14 6.30715Z" fill="#EFF1F5"/>
										<path d="M24 6.30715L26.472 7.79949L25.816 4.98749L28 3.09549L25.1243 2.85183L24 0.2005L22.8757 2.85183L20 3.09549L22.184 4.98749L21.528 7.79949L24 6.30715Z" fill="#EFF1F5"/>
									</svg>
								</div>
							</div></a>
						</div>
					</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>