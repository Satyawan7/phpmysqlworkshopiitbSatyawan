<html>
<head>
	<title>Marksheet</title>
</head>
<body>
<form  method="POST">
Name of Student:<input type="text" name="name">
<br>
<p>Marks in Each Subject</p>
<br>
Subject 1:<input type="number" name="sub1">
<br>
Subject 2:<input type="number" name="sub2">
<br>
Subject 3:<input type="number" name="sub3">
<br>
Subject 4:<input type="number" name="sub4">
<br>
Subject 5:<input type="number" name="sub5">
<br>
<input type="submit" value="submit" name="submit">
<input type="submit" value="update" name="update">

<br>


<?php
if(isset($_POST['submit']))
{
$name = $_POST['name'];
$m1=$_POST['sub1'];
$m2=$_POST['sub2'];
$m3=$_POST['sub3'];
$m4=$_POST['sub4'];
$m5=$_POST['sub5'];
$total=500;
$sum=$m1+$m2+$m3+$m4+$m5;
$per=($sum)*100/$total; 
$con = mysqli_connect("localhost","root","","student") or die(mysqli_error());
echo "Connected";
$write = "INSERT INTO marks VALUES('','$name','$m1','$m2','$m3','$m4','$m5','$sum','$total','$per')";
$result = mysqli_query($con,$write);
if($write){
	echo "<br>Success";
}	
else{
	echo "<br>Not Inserted";
}


}


if(isset($_POST['update'])){

$name = $_POST['name'];
$m1=$_POST['sub1'];
$m2=$_POST['sub2'];
$m3=$_POST['sub3'];
$m4=$_POST['sub4'];
$m5=$_POST['sub5'];



$sum=$m1+$m2+$m3+$m4+$m5;
$total=500;
$per=($sum)*100/$total;


echo "Total Marks Obtained: $sum<br>";
echo "Total Marks: $total<br>";
echo "Percentage: $per";

$sql = "UPDATE marks SET Sub5=$m5,Total Obtained = $sum , percent = $per WHERE ID = $name";
$res = mysqli_query($con,$sql);
if($sql){
	echo "<br>Record Updated Successfully";
}
else{
	echo "<br>Not Updated";
}
mysqli_close($conn);
}
?>