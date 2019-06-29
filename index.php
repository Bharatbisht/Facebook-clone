<!DOCTYPE html>
<html>
<head>
	<title>web page</title>
	     <style type="text/css">
	body{ 
    font-family: Arial, Helvetica, sans-serif;

		background-image: url(images/hacker.jpg);
    
    text-align: center;    
    padding-top: 60px;
	}
  label{
    padding-right: 280px;
  }
  form{
    border: 3px solid #f1f1f1;
    box-sizing: content-box;
    width: 400px;
    margin: auto;
    background-color: white;
  }

input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
     
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}
img.avatar {
  width: 40%;
  border-radius: 50%;
}
.container{
  padding: 10px;
}
.cancelbtn{
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  padding-right: 
}
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.9;
}
</style>
    

</head>
    <body>
     <form method="POST">
          <div class="blur">
	       <div class="container">
         <label for="uname"><b>Username:</b></label><br>
         <input type="text" placeholder="Enter your name" name="loginid" required><br>
          <label for="psw"><b>Password</b></label><br>
         <input type="password" placeholder="Enter Password" name="password" required><br>
          <?php db(); ?>                                 
         <button type="submit" name="submit" value="submit">Login</button><br>
         <label for="checkbox">
         <input type="checkbox" checked="checked" name="remember">Remember me
         </label>
         </div>
         <div style="background-color:#f1f1f1">
         <button type="reset" class="cancelbtn">Cancel</button>
         <span class="psw">admin<a href="adminlogin.php">login</a><br>
         <a href="create.php">create new ID...</span>
          </div>
          </div>
     </form>
</body>
</html>  


<?php

function db(){
if(isset($_POST['submit'])){
   $loginid = $_POST['loginid'];
   $password = $_POST['password'];
        $query="SELECT * FROM `fbtable` WHERE LoginId='$loginid' AND Password='$password'";
           include('connect.php');
           $conn=new connect();
           $data=$conn->select($query);
             if($data['LoginId']==$loginid && $data['Password']==$password){
                     session_start();
                     $_SESSION['LoginId']=$_POST['loginid'];
                      $_SESSION['password']=$_POST['password'];
                       header('location:home.php');
                       
               }else {
                 echo("something went wrong");
               } 
}
}
?>