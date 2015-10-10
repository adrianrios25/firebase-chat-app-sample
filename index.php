<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Firebase Chat</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		body, html{
		background-color: #337AB7;
		}
		.alert{
			padding: 2px;
			margin-bottom: 5px;
		}
		#messages{
		max-height: 300px;
		overflow-y: auto;
		}
	</style>
	<script src="bower_components/firebase/firebase.js"></script>
</head>
<body>
	<div class="container-fluid theme-showcase" role="main">
		<div class="col-md-offset-3 col-md-6 col-xs-12">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<h3 class="panel-title">Firebase Simple Chat</h3>
				</div>
				<div class="panel-body">
						<form class="form" role="form" onsubmit="event.preventDefault(); update_data();">
						<div class="row">
							<div class="col-md-12">
							<div class="form-group">
								<label for="useername">Name:</label>
								<input type="text" class="form-control" id="username" required>
							</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
							<div class="form-group">
								<label for="useermessage">Message:</label>
								<input type="text" class="form-control" id="usermessage" required>
							</div>
							</div>
						</div>
						<button class="btn btn-success">Send</button>
						</form>
						
						<hr />
						<div class="well" id="messages">
							
						</div>
				</div>
			</div>
			
		</div>
	</div>
	<script type="text/javascript">
		var div = document.getElementById('messages');
		
		var messagekey = new Firebase("https://dazzling-heat-1676.firebaseio.com/users");
		messagekey.on("child_added", function(ex) {
		//var obj = snapshot.val().message.full_name;
		div.innerHTML = div.innerHTML + "<div href=\"#\" class=\"alert alert-info\">" +"<b>"+ex.val().message.full_name+"</b>"+": "+ex.val().message.full_message+"</div>";	
		var objDiv = document.getElementById("messages");
		objDiv.scrollTop = objDiv.scrollHeight;
		});	
	</script>
	<script type="text/javascript">	
		function update_data(){
		
		var ref = new Firebase("https://dazzling-heat-1676.firebaseio.com/");
		var username = document.getElementById('username').value; 
		var usermessage = document.getElementById('usermessage').value; 
		var usersRef = ref.child("users");
		usersRef.push({
		  message: {	
			full_name: username,
			full_message: usermessage,
		  }
		});	
		var objDiv = document.getElementById("messages");
		objDiv.scrollTop = objDiv.scrollHeight;
		}
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
	