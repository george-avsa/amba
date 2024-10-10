<?php
require_once '../db/db.php';

//-----------------------------------------------------------------------------------------------Incoming user verification
$user_id = $_SESSION['logged_user']->unical_id;
$user_info = R::findOne('users', 'unical_id = ?', array($user_id));

if ($user_info->unical_id != 345662) {
	echo "<script>window.location.replace('http://ambassa.ru')</script>";
}else{
echo "<h3>Hello task creater!</h3>";


//-----------------------------------------------------------------------------------------------Creating new task(s)
if(isset($_POST['create_new_task'])){

	for ($i = 0; $i < $_POST['count_of_task']; $i++) {

		$task_id = rand(100000, 999999);
		$all_tasks = R::findAll('tasks', "task_id = ?", array($task_id));

		while (count($all_tasks) != 0) {
		$task_id = rand(100000, 999999);
		$all_tasks = R::findAll('tasks', "task_id = ?", array($task_id));
		}

		$task = R::dispense('tasks');
		$task->task_id = $task_id;
		$task->author_id = $user_info->unical_id;
		$task->category = $_POST['task_category'];
		$task->platform = $_POST['task_platform'];
		$task->price = $_POST['task_price'];
		$task->executor_id = 11111;
		$task->status = 'created';
		$task->theme = $_POST['task_theme'];
		$task->text = $_POST['task_text'];
		R::store($task);
	}

}

//-----------------------------------------------------------------------------------------------Finishing one task(s)
if(isset($_POST['finish_one_task'])){

	$task_id = $_POST['task_id'];

	R::exec('UPDATE `tasks` SET `status` = :status WHERE task_id = :task_id', [
	  'task_id' => $task_id,
	  'status' => 'finished'
	]);
}


//-----------------------------------------------------------------------------------------------Finishing all tasks
if(isset($_POST['finish_all_task'])){

	$all_tasks = R::findAll('tasks', "task_id != 0");
	foreach ($all_tasks as $key => $bean) {
	R::exec('UPDATE `tasks` SET `status` = :status WHERE task_id = :task_id', [
	  'task_id' => $bean->task_id,
	  'status' => 'finished'
	]);
	}
}

//-----------------------------------------------------------------------------------------------Killing all tasks
if(isset($_POST['kill_all_task'])){

	$all_tasks = R::findAll('tasks', "task_id != 0");
	foreach ($all_tasks as $key => $bean) {
	$task_id = $bean->task_id;
	R::exec('DELETE FROM `tasks` WHERE `status` = :status', array(
    ':status' => 'finished'
	));

	}
}

}
?>
<form action="admin.php" method="POST">
<br>
<input type="text" placeholder='category of task' name='task_category'><br>
<input type="text" placeholder='platform of task' name='task_platform'><br>
<input type="text" placeholder='task price' name='task_price'><br>
<input type="text" placeholder='task theme' name='task_theme'><br>
<input type="text" placeholder='task text' name='task_text'><br><br>
<input type="text" placeholder='count of task' name='count_of_task'><br>


<br><input type="submit" value='create new task' name='create_new_task'>
</form><hr>
<br><br><br>


finish task
<form action="admin.php" method="POST">
<input type="text" placeholder='Input task id' name='task_id'><br>
<br><input type="submit" value='finish this task' name='finish_one_task'>
</form><br><hr>


finish all tasks
<form action="admin.php" method="POST">
<br><input type="submit" value='finish all tasks' name='finish_all_task'>
</form><br><hr>



clean already complited tasks
<form action="admin.php" method="POST">
<input type="submit" value='kill' name='kill_all_task'>
</form>


