<?php
include('connect.php');
session_start();
if(isset($_SESSION['password'])){

admin();
}else{
    header('location:index.php');
}

function admin(){
$name=$_SESSION['name'];
$password=$_SESSION['password'];
$con=new Connect();
$run=$con->allselect();
while($data=mysqli_fetch_assoc($run)){
?>
<table border="1" width="60%">
    <tr><td rowspan="6"><img src="<?php echo $data['Image'];?>" width="100px" height="100px"/></td><td><?php echo $data['Name'];?></td></tr>
    <tr>                          <td><?php echo $data['Address'];?></td></tr>
    <tr>                          <td><?php echo $data['Gender'];?></td></tr>
    <tr>                          <td><?php echo $data['Email'];?></td></tr>
    <tr>                          <td><?php echo $data['DOB'];?></td></tr>
</table>
<?php
}
}
?>
<form method="POST">
    <button type="submit" name="logout">Logout</button>
</form>
<?php
if(isset($_POST['logout'])){
    session_destroy();
    header('location:adminlogin.php');
}
?>
