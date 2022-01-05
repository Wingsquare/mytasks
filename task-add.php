<html>

<head>
	<script language="javascript">

		function cancelClicked(){
			document.getElementById("myform").action = "index.php";
			document.getElementById("myform").submit();
		}

		function createClicked(){
			var task_start_time = new Date(document.getElementById("task_start_time").value);
			
			task_start_time.setMinutes(task_start_time.getMinutes() + task_start_time.getTimezoneOffset());											
			document.getElementById("task_start_time_utc").value = getFormattedDateTimeString(task_start_time);
			
			document.getElementById("myform").action = "task-list.php?offset=" + task_start_time.getTimezoneOffset();
			document.getElementById("myform").submit();
		}

		function getFormattedDateTimeString(dt){
			var year = dt.getFullYear();
			var month = dt.getMonth() + 1;
			var day = dt.getDate();

			var hour = dt.getHours();
			var minutes = dt.getMinutes();
			var seconds = dt.getSeconds();

			var str = year + "-" + month + "-" + day + " " + hour + ":" + minutes + ":" + seconds;

			return str;

		}

	</script>

</head>

<body>
	<form id="myform"  method="post">
		<label>Task</label><input type="text" name="task_name"/><br />
		<label>Task Start Time</label><input type="text" id="task_start_time" name="task_start_time"/><br />
		<input type="hidden" id="task_start_time_utc"  name="task_start_time_utc"/><br />
		<label>Remarks</label><textarea name="task_remarks" rows="5" cols="40"></textarea> <br />
		<button id='btnCancel' type="button" onclick="cancelClicked()">Cancel</button>
		<button id='btnCreate' type="button" onclick="createClicked()">Submit</button>
	</form>
</body>
</html>