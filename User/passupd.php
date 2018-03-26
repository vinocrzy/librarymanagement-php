<html>
<head>
</head>
<body>
<div class="header">
<h4 class="title"> Change Password To</h4>
<p class="category"><?php echo $uname['FirstName'] ?></p>
</div>
<div class="content">
<div class="form-panel">
								
								<div class="addMemberForm">
									<form action="passup.php" method="POST" id="pupForm" >
									
										<input type="password" class="form-control round-form" name="oldpass" required autofocus placeholder="Old Password"  ><br>
									
									
										<input type="password" class="form-control round-form" name="newpass" required autofocus placeholder="New Password"><br>

										<button class="btn btn-primary btn-lg btn-block" type="submit" value="Change">Change </button>
									
									</form>
									
									
									
									
								</div>
								
							</div>
</div>
</body>
</html>