<html>
	<head>
		<script language="javascript">
			function taskListClicked(event){				
				window.location.href = "task-list.php?offset="+new Date().getTimezoneOffset();				
			}
		</script>
	</head>
<body>
	<a href="task-add.php">Create New Task</a> 
	<a href="#" onClick="taskListClicked(event)">Task List</a>
</body>
</html>
	

