<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$aaddhaarrno="";
$errors = array(); 
$medicines="";
$doctor="";
$issues="";
$tests="";
$myfile="";
$file="";
$size="";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $aaddhaarrno = mysqli_real_escape_string($db, $_POST['aaddhaarrno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($aaddhaarrno)) { array_push($errors, "Aadhaar Number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM doctor_login WHERE aaddhaarrno='$aaddhaarrno' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['aaddhaarrno'] === $aaddhaarrno) {
      array_push($errors, "aaddhaarrno already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO doctor_login (username,aaddhaarrno, email, password) 
  			  VALUES('$username','$aaddhaarrno', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: index.php');
  }
}
//Enter the details of patients
if (isset($_POST['save'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $aaddhaarrno = mysqli_real_escape_string($db, $_POST['aaddhaarrno']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $issues = mysqli_real_escape_string($db, $_POST['issues']);
  $doctor = mysqli_real_escape_string($db, $_POST['doctor']);
  $medicines = mysqli_real_escape_string($db, $_POST['medicines']);
  $tests = mysqli_real_escape_string($db, $_POST['tests']);


  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($aaddhaarrno)) { array_push($errors, "Aadhaar Number is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
 if (empty($doctor)) { array_push($errors, "Doctor is required"); }
 if (empty($medicines)) { array_push($errors, "medicines is required"); }
 if (empty($tests)) { array_push($errors, "tests is required"); }
 if (empty($issues)) { array_push($errors, "issue is required"); }
  

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM patientdata WHERE aaddhaarrno='$aaddhaarrno' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['aaddhaarrno'] === $aaddhaarrno) {
      $query="INSERT INTO patientdetails (doctor, issues,medicines,aaddhaarrno) 
          VALUES('$doctor','$issues','$medicines','$aaddhaarrno'  )";
          mysqli_query($db, $query);}
    }
    else{
		$query = "INSERT INTO patientdata (aaddhaarrno, email,issue,doctor, medicines) 
  			  VALUES('$aaddhaarrno','$email', '$issues', '$doctor','$medicines')";
  	mysqli_query($db, $query);}

    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo "You file extension must be .zip, .pdf or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        move_uploaded_file($file, $destination);
        
            }
    

    }


  
  


// ... 
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: addrecord.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}
if (isset($_POST['add_record'])) {
  header("location=addrecord.php");
}
if (isset($_POST['display_record'])) {
  header("location=search_record.php");
}

    


// in the first time inputs are empty


?>