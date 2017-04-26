<?php 


include 'dbh.php';
if (isset($_POST) & !empty($_POST)) {
	

	$firstName = $_POST['firstname'];
	$lastName = $_POST['lastname']; 
	$email = $_POST['emailregistration']; 
	$pwd1 = $_POST['passwordregistration']; 
	$pwd2 = $_POST['retypepassword'];

	$count = 0;
	$res = $con -> query("SELECT * FROM users WHERE email='$email'");
	$count = mysqli_num_rows($res);

	if($count < 1){
	    if ($pwd1 == $pwd2){

			$sql = "INSERT INTO users (firstName,lastName,email,pwd1) VALUES ('$firstName','$lastName','$email','$pwd1')"; 
			$result = $con->query($sql);
			
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Hello ".$firstName." ".$lastName. ", you are successfully registered!');\n";
			echo "window.location='registration_page.html'";
			echo "</script>";
			
			}
		else{
			
			echo "<script language=\"JavaScript\">\n";
			echo "alert('Your passwords do no match!');\n";
			echo "window.location='registration_page.html'";
			echo "</script>";
			exit();
			}
	}

	else{
		
		echo "<script language=\"JavaScript\">\n";
			echo "alert('This email already exists! Try using another email id.');\n";
			echo "window.location='registration_page.html'";
			echo "</script>";
	}


}

?>


