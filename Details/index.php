<!DOCTYPE html>
<html>
<head>
<div class="topnav">
  <a class="active" href="#home">Home</a>
  <a href="./Patient_details/login.php">Patient Login</a>
  <a href="./Doctor_details/login.php">Doctor Login</a>
  <a href="#about">About</a>
  <a href="logout.php">Logout</a>
  <h1 align="right"> Welcome to Healthcare Management </h1>
</div>
  <
  <title>Enter your Details</title>
  
  <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
 <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-analytics.js"></script>

<script>
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyB8gx0IPvY5UcTL9hVX-Ei_P-TrwqtAOx4",
    authDomain: "hospital-f9e53.firebaseapp.com",
    databaseURL: "https://hospital-f9e53.firebaseio.com",
    projectId: "hospital-f9e53",
    storageBucket: "hospital-f9e53.appspot.com",
    messagingSenderId: "950952518649",
    appId: "1:950952518649:web:565d922ce304df52e3d328",
    measurementId: "G-V614TE8L1R"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
  <div class="header">
  
  <body style background-image="http://s21179.pcdn.co/wp-content/uploads/2017/01/Dubai-Physicians-Assistants-Doctor-Assistance-in-Dubai-Medical-Directory-660x330.jpg">
  	<h2>Enter Your Patient's Details</h2>
  </div>
	
  <form method="post" action="register.php">
  
  	<div class="input-group">
  	  <button type="submit" class="btn" name="add_record"><a href="addrecord.php">Add Record</button>
      <button type="submit" class="btn" name="display_record"><a href="search_record.php">Display Record</button>
  	</div>
  	<p>
  		Logout? <a href="logout.php">Logout</a>
  	</p>
  </form>
</body>

</html>
