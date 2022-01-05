<?php
require('../proses/koneksi.php');
session_start();
// If form submitted, insert values into the database.
if (isset($_POST['username'])){
        // removes backslashes
    $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
    $username = mysqli_real_escape_string($koneksi,$username);
    $password = stripslashes($_REQUEST['password']);
    $password = mysqli_real_escape_string($koneksi,$password);
    //Checking is user existing in the database or not
        $query = "SELECT * FROM admin WHERE username='$username'
and password='$password'";
    $result = mysqli_query($koneksi,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['username'] = $username;
            // Redirect user to index.php
        header("Location: admin.php");
         }else{
    echo "<script>alert('Login Gagal Periksa Username Dan Password')</script>";
    echo "<meta http-equiv='refresh' content='1 url=index.php'>";
    }
    }else{
?>
<html>
<head>
<link rel="icon" type="img/png" href="../assets/images/icon.png">
<title>Absensi Gunadarma</title>
<!-- For-Mobile-Apps -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="User Icon Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //For-Mobile-Apps -->
<!-- Style --> <link rel="stylesheet" href="css/style2.css" type="text/css" media="all" />
</head>
<body>


<div class="container">
<h1>FORM LOGIN ADMIN</h1>
     <div class="contact-form">
	 <div class="profile-pic">
	 <img src="../assets/images/ug.png"/>
	 </div>	 
	 <div class="signin">
     <form action="" method="post" name="login">
	      <input type="text" class="user" name="username" placeholder="Username" />
		  <input type="password" class="pass" name="password" placeholder="Password" />
		  <p><a href="../forget_pass.php">Forgot Password?</a></p>
          <input type="submit" name="login" value="Login" />		  
     </form>
	 </div>	 
	      
	 </div>
</div>
<?php } ?>
<div class="footer">
     <p>Universitas Gunadarma &copy; All Right Reserved - <?php echo date("Y")?></p>
</div>
</body>
</html>