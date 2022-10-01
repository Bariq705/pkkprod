<?php
include 'koneksi.php';
session_start();
if (isset($_POST['login'])) {
    $user=$_POST['user'];
    $pass=$_POST['pass'];
    //periksa login
$query = "select * from login where username ='$user' and password='$pass'";
$queryDB = mysqli_query($mysqli, $query);
$cek = mysqli_num_rows($queryDB);

if ($cek>0) {
    $getData = mysqli_fetch_array($queryDB);
    $_SESSION['name'] = $getData;
    $_SESSION['is_login'] = true;
    $_SESSION['login'] = $user;

    header("location: index.php");
} else { 
    echo "<h3 align='center'>Username atau password yang Anda masukkan salah!</h2>";
    echo "<h3 align='center'>Klik <a href='login.php'> di sini </a> untuk login kembali</h2>";
}

} else {
?>

<html>  
 <head>  
  <meta charset="UTF-8" /> 
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
  <title>Google</title>  
  <link rel="stylesheet" href="style.css" />  
  <!-- Compiled and minified CSS -->  
  <link  
   rel="stylesheet"  
   href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"  
  />  
  <!-- Compiled and minified JavaScript -->  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>  
 </head>  
 <body>  
  <div class="login">  
   <div class="row">  
    <div class="logo"></div>  
   </div>  
   <div class="row center">  
    <h5>Sign in</h5>  
    <h6>Masukan Id admin Asnanta</h6>  
   </div>  
   <form action="" method="post">
        <div>
            <label>Username</label>
            <input type="text" id="user" name="user" class="teksb"/>
        </div>
        <div>
            <label>Password</label>
            <input type="password" id="pass" name="pass" class="teksb"/>
        </div>
        <div>
            <br />
            <div class="center-align">  
            <input class="waves-effect waves-light btn  center" type="submit" name="login" value="Login">
        </div>
    </form>       
     </div>  
    </div>  
   </div>  
  </div>  
 </body>  
</html>  
<?php
}
?>