<html>

<head>
	<script language="javascript">
		function cancelClicked(){
			document.getElementById("myform").action = "index.php"
			document.getElementById("myform").submit();
		}

		function createClicked(){
			document.getElementById("myform").action = "task-list.php"
			document.getElementById("myform").submit();
		}

	</script>

</head>

<body>
	<form id="myform"  method="post">
		<label>Task</label><input type="text" name="task"/><br />
		<label>Remarks</label><textarea name="remarks" rows="5" cols="40"></textarea> <br />
		<button id='btnCancel' type="button" onclick="cancelClicked()">Cancel</button>
		<button id='btnCreate' type="button" onclick="createClicked()">Submit</button>
	</form>
</body>
</html>