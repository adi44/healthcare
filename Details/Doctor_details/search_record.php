<!DOCTYPE html><?php 
require_once 'server.php';
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
header("location: login.php");
  exit;}?>
  <div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="addrecord.php">Patient Registeration</a>
  <a href="search_record.php">patient details</a>
  <a href="#about">About</a>
  <h1 align="right"> Welcome to Healthcare Management </h1>
</div>
<form action="" method="post">
<input type="text" name="search">
<input type="submit" name="submit" value="Search">

</form>
<?php
$search_value=$_POST["search"];
$db = mysqli_connect('localhost', 'root', '', 'registration');
if($db->connect_error){
    echo 'Connection Faild: '.$db->connect_error;
    }else{
        $sql="select * from patientdata where aaddhaarrno like '%$search_value%'";

        $res=$db->query($sql);

        while($row=$res->fetch_assoc()){
                  
            echo 'aaddhaarrno  '.$row["aaddhaarrno"];
            echo 'medicines  '.$row["medicines"];
            echo 'doctor  '.$row["doctor"];
            echo 'issues  '.$row["issue"];
            echo 'aaddhaarrno'.$row["aaddhaarrno"];      



            }       

        }
?>
