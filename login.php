<?php 
include 'dbh.php';

$email = $_POST['email_login']; 
$pwd1 = $_POST['passwordlogin']; 


$sql = "SELECT * FROM users WHERE email='$email' AND pwd1='$pwd1'";

if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
   // echo "You are now logged in ".$row[0]." ".$row[1]."!";
    echo "<script language=\"JavaScript\">\n";
echo "alert('You are now logged in .$row[0] $row[1]!');\n";
echo "window.location='profile_page.html'";
echo "</script>";
    }
  // Free result set
  mysqli_free_result($result);
}

else{

echo "<script language=\"JavaScript\">\n";
echo "alert('Username or Password was incorrect!');\n";
echo "window.location='registration_page.html'";
echo "</script>";
}

 ?>