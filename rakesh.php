
<html>
 <style>
  label2{
  color: white;
  font-family:Stencil Std, fantasy;
  font-size:50px;
  padding: 8px;
    border: 3px;
  }
 

  label1{
  color: white;
  font-family:Stencil Std, fantasy;
  font-size:50px;
  padding: 8px;
    border: 3px;
  }




</style>
<body background="image/drew-beamer-Lhgt4JjW-hs-unsplash.jpg">
<?php
$con = mysqli_connect('localhost','root','','clg');

	$link1="tamil.htm";
     $username = $_GET['uname'];
    $password = $_GET['psw'];
 if(isset($_GET['psw']))
    {
$sql = "select *from login where username = '$username' and password = '$password'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
if($count==1)
{
echo"<label1><center>login successfully</center></label1>";
header('Location: student.htm');

}



else
{
echo"<label1><center>login invalid</center></label1>";

}
}

?>




</body>

</html>