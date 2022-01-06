<html>
	<head>
		<script language="javascript">
			function taskListClicked(event){				
				window.location.href = "task-list.php?offset="+new Date().getTimezoneOffset();				
			}

			function categoryListClicked(event){				
				window.location.href = "category-list.php";				
			}
		</script>
	</head>
<body>
	<h2>
		Task Management Tool
	</h2>
	<h3>
		<a href="#" onClick="categoryListClicked(event)">Categories</a>		
		<a href="#" onClick="taskListClicked(event)">Tasks</a>		
	</h3>
</body>
</html>
	

