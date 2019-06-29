<table align="center" style="border: 1px solid black">
    <form method="POST">
    <tr><td align="center"><h1>Admin Login</h1></td></tr>
    <tr><td>Name:<input type="text" name="adminname" required></td></tr>
    <tr><td>Password:<input type="password" name="adminpass" required></td></tr>
    <?php admindb();?>
    <tr><td align="center"><input type="submit" name="submit" value="submit"></td></tr>
    <form>
</table>
<?php
function admindb(){
 if(isset($_POST['submit'])){
   include('connect.php');
   $name=$_POST['adminname'];
   $password=$_POST['adminpass'];
   $con=new Connect();
   $query="SELECT * FROM `admin` WHERE Name='$name' AND Password='$password'";
   $data=$con->select($query);
      if($data['Name']==$name && $data['Password']==$password){
         session_start();
         $_SESSION['name']=$_POST['adminname'];
         $_SESSION['password']=$_POST['adminpass'];
         header('location:admin.php');
        }else{
           echo("Something went wrong");
          }
 }
}
?>