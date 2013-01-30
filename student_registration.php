<!DOCTYPE HTML>
<html>
<head>
	<title>Student Registration</title>
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.8.3.min.js"></script>
	<script type="text/javascript" src="validate_student_registration.js"></script>
	<link href="bootstrap\css\bootstrap.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" type="text/css" href="index.css" />
	<link rel="stylesheet" type="text/css" href="profile_s.css" />
	<script src="bootstrap\js\bootstrap.min.js"></script>
	
		<script type="text/javascript">	
		$(document).ready(function(){
		$('#register_student').ajaxStop(function(){
			$(this).removeClass('loading disabled');
		})
		$('#register_student').click(function(){
			$(this).addClass('loading disabled');
			var first_name = jQuery.trim($('#first_name').val());
			var last_name = jQuery.trim($('#last_name').val());
			var email = jQuery.trim($('#email').val());
			var password = jQuery.trim($('#password').val());
			var id = jQuery.trim($('#id').val());
			var type = "S";
			
			var dataString = 'first_name=' + first_name + '&last_name=' + last_name + '&email=' + email + '&password=' + password + '&id=' + id + '&type=' + type;

			//else{
				$.ajax({
					type: "POST",
					url: "process_registration.php",
					data: dataString,
					success: function(html){
						$('#left').hide();
						$('#right').hide();
						$('#success').hide().html(html).fadeIn('slow');
						$('#first_name').val('');
						$('#last_name').val('');
						$('#email').val('');
						$('#password').val('');
						$('#confirm_password').val('');						
						$('#id').val('');
						$('span').hide();
					},
					error: function(html){
						alert("error");
					}
				
				})
			//}
			return false;
		})
	})
</script>
</head>

<body>
<div id="wrapper">
	<div class = "row-fluid" id="header" class="span12" style="padding-top:10px; padding-bottom:10px;">
		<div class="span12" id="headbar">
			<div class="row-fluid">
			<div class="span4 offset1"><h1><a class="head" href="index.php">SubmitQ</a></h1>
				<!--<h3>Just Ask. That Simple.</h3>-->
			</div>
			<div class="span3"></div>
			<div id="login" class="span4">
				<br />
				<strong>Already have an account? &nbsp;</strong> <a href="index.php"><button type="button" class="btn">Login</button></a>
			</div>			
					
		</div>
		</div>
	</div>
	
<div class="container-fluid" id="container">
	
<div class="row">

<div class="span6 offset1" id="left">
	<h2>Register</h2>
<form method="POST">
<table>
	<tr>
		<td>First Name: </td><td><input type="text" id="first_name" name="first_name"></td><td><span id="first_name_status"></span></td>
	</tr>
	<tr>
		<td>Last Name: </td><td><input type="text" id="last_name" name="last_name"></td><td><span id="last_name_status"></span></td>
	</tr>
	<tr>
		<td>E-mail Address: </td><td><input type="text" id="email" name="email"></td><td><span id="email_status"></span></td>
	</tr>
	<tr>
		<td>Password: <font size="1"><br />Must have at least 6 characters</font></td><td><input type="password" id="password" name="password"></td><td><span id="password_status"></span></td>
	</tr>
	<tr>
		<td>Confirm Password: </td><td><input type="password" id="confirm_password" name="confirm_password"></td><td><span id="confirm_password_status"></span></td>
	</tr>
	<tr>
		<td>ID Number: </td><td><input type="text" id="id" name="id"></td><td><span id="student_id_status"></span></td>
	</tr>
	<tr><td></td><td><button type="submit" name="register_student" id="register_student" class="btn btn-primary pull-right" disabled>Register</button></td><td></td></tr>
	
</table>

</form>

</div>


<div class="span8" id="right">
<h4>Questions</h4>
<img src="star_question.png" alt="question" width="600px"></br>
</br>
Post questions and upvote other questions by clicking <i class='icon-thumbs-up'></i>. Click on
<i class="icon-remove"></i> to remove your own questions. You can also answer other questions by clicking inside the
"Answer" box. Use the navigation bar above to organize the questions differently.
</br></br>
<h4>Navigation Bar</h4>
<img src="navbar.png" alt="question" width="600px"></br>
</br>
Organize the contents of the Q&A page according to number of upvotes, time when the question was asked, and number of
answers. <i class="icon-arrow-up"></i> corresponds to the largest number of upvotes/answers or the newest questions on
the page. <i class="icon-arrow-down"></i> corresponds to the smallest number and the oldest questions. Click
<i class="icon-refresh"></i> to refresh the page.
<br></br>
<h4>Vocabs</h4>
<img src="TA_vocab.png" alt="vocab" width="300px"> </br>
</br>
Clicking on the <i class='icon-ok-sign'></i> icon will post your vocab or definition, <i class="icon-remove"></i> will remove it, and the <i class="icon-pencil"></i> icon will allow you to edit the definition. Also, press <i class="icon-refresh"></i> to refresh the vocab list.</br>
</br>
<h4>Feedback</h4>
<img src="stu_feedback.png" alt="stu_feedback" width="340px"></br>
You can indicate whether the pace of the lecture is too fast or too slow.
</div>

<div class="row-fluid">
<div class="span8 offset2">
	<div id="success" class="alert alert-success" style="display:none; position:relative; top: 100px; "></div>
</div>
</div>

</div>
</div>

     <div id="push"></div>
</div>
	<?php include("footer.php");?>

</body>
</html>
