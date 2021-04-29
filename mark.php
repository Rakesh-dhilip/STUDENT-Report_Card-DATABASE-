
<html>
<style>
 table, th, td {
  border: 5px solid chartreuse;
  border-collapse: collapse;
  
  
}
table{
	position:absolute;
	top:900px;
	left:270px;
	
	
}

th, td {
  padding: 5px;
  text-align: left;
}

label{
  color: chartreuse;
  font-family:Tahoma, sans-serif;
  font-size:50px;
  padding: 8px;
    border: 3px;
	
  }
  button:hover {
  background-color: #99004d;
}
a{

	background-color: white;
	text-decoration:none;
	font-family:Stencil Std, fantasy;
  font-size:50px;
	color:black;
	
	border-radius: 12px;
	width: 20%;
  height:4%;
   
position: absolute;
  left: 580px;
  top: 400px;
		


    font-size: 16px;
    margin: 5px;
 
    border: 5px;
} 
a:hover{
	background-color: black;
		color:white;
	
	
	}

body {
  background-image: url('image/drew-beamer-Lhgt4JjW-hs-unsplash.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

  </style>
<body>


<?php
$con = mysqli_connect('localhost','root','','clg');

	$link1="tamil.htm";
$id = $_GET['id'];
$date=$_GET['date'];
$name = $_GET['name'];
$lang = $_GET['lang'];
$english = $_GET['english'];
$maths = $_GET['maths'];
$science = $_GET['science'];
$social = $_GET['social'];
    
 if(isset($_GET['name']))
    {
$sql = "insert into student values($id,'$name','$date',$lang,$english,$maths,$science,$social)";
$sql1="insert into slogin values($id,'$date')";
    $result = mysqli_query($con, $sql);
	$result1 = mysqli_query($con, $sql1);
	$count=mysqli_affected_rows($con);
	
	if($count==1){
		$ave=0.0;
		$per=0.0;
		$total=0.0;
		
		$total=$lang+$english+$maths+$science+$social;
		$ave=($lang+$english+$maths+$science+$social)/5;
		
		echo "<label><center> $id $name</center></label>";
		echo "<label><center> AVERAGE =$ave</center></label>";
		echo "<label><center> TOTAL =$total</center></label>";
		$per=($ave*100)/100;
		echo "<label><center> PERCENTAGE =$per</center></label>";
		
		if($total >= 450) 
		{
			echo "<label><center> COMMENT =VERY GOOD</center></label>";
		}
		
		elseif($total >=400)
		{
			echo "<label><center> COMMENT = GOOD</center></label>";
		}
		elseif($total >=350)
		{
			echo "<label><center> COMMENT =CAN DO BETTER</center></label>";
		}
		
		elseif($total >=300)
		{
			echo "<label><center> COMMENT =NEED TO IMPROVE</center></label>";
		}
		elseif($total >=250)
		{
			echo "<label><center> COMMENT =POOR</center></label>";
		}
		else
		{
			echo "<label><center> POOR</center></label>";
		}
        $sql1 = "insert into ave values($id,'$date',$total,$ave,$per)";
        mysqli_query($con, $sql1);

	}
	else{
			echo "<label><center>STUDENT DETAILS ALREADY EXIST</center></label>";
	
			?>
	
	<a href="student.htm" style="text-align:center">ENTER THE STUDENT DETAILS AGAIN</a>
	<?php
	
	}

      }
	  
else{
         echo "<h1><center> something went wrong </center></h1>";
         }
	
		 


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
            
            <?php   
			

				$sql2="select RANK() over(order by total desc) as RANK,student.id as ID,student.name AS NAME,student.date AS DATE_OF_BIRTH,student.lang AS LANGUAGE,student.eng As ENGLISH,student.mat as MATHS,student.sci as SCIENCE,student.soc as SOCIAL,ave.TOTAL as TOTAL,ave.AVERAGE as AVERAGE,ave.PERCENTAGE as PERCENTAGE from student inner join ave on student.id=ave.id and ave.dob=student.date;";
				$resul = mysqli_query($con, $sql2);
				 $row = mysqli_num_rows($resul);
				
               while($rows = mysqli_fetch_array($resul))
                {
					
					 
             ?>
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
                }
             ?>
       </table>
    

</body>
</html>

