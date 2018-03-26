

<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="../css/styleAddValue.css">
		<script>
			function udb(str) {
				var x = document.getElementById("udbmyForm");
				
				if (str == "") {
					document.getElementById("udbtxtHint").innerHTML = "";
					return;
				} else { 
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp = new XMLHttpRequest();
					} else {
						// code for IE6, IE5
						xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							document.getElementById("udbtxtHint").innerHTML = this.responseText;
						}
					};
					xmlhttp.open("GET","udb.php?id="+x.elements[0].value+"&ISBN="+x.elements[1].value+"&name="+x.elements[2].value+"&aname="+x.elements[3].value+"&pub="+x.elements[4].value+"&price="+x.elements[5].value+"&bid=<?php echo $uBookId ?>",true);
					xmlhttp.send();
				}
			}


		</script>
	</head>
	<body>
		<?php
		
		
		
		$uBookId = $_REQUEST['uBookId'];

		$return = mysqli_num_rows(mysqli_query($db,"SELECT bookId From borrow Where bookId = '$uBookId'"));
		if(empty($return)){
		$query = mysqli_query($db,"SELECT * From books Where bookId = '$uBookId'");
		$result = mysqli_fetch_assoc($query);
		?>
		
		<h1 class="major">Update Book <?php  echo $result['title']?><br /></h1>
		<div class="addBookForm">
			<form action="#" id="udbmyForm" >
			<div class="field fourth">
				<input type="text" class="form-control placeholder-no-fix" name="bookId" required autofocus placeholder="Access-ID" value=<?php echo $uBookId ?> ><br>
			</div>
			<div class="field third">	
				<input type="text" class="form-control placeholder-no-fix" name="ISBN" required autofocus placeholder="ISBN" value=<?php  echo $result['ISBN'];?> ><br>
			</div>
			<div class="field third">
				<input type="text" class="form-control placeholder-no-fix" name="bookName" required autofocus placeholder="Book-Name" value="<?php  echo $result['title']?>" ><br>
			</div>
			<div class="field third">	
				<input type="text" class="form-control placeholder-no-fix" name="authorName" required autofocus placeholder="Author-Name" value="<?php  echo $result['author']?>" ><br>
			</div>	
			<br>
				<div class="field third">	
				<input type="text" class="form-control placeholder-no-fix" name="bookPublisher" required autofocus placeholder="Publisher" value="<?php  echo $result['publisher']?>" ><br>
				</div>
				<div class="field third">	
				<input type="text" class="form-control placeholder-no-fix" name="Price" required autofocus placeholder="Price" value="<?php  echo $result['price']?>" ><br>
				</div>
			</form>
			<div class="field third">
			<button class="btn btn-primary btn-lg btn-block" onclick="udb(this.value)" value="Update">Update </button>
			</div><br>
		</div>
		<?php
		}
		else{
			$errorMsg = "This Book is issued and can't be edit.";
			
			}
		?>
		<div id="udbtxtHint" class="alert alert-warning"><b>Server Response here...</b></div>
	</body>
</html>