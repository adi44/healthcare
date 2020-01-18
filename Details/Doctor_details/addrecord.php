<!DOCTYPE html><?php 
require_once 'server.php';
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
header("location: login.php");
  exit;}?>
<html>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="addrecord.php">Patient Registeration</a>
  <a href="search_record.php">patient details</a>
  <a href="#about">About</a>
  <h1 align="right"> Welcome to Healthcare Management </h1>
</div>
<head>
  <title>Enter your Details</title>
  <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
  <div class="header">
    <h2>Enter Your Patient's Details</h2>
  </div>
  
  <form method="post" action="register.php">
    <?php include('errors.php'); ?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
  <div class="input-group">
      <label>Aadhaar Number</label>
      <input type="text" name="aaddhaarrno" value="<?php echo $aaddhaarrno; ?>">
    </div>

    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>Phone Number</label>
      <input type="text" name="phonenumber">
    </div>
    <div class="input-group">
      <label>registeration date</label>
      <input type="date" name="date">
    </div>
  <div class="input-group">
      <label>Issue</label>
      <input type="text" name="issues" value="<?php echo $issues; ?>">
    </div>
  <div class="input-group">
      <label>Doctor</label>
      <input type="text" name="doctor" value="<?php echo $doctor; ?>">
    </div>
  <div class="input-group">
      <label>tests</label>
      <input type="text" name="tests" value="<?php echo $tests; ?>">
    <div class="input-group">
      <label>Medicines</label>
      <input type="text" name="medicines" value="<?php echo $medicines; ?>">
    </div>
    <div class="input-group">
      <input type="file" name="myfile"> <br>
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="save">Save Details</button>
    </div>
    <p>
      Logout? <a href="logout.php">Logout</a>
    </p>
  

</form>
</body>
</html>