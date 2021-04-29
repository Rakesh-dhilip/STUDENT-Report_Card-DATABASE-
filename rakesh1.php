
<html>
 <style>
  label2{
  color: white;
  font-family:Stencil Std, fantasy;
  font-size:50px;
  padding: 8px;
    border: 3px;
  }
 table, th, td {
  border: 5px solid chartreuse;
  border-collapse: collapse;
  
  
}
table{
	position:absolute;
	top:200px;
	left:290px;
	
	
}

th, td {
  padding: 5px;
  text-align: left;
}


  label1{
  color: white;
  font-family:Stencil Std, fantasy;
  font-size:50px;
  padding: 8px;
    border: 3px;
  }

label{
  color: chartreuse;
  font-family:Tahoma, sans-serif;
  font-size:50px;
  position:absolute;
  top:500px;
	left:500px;
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
$sql = "select *from slogin where ID = $username and  DOB = '$password'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
if($count==1)
{
echo"<label1><center>login successfully</center></label1>";
  
			$sql2="select RANK() over(order by total desc) as RANK,student.id as ID,student.name AS NAME,student.date AS DATE_OF_BIRTH,student.lang AS LANGUAGE,student.eng As ENGLISH,student.mat as MATHS,student.sci as SCIENCE,student.soc as SOCIAL,ave.TOTAL as TOTAL,ave.AVERAGE as AVERAGE,ave.PERCENTAGE as PERCENTAGE from student inner join ave on student.id=ave.id and ave.dob=student.date where student.id = $username;";
			$resul = mysqli_query($con, $sql2);
			$rows = mysqli_fetch_array($resul)
			
			?>
			
			
			        <table style="font-family:fantasy;color:yellow;width:50%">
            <tr>
                <th>RANK</th>
                <th>STUDENT ID</th>
                <th>STUDENT NAME</th>
                <th>DATE_OF_BIRTH</th>
				<th>LANGUAGE</th>
                <th>ENGLISH</th>
                <th>MATHEMATICS</th>
                <th>SCIENCE</th>
				<th>SOCIAL</th>
                <th>TOTAL</th>
                <th>AVERAGE</th>
                <th>PERCENTAGE %</th>
            </tr>
			
			 <tr>
              
                <td><?php echo $rows['RANK'];?></td>
                <td><?php echo $rows['ID'];?></td>
                <td><?php echo $rows['NAME'];?></td>
                <td><?php echo $rows['DATE_OF_BIRTH'];?></td>
				<td><?php echo $rows['LANGUAGE'];?></td>
                <td><?php echo $rows['ENGLISH'];?></td>
                <td><?php echo $rows['MATHS'];?></td>
                <td><?php echo $rows['SCIENCE'];?></td>
				<td><?php echo $rows['SOCIAL'];?></td>
                <td><?php echo $rows['TOTAL'];?></td>
                <td><?php echo $rows['AVERAGE'];?></td>
                <td><?php echo $rows['PERCENTAGE'];?></td>
			
            </tr>
<?php			
		if($rows['TOTAL'] >= 450) 
		{
			echo "<label><center> COMMENT =VERY GOOD</center></label>";
		}
		elseif($rows['TOTAL']>=400)
		{
			echo "<label><center> COMMENT = GOOD</center></label>";
		}
		elseif($rows['TOTAL'] >=350)
		{
			echo "<label><center> COMMENT =CAN DO BETTER</center></label>";
		}
		
		elseif($rows['TOTAL']>=300)
		{
			echo "<label><center> COMMENT =NEED TO IMPROVE</center></label>";
		}
		elseif($rows['TOTAL']>=250)
		{
			echo "<label><center> COMMENT =POOR</center></label>";
		}
		else
		{
			echo "<label><center> POOR</center></label>";
		}
				
     ?>



<?php
	}
else
{
echo"<label1><center>login invalid</center></label1>";
echo"<label1><center>TRY AGAIN</center></label1>";


}
	}
	
?>




</body>
</html>